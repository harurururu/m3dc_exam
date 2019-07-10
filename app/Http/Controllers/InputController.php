<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExamRequest;

use App\Exam;

use Illuminate\Support\Facades\Log;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;


class InputController extends Controller
{
    public function index()
    {
        $pref = config('defaultcfg.pref');

        return view('viewpages.input')->with('pref',$pref);
    }

    public function displayview()
    {
        return view('viewpages.viewpage');
    }


    public function regist(ExamRequest $request){
        $regist = $request->all();
        $regist['crnt_date'] = date('Y-m-d H:i:s');
        $regist['ip_addr'] = $request->ip();
        $regist['referer'] = url()->previous();
        $regist['usr_agent'] = $request->header('User-Agent');

        // DB格納
        $exam = new Exam();
        $ret = $exam->fill($regist)->save();

        // log出力
        $this->outputtofile($regist);

        return redirect('/viewpage');

    }

    /**
     * ログを出力
     * @param  array $regist [フォーム入力した値とuserAgentなどの配列]
     * @return void
     */
    private function outputtofile($regist){
        $nowtime = time();
        $fname = date('Y_m_d_His', $nowtime); // ファイル名にコロン使えないので
        $log_path =  storage_path() .'/logs/'.$fname.'.log'; //ファイルパス
        $log_level =  config('app.log_level');

        $stream = new StreamHandler($log_path,$log_level);

        $monolog = new Logger("mychanel");
        $format = "[%datetime%] %level_name%: %message%\n";
        $formatter = new LineFormatter($format);
        $stream->setFormatter($formatter);

        $monolog->pushHandler($stream);

        $date = date('Y_m_d_H:i:s', $nowtime);
        $messageArr = [];
        $messageArr[] = $date;
        $messageArr[] = $regist['todohuken'];
        $messageArr[] = $regist['fname'];
        $messageArr[] = $regist['lname'];
        $messageArr[] = $regist['viewcnt'];
        $messageArr[] = $regist['ip_addr'];
        $messageArr[] = $regist['referer'];
        $messageArr[] = $regist['usr_agent']; // TODO エスケープ必要あり？
        $message = implode(',' ,$messageArr);
        $monolog->addInfo($message);
    }
}

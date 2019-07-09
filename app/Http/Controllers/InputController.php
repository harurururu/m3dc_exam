<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}

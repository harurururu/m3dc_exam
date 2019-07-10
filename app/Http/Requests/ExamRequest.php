<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'todohuken' => 'required|max:99999',
            'fname' => 'required|max:10',  //  最大長は何文字の仕様ですか？DB上ではvarchar10ですが。。。。
            'lname' => 'required|max:15',
            'viewcnt' => 'required|max:99999',
        ];
    }
}

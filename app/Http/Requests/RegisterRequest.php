<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RegisterRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'NAME_USER' => 'required',
            'LAST_NAME' => 'required',
            'EMAIL' => 'required|email|unique:user_cip,email',
            'IDENTIFICATION' => 'required',
            'LOGIN' => 'required|unique:user_cip',
            'PASSWORD_USER' => 'required'
    ];
  }
}

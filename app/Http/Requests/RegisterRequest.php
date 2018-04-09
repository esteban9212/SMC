<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            "name" => 'required',
            'last_name'=> 'required',
            'username'=> 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'identification' => 'required',
    ];
  }
}

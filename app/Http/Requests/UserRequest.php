<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'repassword' => 'required|same:password',
            'email' => 'required|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9-][a-z0-9]+)*(\.[a-z]{2,4}){1,2}$/'
        ];
    }
    public function messages()
    {
        return[
           'email.required' => 'Please enter your user name',
           'email.unique' => 'User is exits',
           'password.required' => 'Please enter your Password',
           'repassword.required' => 'Please enter Re-Password',
           'repassword.same' => 'Two pass don\'t match',
           'email.regex' => 'Email error syntax'
        ];
    }
}

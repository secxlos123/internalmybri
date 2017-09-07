<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AuthLogin extends FormRequest
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
            'pn' => 'required',
            'password' => 'required',
            // 'g-recaptcha-response' => 'required|recaptcha',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'pn.required' => 'PN harus diisi',
            'password.required'  => 'Password harus diisi',
            // 'g-recaptcha-response.required'  => 'Captcha harus diisi',
            // 'g-recaptcha-response.recaptcha'  => 'Captcha harus diisi dengan benar'
        ];
    }
}

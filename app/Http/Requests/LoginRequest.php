<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'admin_email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'admin_email.required' => 'Email không được để trống',
            'admin_email.email' => 'Email không đúng định dạng',
            'password.required' => 'Password không được để trống',
            'password.required' => 'Password dài tối thiểu 8 kí tự',
        ];
    }
}

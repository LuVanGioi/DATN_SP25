<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'Vui lòng nhập họ và tên.',
            'name.string'       => 'Họ và tên không hợp lệ.',
            'name.max'          => 'Họ và tên không được vượt quá 255 ký tự.',

            'email.required'    => 'Vui lòng nhập email.',
            'email.string'      => 'Email không hợp lệ.',
            'email.email'       => 'Định dạng email không đúng.',
            'email.max'         => 'Email không được quá 255 ký tự.',
            'email.unique'      => 'Email này đã được sử dụng.',

            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.string'   => 'Mật khẩu không hợp lệ.',
            'password.min'      => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed'=> 'Mật khẩu xác nhận không khớp.',
        ];
    }
}

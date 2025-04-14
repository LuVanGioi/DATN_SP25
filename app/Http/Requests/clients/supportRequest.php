<?php

namespace App\Http\Requests\clients;

use Illuminate\Foundation\Http\FormRequest;

class supportRequest extends FormRequest
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
            "email" => "required|email|max:255|unique:support_client,email"
        ];
    }

    public function messages(): array
    {
        return [
            "email.required" => "Vui lòng nhập Email của bạn",
            "email.email" => "Vui lòng nhập Email hợp lệ",
            "email.max" => "Email Quá Dài, Không Hợp Lệ!",
            "email.unique" => "Email đã được đăng ký từ trước rồi nha!"
        ];
    }
}

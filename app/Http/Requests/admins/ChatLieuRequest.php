<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class ChatLieuRequest extends FormRequest
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
            "TenChatLieu" => "required|max:255"
        ];
    }

    public function messages() {
        return [
            "TenChatLieu.required" => "Vui Lòng Nhập Tên Chất Liệu",
            "TenChatLieu.max" => "Tên Chất Liệu Quá Dài",
        ];
    }
}

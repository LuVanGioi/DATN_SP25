<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class ThongTinLienHeRequest extends FormRequest
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
            "TenPhuongThuc" => "required|max:255",
            "DuongDan" => "required",
        ];
    }

    public function messages(): array
    {
        return [
            "TenPhuongThuc.required" => "Vui Lòng Nhập Tên Phương Thức",
            "TenPhuongThuc.max" => "Tên Phương Thức Liên Hệ Quá Dài",

            "DuongDan.required" => "Vui Lòng Nhập Liên Kết Của Phương Thức"
        ];
    }
}

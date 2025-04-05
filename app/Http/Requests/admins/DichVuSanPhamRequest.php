<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class DichVuSanPhamRequest extends FormRequest
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
            "TenDichVuSanPham" => "required|max:255"
        ];
    }

    public function messages()
    {
        return [
            "TenDichVuSanPham.required" => "Vui Lòng Nhập Tên Dịch Vụ",

            "TenDichVuSanPham.max" => "Tên Dịch Vụ Quá Dài",
        ];
    }
}

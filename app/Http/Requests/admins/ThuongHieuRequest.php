<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class ThuongHieuRequest extends FormRequest
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
            "TenThuongHieu" => "required|max:255"
        ];
    }

    public function messages()
    {
        return [
            "TenThuongHieu.required" => "Vui Lòng Nhập Tên Thương Hiệu",
            "TenThuongHieu.max" => "Tên Thương Hiệu Quá Dài"
        ];
    }
}

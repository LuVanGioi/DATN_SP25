<?php

namespace App\Http\Requests\admins;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class BienTheRequest extends FormRequest
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
            'GiaTriBienThe.*' => 'required|max:225',
            "GiaTriBienTheMoi.*" => "required|max:225|unique:san_pham,TenSanPham",
        ];
    }

    public function messages(): array
    {
        return [
            "TenBienThe.required" => "Vui Lòng Nhập Tên Biến Thể",
            "TenBienThe.max" => "Tên Biến Thể Quá Dài",


            "GiaTriBienThe.*.required" => "Vui Lòng Nhập Giá Trị Biến Thể",
            "GiaTriBienThe.*.max" => "Giá trị Biến Thể Quá Dài",
        ];
    }
}

<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucSanPhamRequest extends FormRequest
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
            "TenDanhMucSanPham" => "required|max:255|unique:danh_muc_san_pham,TenDanhMucSanPham"
        ];
    }

    public function messages() {
        return [
            "TenDanhMucSanPham.required" => "Vui Lòng Nhập Tên Danh Mục Sản Phẩm",
            "TenDanhMucSanPham.max" => "Tên Danh Mục Quá Dài",
            "TenDanhMucSanPham.unique" => "Tên Danh Mục Đã Tồn Tại",
        ];
    }
}

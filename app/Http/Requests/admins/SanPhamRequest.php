<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
            'DanhMuc' => 'required',
            'ThuongHieu' => 'required',
            'ChatLieu' => 'required|max:225',
            'TenSanPham' => 'required|max:225',
            'hinhAnh' => 'image',
            'images.*' => 'image'
        ];
    }

    public function messages(): array
    {
        return [
            'DanhMuc.required' => 'Vui Lòng Chọn 1 Danh Mục',

            'ThuongHieu.required' => 'Vui Lòng Chọn 1 Thương Hiệu',
            
            'ChatLieu.required' => 'Vui Lòng Nhập Chất Liệu',
            'ChatLieu.max' => 'Tên Chất Liệu Quá Dài',

            'TenSanPham.required' => 'Vui Lòng Nhập Tên Sản Phẩm',
            'TenSanPham.max' => 'Tên Sản Phẩm Quá Dài',

            'hinhAnh.image' => 'Hình Ảnh Không Hợp Lệ',
        ];
    }
}

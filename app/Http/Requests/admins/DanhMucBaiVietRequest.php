<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucBaiVietRequest extends FormRequest
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
            'TenDanhMucBaiViet' => 'required|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'TenDanhMucBaiViet.required' => 'Vui lòng nhập tên danh mục',
            'TenDanhMucBaiViet.max' => 'Tên danh mục không được quá dài',
        ];
    }
}

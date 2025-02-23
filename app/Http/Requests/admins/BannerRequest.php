<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'TenBanner' => 'required|string|max:255',
            'HinhAnh.*' => 'image',
            'TrangThai' => 'required',
        ];
    }

    public function messages() {
        return [
            'TenBanner.required' => 'Tên banner không được để trống!',
            'TenBanner.max' => 'Tên banner quá dài!',
            'HinhAnh.*.image' => 'Hình ảnh không hợp lệ!',
            'TrangThai.required' => 'Trạng thái không được để trống!',
        ];
    }
}

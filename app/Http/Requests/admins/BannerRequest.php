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
            'HinhAnh.*' => 'image',
            'TrangThai' => 'required',
        ];
    }

    public function messages() {
        return [
            'HinhAnh.*.image' => 'Hình ảnh không hợp lệ!',
            'TrangThai.required' => 'Trạng thái không được để trống!',
        ];
    }
}

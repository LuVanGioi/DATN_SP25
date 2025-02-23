<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class BaiVietRequest extends FormRequest
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
        return
            [
                'hinh_anh' => 'image',
                'tieu_de' => 'required|string|max:255',
                'danh_muc_id' => 'required',
                'tac_gia' => 'required|string|max:255',
                'noi_dung' => 'required',
            ];
    }

    public function messages(): array
    {
        return
            [
                'hinh_anh.image' => 'Hình ảnh không hợp lệ',
                'tieu_de.required' => 'Vui lòng nhập tiêu đề',
                'tieu_de.max' => 'Tiêu đề không được quá 255 ký tự',
                'danh_muc_id.required' => 'Vui lòng chọn danh mục',
                'tac_gia.required' => 'Vui lòng nhập tác giả',
                'tac_gia.max' => 'Tác giả không được quá 255 ký tự',
                'noi_dung.required' => 'Vui lòng nhập nội dung',
            ];
    }
}

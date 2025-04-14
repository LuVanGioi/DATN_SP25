<?php

namespace App\Http\Requests\clients;

use Illuminate\Foundation\Http\FormRequest;

class cartRequest extends FormRequest
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
            "id_product" => "required|integer|exists:san_pham,id",
            "quantity"  => "required|integer|min:1",
        ];
    }

    public function messages()
    {
        return [
            "id_product.required" => "Sản Phẩm Không Hợp Lệ",
            "id_product.integer" => "Dữ Liệu Không Hợp Lệ",
            "id_product.exists" => "Sản Phẩm Không Tồn Tại",

            "quantity.required" => "Vui Lòng Nhập Số Lượng",
            "quantity.integer" => "Số Lượng Phải Là Số Nguyên",
            "quantity.min" => "Số Lượng Tối Thiểu Là 1"
        ];
    }

}

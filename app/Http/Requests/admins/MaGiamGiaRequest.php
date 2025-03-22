<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class MaGiamGiaRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'value' => 'required|integer|min:0',
            'min_value' => 'required|string', 
            'max_value' => 'required|string', 
            'condition' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|string|max:50',
        ];
    }

    /**
     * Get the validation error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên mã.',
            'name.max' => 'Tên mã không được vượt quá 255 ký tự.',
            'quantity.required' => 'Vui lòng nhập số lượng.',
            'quantity.min' => 'Số lượng không được nhỏ hơn 0.',
            'value.required' => 'Vui lòng nhập giá trị.',
            'min_value.required' => 'Vui lòng nhập giá trị tối thiểu.',
            'max_value.required' => 'Vui lòng nhập giá trị tối đa.',
            'condition.required' => 'Vui lòng nhập điều kiện.',
            'start_date.required' => 'Vui lòng chọn ngày bắt đầu.',
            'end_date.required' => 'Vui lòng chọn ngày kết thúc.',
            'status.required' => 'Vui lòng chọn trạng thái.',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     */
    protected function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $minValue = $this->min_value;
            $maxValue = $this->max_value;

            if (is_numeric($minValue) && is_numeric($maxValue)) {
                if ($minValue >= $maxValue) {
                    $validator->errors()->add('min_value', 'Giá trị tối thiểu phải nhỏ hơn giá trị tối đa.');
                }
            }
        });
    }
}
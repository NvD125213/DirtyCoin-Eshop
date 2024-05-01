<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'bail|required|unique:tb_products|max:255|min:10',
            'price' => 'required',
            'id_Cate' => 'required',
            'description' => 'required',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'name.max' => 'Tên không được vượt quá 255 ký tự!',
            'name.min' => 'Tên không được ngắn hơn 10 ký tự!',

            'price.required' => 'Giá không đươc để trống!',
            'id_Cate.required' => 'Danh mục không đươc để trống!',
            'description.required' => 'Nội dung không đươc để trống!',

        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoresliderRequest extends FormRequest
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
            'name' => 'bail|required|unique:tb_products|max:255',
            'description' => 'required',
            'link' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'name.max' => 'Tên không được vượt quá 255 ký tự!',
            'description.required' => 'Nội dung không đươc để trống!',
            'link.required' => 'Không được để trống file ảnh'
        ];
    }
}

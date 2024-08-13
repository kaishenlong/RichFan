<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'category_id'=> 'required',
            'name' => 'required',
            'price' => 'required|integer',
            'description' =>'required',
            'image' => 'image|mimes:png,jpg'
        ];
    }
    public function messages():array{
        return[
            'category_id.required' => 'category không được bỏ trống',
            'name.required' => 'Name không được bỏ trống',
            'name.unique' => 'Name đã tồn tại',
            'price.required' => 'Price không được bỏ trống',
            'price.integer' => 'Price phải là số',
            'description.required' => 'description không được bỏ trống',
            'image.image' => 'File phải là ảnh',
            'image.mimes' => 'Chỉ chấp nhận file ảnh png hoặc jpg'
        ];
    }
}

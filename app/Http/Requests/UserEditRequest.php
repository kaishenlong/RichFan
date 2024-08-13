<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'name' => 'required',
            'email' =>'required|email|unique:users,email',
            'role' => 'required'
        ];
    }
    public function messages():array{
        return[
            'name.required' => 'Name không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'role.required' => 'Vai trò không được bỏ trống'
        ];
    }
}

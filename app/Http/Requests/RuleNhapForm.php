<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use App\Models\User;

class RuleNhapForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc nhập',
            'name.max' => 'Không nhấp quá 255 ký tự',
            'email.required' => 'Nhập email',
            'email.email' => 'Nhập đúng định dạng email',
            'email.unique' => 'Mail đã được đăng ký bởi tài khoản khác',
            'password.required' => 'Nhập mật khẩu',
            'password.confirmed' => 'Mật khẩu xác nhận không chính xác'
        ];
    }
}

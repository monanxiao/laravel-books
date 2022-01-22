<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
     * 验证规则
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method())
        {
            case 'PATCH':
                return [
                    // 'email' => 'nullable|email:rfc,dns|unique:users,email',
                    'image' => 'nullable|image',
                    'name' => 'required|string',
                    'old_password' => 'nullable|min:6|required_with:new_password',
                    'new_password' => 'nullable|min:6|confirmed|required_with:old_password',
                    'new_password_confirmation' => 'nullable|min:6|required_with:new_password|same:new_password',
                ];
                break;

            case 'POST':
                return [
                    'email' => 'required|email|exists:users,email',
                    'password' => 'required|min:6',
                ];

        }


    }
}

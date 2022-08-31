<?php

namespace App\Http\Requests\SanctumRegister;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required|string',
            'email'    => 'required|string|unique:users,email',
            'password' => 'required|confirmed|max:30|min:5',
            'phone'    => 'required|string|unique:users,phone',
            'id_img'   => 'required|image',
            'role'     => 'required|string',
        ];
    }
}

<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'login'    => 'required|string',
            'password'    => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'login.required'   => 'Поле "логин" обязательно для заполнения',
            'password.required'   => 'Поле "пароль" обязательно для заполнения',
        ];
    }
}

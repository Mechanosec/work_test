<?php


namespace App\Http\Requests\User;


use Illuminate\Foundation\Http\FormRequest;

class AddToEventUserRequest extends FormRequest
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
            'eventId'    => 'required|int',
        ];
    }

    public function messages()
    {
        return [
            'eventId.required'   => 'Поле "id евента" обязательно для заполнения',
        ];
    }
}

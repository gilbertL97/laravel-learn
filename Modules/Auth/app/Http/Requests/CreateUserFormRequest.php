<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {

        return [
            'name' => 'required | min:4 | max:25| unique:users',
            'email' => 'required | email  | min:6 | max:50 | unique:users',
            'password' => 'required  | min:6 | max:100 | confirmed', // confirmed for password_confirmation
            //'password_confirmation' => 'required  | min:6 | max:100',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}

<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => 'L\'adresse email est requise',
            'email.email'       => 'L\'adresse email n\'est pas valide',
            'email.exists'      => 'Aucun compte n\'est associé à cette adresse',

            'password.required' => 'Le mot de passe est requis',
            'password.string'   => 'Le mot de passe doit être une chaîne de caractrèes'
        ];
    }
}

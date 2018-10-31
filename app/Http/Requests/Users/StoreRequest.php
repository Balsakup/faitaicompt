<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6|max:255|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => 'Le nom d\'affichage est requis',
            'name.string'        => 'Le nom d\'affichage doit être une chaîne de caractères',
            'name.max'           => 'Le nom d\'affichage ne doit pas dépasser 255 caractères',

            'email.required'     => 'L\'adresse email est requiss',
            'email.email'        => 'L\'adresse email doit être une chaîne de caractères',
            'email.unique'       => 'L\'adresse email est déjà utilisée',
            'email.max'          => 'L\'adresse email ne doit pas dépasser 255 caractères',

            'password.required'  => 'Le mot de passe est requis',
            'password.string'    => 'Le mot de passe doit être une chaîne de caractères',
            'password.min'       => 'Le mot de passe doit faire au minimum 6 caractères',
            'password.max'       => 'Le mot de passe doit ne doit pas dépasser 255 caractères',
            'password.confirmed' => 'la confirmation du mot de passe n\'est pas valide'
        ];
    }
}

<?php

namespace App\Http\Requests\Transactions;

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
            'name'                    => 'required|string|max:255',
            'amount'                  => 'required|numeric',
            'paid_at'                 => 'required|date',
            'transaction_category_id' => 'required|numeric|exists:transaction_categories,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required'                    => 'Le nom de la transaction est requis',
            'name.string'                      => 'Le nom de la transaction doit être une chaîne de caractères',
            'name.max'                         => 'Le nom de la transaction ne doit pas dépasser 255 caractères',

            'amount.required'                  => 'Le montant de la transaction est requis',
            'amount.numeric'                   => 'Le montant de la transaction doit être un chiffre',

            'paid_at.required'                 => 'La date de la transaction est requise',
            'paid_at.date'                     => 'La date de la transaction doit être une date',

            'transaction_category_id.required' => 'La catégorie de la transaction est requis',
            'transaction_category_id.numeric'  => 'La catégorie de la transaction doit être un chiffre',
            'transaction_category_id.exists'   => 'La catégorie de la transaction n\'existe pas'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name' => 'required|unique:products,name|min:3|max:255',
            'categories' => 'required|min:1|max:5',
            'features' => 'required|min:3|max:10',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Ce champ est obligatoire',
            'name.min' => 'Ce champ est doit être compris entre 3 et 255 caractères',
            'name.max' => 'Ce champ est doit être compris entre 3 et 255 caractères',
            'name.unique' => 'Ce produit existe déjà',

            'categories.required' => 'Ce champ est obligatoire',
            'categories.min' => 'Sélectionnez entre 1 et 5 catégories',
            'categories.max' => 'Sélectionnez entre 1 et 5 catégories',

            'features.required' => 'Ce champ est obligatoire',
            'features.min' => 'Sélectionnez entre 3 et 10 catégories',
            'features.max' => 'Sélectionnez entre 3 et 10 catégories',
        ];
    }
}

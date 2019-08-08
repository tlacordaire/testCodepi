<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategory extends FormRequest
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
            'name' => 'required|unique:categories,name|min:3|max:255'
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
            'name.unique' => 'Cette catégorie existe déjà',
        ];
    }
}

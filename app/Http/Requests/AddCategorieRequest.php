<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategorieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'categorie'=>'required|unique:categories,categorie',
            'status'=>'required',
        ];
    }



    public function messages(): array
    {
        return [
            'categorie.required'=>'La catégorie ',
            'status.required'=>'Une erreur c est produite au niveau du statut',
            'categorie.unique'=>'La catégorie existes déjà dans la base !',        
        
        ];
    }
}

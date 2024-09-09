<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBienImmobilierReqest extends FormRequest
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
            'titre'=>'required',
            'status'=>'required',
            'superficie'=>'required',
            'prix_location'=>'required',
            'image'=>'nullable|image|mimes:png,jpg,jpeg',
            'proprietaire_id'=>'required|exists:proprietaires,id',
            'categorie_id'=>'required|exists:categories,id',
        ];
    }

    public function messages(): array{

        return [
            'titre.required'=>'Le titre est requis ',
            'status.required'=>'Entrer le status',
            'superficie.required'=>'Veuillez renseigner la supperficie',
            'prix_location.required'=>'Veuillez entrer le prix de location',
            'image.image'=>'Le fichier doit etre une image !',
            'image.mimes'=>'L image doit etre de  type : png,jpg,jpeg ',
            'proprietaire_id.required'=>'Veuillez choisir le proprietaire !',
            'proprietaire_id.exists'=>'Le proprietaire  est introuvable !',
            'categorie_id.required'=>'Veuillez choisir la catégorie',
            'categorie_id.exists'=>'La catégorie  est introuvable !',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProprioRequest extends FormRequest
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
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required|email',
            'tel'=>'required',
            'profile'=>'nullable|image|mimes:jpg,jpeg,png',
            'adresse'=>'nullable',
            'id'=>'required|exists:proprietaires,id'
        ];
    }


    public function messages(): array
    {
        return [
            'nom.required'=>'Le nom est requis dans le formulaire',
            'prenom.required'=>'Le prenom est requis dans le formulaire',
            'email.email'=>'Le mail n est pas du bon type',
            'email.required'=>'Le mail est requis dans le formulaire',
            'tel.required'=>'Le numéro de téléphone est requis dans la base !',
            'profile.image'=>'Le fichier n est pas du bon format',
            'profile.mimes'=>'L image doit etre de type png,jpg,jpeg',
            'adresse'=>'nullable',
        ];
    }
}


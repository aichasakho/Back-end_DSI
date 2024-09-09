<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUsersAccountRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email',
            'tel'=>'required|unique:users,tel',
            'password'=>'required',
            'password_confirmation'=>'required',
        ];
    }


    public function messages(): array{

        return [
            'name.required'=>'Le nom est requis ! ',
            'email.required'=>'L email est requis !',
            'email.unique'=>'L email doit etre de type unique !',
            'tel.unique'=>'Le numéro de téléphone existe déjà !',
            'tel.required'=>'Le téléphone est requis !!',
            'password.required'=>'Le mot de passe est requis !',
            'password_confirmation.required'=>'Veuillez rentrer la confirmation du mot de passe !',

        ];
    }
}

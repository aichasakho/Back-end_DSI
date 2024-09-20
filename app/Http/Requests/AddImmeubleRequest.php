<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddImmeubleRequest extends FormRequest
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
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'proprietaire_id'=>'required|exists:users,id,role,proprietaire',
            'prix' => 'required',
            'localite_id' => 'required',
            'type_bien_id' => 'required',
            'agent_id' => 'required',
            'nbr_etage' => 'required',
            'nom_immeuble' => 'required',
            'date_construction' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Image est obligatoire',
            'image.image' => 'Image invalide',
            'image.mimes' => 'Image invalide',
            'proprietaire_id.required' => 'Proprietaire est obligatoire',
            'proprietaire_id.exists' => 'Proprietaire invalide',
            'prix.required' => 'Prix est obligatoire',
            'localite_id.required' => 'Localite est obligatoire',
            'type_bien_id.required' => 'Type de bien est obligatoire',
            'agent_id.required' => 'Agent est obligatoire',
            'nbr_etage.required' => 'Nombre d\'etage est obligatoire',
            'date_construction.required' => 'Date de construction est obligatoire',
            'etat.required' => 'Etat est obligatoire',
        ];
    }
}

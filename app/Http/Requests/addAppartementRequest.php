<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addAppartementRequest extends FormRequest
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
            'bien_immobilier_id' => 'required|exists:bien_immobiliers,id,type_bien_id,1',
            'nbr_piece' => 'required|numeric',
            'montant_caution' => 'required|numeric',
            'type_de_bail' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'bien_immobilier_id.required' => 'Le bien immobilier est obligatoire',
            'bien_immobilier_id.exists' => 'Le bien immobilier n\'existe pas',
            'nbr_piece.required' => 'Le nombre de pieces est obligatoire',
            'nbr_piece.numeric' => 'Le nombre de pieces doit etre un nombre',
            'montant_caution.required' => 'Le montant de la caution est obligatoire',
            'montant_caution.numeric' => 'Le montant de la caution doit etre un nombre',
            'type_de_bail.required' => 'Le type de bail est obligatoire',
        ];
    }
}

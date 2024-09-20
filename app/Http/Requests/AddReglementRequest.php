<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddReglementRequest extends FormRequest
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
      'date_reglement'=>'required',
      'numero_reglement'=>'required',
      'nom'=>'required',
      'contrat_id'=>'required|exists:contrats,id',
      'agent_id' => 'required|exists:users,id,role,agent',

    ];
  }


  public function messages(): array
  {
    return [
      'bien_immobilier_id.required' => 'Le bien immobilier est obligatoire',
      'bien_immobilier_id.exists' => 'Le bien immobilier n\'existe pas',
      'nom.required'=>'Le nom est requis dans le formulaire',
      'date_reglement.required'=>'La date de reglement est requis dans le formulaire',
      'numero_reglement.required'=>'Le numero de reglement est requis dans le formulaire',
      'agent_id.required' => 'L agent est requis !',
      'agent_id.exists' => 'L agent n existe pas !',
      'contrat_id.required' => 'Le contrat est requis !',
      'contrat_id.exists' => 'Le contrat n existe pas !',
    ];
  }
}

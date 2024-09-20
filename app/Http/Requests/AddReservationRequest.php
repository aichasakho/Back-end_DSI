<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddReservationRequest extends FormRequest
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
      'date_debut'=>'required',
      'date_fin'=>'required',
      'profession'=>'required',
      'situation_matrimoniale'=>'required',
      'client_nom'=>'required',
      'client_id'=>'required|exists:users,id,role,client',
      'bien_immobilier_id' => 'required|exists:bien_immobiliers,id,type_bien_id,1',
    ];
  }


  public function messages(): array
  {
    return [
      'bien_immobilier_id.required' => 'Le bien immobilier est obligatoire',
      'bien_immobilier_id.exists' => 'Le bien immobilier n\'existe pas',
      'date_debut.required'=>'La date de début est requis dans le formulaire',
      'date_fin.required'=>'La date de fin est requis dans le formulaire',
      'profession.required'=>'La profession est requis dans le formulaire',
      'situation_matrimonial.required'=>'La situation matrimonial est requis dans le formulaire',
      'client_nom.required'=>'Le nom du client est obligatoire',
      'client_id.required'=>'Le client est obligatoire',
      'client_id.exists' => 'Le client n\'existe pas',

    ];
  }
}

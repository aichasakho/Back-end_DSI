<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailReglementRequest extends FormRequest
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
      'reglement_id'=>'required|exists:reglements,id',
      'mois' => 'required',
      'annee' => 'required',
    ];
  }

  public function messages(): array
  {
    return [
      'mois.required' => 'Précisez le mois',
      'annee.numeric' => 'Précisez l"année',
      'reglement_id.required' => 'Le reglement est requis !',
      'reglement_id.exists' => 'Le regelement n existe pas !',

    ];
  }
}

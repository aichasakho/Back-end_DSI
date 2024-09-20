<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addAnnonceRequest extends FormRequest
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
      'type_annonce' => 'required',
      'description' => 'required',
      'statut' => 'required',
      'prix' => 'required|numeric',
      'bien_immobilier_id' => 'required|exists:bien_immobiliers,id,type_bien_id,1',

    ];
  }

  public function messages(): array
  {
    return [
      'bien_immobilier_id.required' => 'Le bien immobilier est obligatoire',
      'bien_immobilier_id.exists' => 'Le bien immobilier n\'existe pas',
      'description.required' => 'La description est obligatoire',
      'prix.required' => 'Le prix est obligatoire',
      'prix.numeric' => 'Le prix doit etre un nombre',
      'statut.required' => 'Le statut est obligatoire',
    ];
  }
}

<?php

namespace App\Http\Requests;

use App\Models\Parcelle;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class addParcelleRequest extends FormRequest
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
      'numero_parcelle' => ['required', Rule::unique(Parcelle::class, 'numero_parcelle')
        ->ignore($this->parcelle)],
      'superficie' => 'required|numeric',
      'bien_immobilier_id' => 'required|exists:bien_immobiliers,id',
    ];
  }

  public function messages(): array
  {
    return [
      'numero_parcelle.required' => 'Le numero de parcelle est requis !',
      'numero_parcelle.unique' => 'Le numero de parcelle existe deja !',
      'superficie.required' => 'La superficie est requise !',
      'superficie.numeric' => 'La superficie doit etre numerique !',
      'bien_immobilier_id.required' => 'Le bien immobilier est requis !',
      'bien_immobilier_id.exists' => 'Le bien immobilier n existe pas !',
    ];
  }
}

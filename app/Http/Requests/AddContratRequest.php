<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddContratRequest extends FormRequest
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
      'prix' => 'required|numeric',
      'localite_id' => 'required|exists:localites,id',
      'type_bien_id' => 'required|exists:type_bien,id',
      'proprietaire_id' => 'required|exists:users,id,role,proprietaire',
      'agent_id' => 'required|exists:users,id,role,agent',
      'superficie' => 'required|numeric',
      'nbr_piece' => 'required|numeric',
    ];
  }

  public function messages(): array
  {
    return [
      'image.required' => 'L image est requise !',
      'image.image' => 'L image doit etre de type image !',
      'image.mimes' => 'L image doit etre de type png,jpg,jpeg !',
      'prix.required' => 'Le prix est requis !',
      'prix.numeric' => 'Le prix doit etre numerique !',
      'localite_id.required' => 'La localite est requise !',
      'localite_id.exists' => 'La localite n existe pas !',
      'type_bien_id.required' => 'Le type de bien est requis !',
      'type_bien_id.exists' => 'Le type de bien n existe pas !',
      'proprietaire_id.required' => 'Le proprietaire est requis !',
      'proprietaire_id.exists' => 'Le proprietaire n existe pas !',
      'agent_id.required' => 'L agent est requis !',
      'agent_id.exists' => 'L agent n existe pas !',
      'superficie.required' => 'La superficie est requise !',
      'superficie.numeric' => 'La superficie doit etre numerique !',
      'nbr_piece.required' => 'Le nombre de piece est requis !',
      'nbr_piece.numeric' => 'Le nombre de piece doit etre numerique !',
    ];
  }
}

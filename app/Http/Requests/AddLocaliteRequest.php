<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddLocaliteRequest extends FormRequest
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
      'ville' => 'required',
      'region' => 'required',
      'quartier' => 'required',
    ];
  }

  public function messages(): array
  {
    return [
      'ville.required' => 'Le ville est obligatoire',
      'region.required' => 'La région est obligatoire',
      'quartier.required' => 'Le quartier est obligatoire',
    ];
  }
}

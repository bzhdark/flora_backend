<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RucherRequest extends FormRequest
{
  public function rules(): array
  {
    return [
      'nom' => ['required', 'string'],
      'latitude' => ['nullable', 'numeric'],
      'longitude' => ['nullable', 'numeric'],
      'environnement' => ['nullable', 'string'],
      'adresse1' => ['nullable', 'string'],
      'adresse2' => ['nullable', 'string'],
      'code_postal' => ['nullable', 'string'],
      'ville' => ['nullable', 'string'],
      'pays' => ['nullable', 'string'],
    ];
  }

  public function authorize(): bool
  {
    return true;
  }
}

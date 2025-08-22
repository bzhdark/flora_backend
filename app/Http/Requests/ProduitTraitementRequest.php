<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitTraitementRequest extends FormRequest
{
  public function rules(): array
  {
    return [
      'nom' => ['required'],
      'lanieres' => ['boolean'],
    ];
  }

  public function authorize(): bool
  {
    return true;
  }
}

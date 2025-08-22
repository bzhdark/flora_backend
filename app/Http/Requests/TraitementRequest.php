<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TraitementRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'notes' => ['required'],
            'autres_traitements' => ['required'],
            'produit_traitement_id' => ['required', 'exists:produits_traitements'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

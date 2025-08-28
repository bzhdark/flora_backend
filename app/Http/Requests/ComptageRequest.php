<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComptageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'visite_id' => ['required', 'exists:visites'],
            'suit_traitement' => ['boolean'],
            'type' => ['required'],
            'nb_varroas' => ['nullable', 'integer'],
            'duree' => ['nullable', 'integer'],
            'poids_abeilles' => ['nullable', 'integer'],
            'produits_traitement_id' => ['nullable', 'exists:produits_traitements'],
            'nb_abeilles' => ['nullable', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

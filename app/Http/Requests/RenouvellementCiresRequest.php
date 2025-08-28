<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RenouvellementCiresRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'visite_id' => ['required', 'exists:visites'],
            'nb_cadres' => ['required', 'integer'],
            'commentaires' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

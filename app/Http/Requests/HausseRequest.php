<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HausseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reference' => ['required', 'string', 'max:255', "min:1"],
            'taux_remplissage' => ['required', 'integer', 'min:0', 'max:100'],
            'ruche_id' => ['nullable', "integer", 'exists:ruches,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

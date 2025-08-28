<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReunionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'visite_id' => ['required', 'exists:visites'],
            'ruche_destination_id' => ['nullable', 'exists:ruches'],
            'ruche_origine_id' => ['nullable', 'exists:ruches'],
            'reine_origine_id' => ['nullable', 'exists:reines'],
            'reine_destination_id' => ['nullable', 'exists:reines'],
            'reine_conservee_id' => ['nullable', 'exists:reines'],
            'commentaires' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

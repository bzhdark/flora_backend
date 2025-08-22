<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RucherRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => ['required'],
            'exploitation_id' => ['required', 'exists:exploitations'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
            'environnement' => ['nullable'],
            'adresse1' => ['nullable'],
            'adresse2' => ['nullable'],
            'code_postal' => ['nullable'],
            'ville' => ['nullable'],
            'pays' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

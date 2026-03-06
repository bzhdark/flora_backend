<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHausseBulkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'prefixe' => ['nullable', 'string'],
            'suffixe' => ['nullable', 'string'],
            'numero_depart' => ['required', 'integer'],
            'nb_a_creer' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransvasementRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'visite_id' => ['required', 'exists:visites'],
            'ruche_destination_id' => ['nullable', 'exists:ruches'],
            'ruche_origine_id' => ['nullable', 'exists:ruches'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

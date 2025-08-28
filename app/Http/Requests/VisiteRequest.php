<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisiteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date' => ['required'],
            'auteur_id' => ['required', 'exists:users'],
            'nom' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

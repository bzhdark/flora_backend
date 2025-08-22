<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtractionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date' => ['required'],
            'auteur_id' => ['required', 'exists:users'],
            'miellee_id' => ['required', 'exists:miellees'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

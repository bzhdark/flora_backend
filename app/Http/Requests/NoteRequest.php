<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ruche_id' => ['nullable', 'exists:ruches'],
            'rucher_id' => ['nullable', 'exists:ruchers'],
            'titre' => ['required'],
            'contenu' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'titre' => ['required'],
            'description' => ['nullable'],
            'rucher_id' => ['nullable', 'exists:ruchers'],
            'ruche_id' => ['nullable', 'exists:ruches'],
            'exploitation_id' => ['required', 'exists:exploitations'],
            'date' => ['nullable', 'date'],
            'dateNotification' => ['nullable', 'date'],
            'notif_envoyee' => ['boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

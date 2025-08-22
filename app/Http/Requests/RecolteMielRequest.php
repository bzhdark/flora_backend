<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecolteMielRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'miellee_id' => ['required', 'exists:miellees'],
            'nb_hausses_recoltees' => ['required', 'integer'],
            'qte_miel_recolte' => ['nullable', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

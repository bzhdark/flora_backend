<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReineRequest extends FormRequest{
    public function rules(): array
    {
        return [
            'reference' => ['required'],
'exploitation_id' => ['required', 'exists:exploitations'],
'annee_naissance' => ['required', 'integer'],
'numero_dossard' => ['nullable'],
'marquee' => ['boolean'],
'type_souche' => ['nullable'],
'mere_id' => ['nullable', 'exists:reines'],
'pere' => ['nullable'],
'commentaires' => ['nullable'],//
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

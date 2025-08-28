<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NettoyagePlancherRequest extends FormRequest{
    public function rules(): array
    {
        return [
            'visite_id' => ['required', 'exists:visites'],
'niveau_proprete' => ['required', 'integer'],
'presence_mycoses' => ['boolean'],
'presence_rongeurs' => ['boolean'],
'commentaires' => ['nullable'],//
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

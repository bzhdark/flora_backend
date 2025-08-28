<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DivisionRequest extends FormRequest{
    public function rules(): array
    {
        return [
            'visite_id' => ['required', 'exists:visites'],
'nb_cadres_pris' => ['required', 'integer'],
'ruche_destination_id' => ['nullable', 'exists:ruches'],
'commentaires' => ['nullable'],
'reine_prise' => ['boolean'],//
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

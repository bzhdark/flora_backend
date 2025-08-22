<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoseHaussesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nb_hausses_posees' => ['required', 'integer'],
            'visite_id' => ['required', 'exists:visites'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

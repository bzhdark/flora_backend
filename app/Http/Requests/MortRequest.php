<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MortRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ruche_id' => ['required', 'exists:ruches,id'],
            'date' => ['required', 'date:Y-m-d'],
            'commentaires' => ["string", 'nullable', "max:255"],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

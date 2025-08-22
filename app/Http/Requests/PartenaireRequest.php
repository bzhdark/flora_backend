<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartenaireRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => ['required'],
            'code' => ['required'],
            'exploitation_id' => ['required', 'exists:exploitations'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

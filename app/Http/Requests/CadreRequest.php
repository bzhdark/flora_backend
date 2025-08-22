<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'position' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

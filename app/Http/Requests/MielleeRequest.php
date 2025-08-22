<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MielleeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

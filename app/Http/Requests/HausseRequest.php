<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HausseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reference' => ['required'],
            'qr_code' => ['required'],
            'ruche_id' => ['nullable', 'exists:ruches'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

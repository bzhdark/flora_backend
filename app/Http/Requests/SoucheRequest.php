<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoucheRequest extends FormRequest{
    public function rules(): array
    {
        return [
            'nom' => ['required'],
'exploitation_id' => ['required', 'exists:exploitations'],//
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

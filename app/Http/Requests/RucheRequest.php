<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RucheRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reference' => ['required'],
            'note' => ['required', 'integer'],
            'qr_code' => ['required'],
            'gestion_rbc' => ['boolean'],
            'archivee' => ['boolean'],
            'rucher_id' => ['required', 'exists:ruchers'],
            'exploitation_id' => ['required', 'exists:exploitations'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

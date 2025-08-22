<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
  public function rules(): array
  {
    return [
      'peut_creer_ruchers' => ['boolean'],
      'exploitation_id' => ['required', 'exists:exploitations'],
      'peut_creer_taches' => ['boolean'],
      'peut_modifier_planning' => ['boolean'],
      'peut_inviter_apiculteurs' => ['required'],
      'peut_modifier_exploitation' => ['required'],
      'peut_exporter_documents' => ['required'],
    ];
  }

  public function authorize(): bool
  {
    return true;
  }
}

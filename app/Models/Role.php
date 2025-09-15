<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
  use HasFactory;

  protected $guarded = [
    'id',
  ];

  public function exploitation(): BelongsTo
  {
    return $this->belongsTo(Exploitation::class);
  }

  public function ruchers(): BelongsToMany
  {
    return $this->belongsToMany(Rucher::class, 'role_rucher', 'role_id', 'rucher_id')
      ->withPivot('peut_modifier', 'peut_lire');
  }

  public function users(): BelongsToMany
  {
    return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
  }

  public function canEditRucher(Rucher $rucher) {
    if ($this->exploitation_id !== $rucher->exploitation_id) {
      return false;
    }
    if ($this->acces_complet_ruchers) {
      return true;
    }
    return $this->ruchers()->where('rucher_id', $rucher->id)->where('peut_modifier', true)->exists();
  }

  public function canReadRucher(Rucher $rucher) {
    if ($this->exploitation_id !== $rucher->exploitation_id) {
      return false;
    }
    if ($this->acces_complet_ruchers) {
      return true;
    }
    return $this->ruchers()->where('rucher_id', $rucher->id)->where('peut_lire', true)->exists();
  }

  protected function casts(): array
  {
    return [
      'peut_creer_ruchers' => 'boolean',
      'peut_creer_taches' => 'boolean',
      'peut_modifier_planning' => 'boolean',
      'peut_inviter_apiculteurs' => 'boolean',
      'peut_modifier_exploitation' => 'boolean',
      'peut_exporter_documents' => 'boolean',
    ];
  }
}

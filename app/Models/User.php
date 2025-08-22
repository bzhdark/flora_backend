<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  /** @use HasFactory<\Database\Factories\UserFactory> */
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var list<string>
   */
  protected $guarded = ["id"];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var list<string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];
  }

  public function exploitations(): BelongsToMany
  {
    return $this->belongsToMany(Exploitation::class, 'exploitation_user', 'user_id', 'exploitation_id');
  }

  public function currentExploitation(): BelongsTo
  {
    return $this->belongsTo(Exploitation::class, 'current_exploitation_id');
  }

  public function roles(): BelongsToMany
  {
    return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
  }

  public function ownsCurrentExploitation(): bool
  {
    $exploitation = Exploitation::findOrFail($this->current_exploitation_id);
    if ($exploitation->proprietaire_id === $this->id) {
      return true;
    }
    return false;
  }

  public function canEditRucher(Rucher $rucher): bool
  {
    $exploitation = $rucher->exploitation;
    // L'apiculteur est il le propriétaire de l'exploitation ?
    if ($exploitation->proprietaire_id === $this->id) {
      return true;
    }

    // L'apiculteur fait-il partie de l'exploitation ?
    $exploitationsIds = $this->exploitations->pluck('id');
    if (!$exploitationsIds->contains($exploitation->id)) {
      return false;
    }

    // Le rucher est-il en accès libre ?
    if ($rucher->acces_complet) {
      return true;
    }

    // L'apiculteur a-t-il un rôle qui permet de modifier le rucher ?
    return $this->roles()
      ->whereHas('ruchers', function ($query) use ($rucher) {
        $query->where('rucher_id', $rucher->id)
          ->where('peut_modifier', true);
      })
      ->exists();
  }

  public function canViewRucher(Rucher $rucher): bool
  {
    return $this->roles()
      ->whereHas('ruchers', function ($query) use ($rucher) {
        $query->where('rucher_id', $rucher->id)
          ->where('peut_lire', true);
      })
      ->exists();
  }
}

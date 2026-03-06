<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

  public function visites(): BelongsToMany
  {
    return $this->belongsToMany(Visite::class, 'user_visite', 'user_id', 'visite_id');
  }

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

  // public function exploitations(): BelongsToMany
  // {
  //     return $this->belongsToMany(Exploitation::class, 'exploitation_user', 'user_id', 'exploitation_id');
  // }

  public function exploitations()
  {
    return $this->belongsToMany(Exploitation::class, 'exploitation_user_role')
      ->withPivot('role_id', 'joined_at', 'left_at', 'is_active');
  }

  public function ownedExploitations()
  {
    return $this->hasMany(Exploitation::class, 'proprietaire_id');
  }

  // public function ownedExploitations(): BelongsToMany
  // {
  //     return $this->belongsToMany(Exploitation::class, 'exploitation_user', 'user_id', 'exploitation_id')->where('proprietaire_id', $this->id);
  // }

  public function exploitationRoles(): HasMany
  {
    return $this->hasMany(ExploitationUserRole::class);
  }


  public function currentExploitation(): BelongsTo
  {
    return $this->belongsTo(Exploitation::class, 'current_exploitation_id');
  }

  public function currentRole(): ?Role
  {
    if (!$this->current_exploitation_id) {
      return null;
    }
    // return $this->roles()->whereExploitationId("$this->current_exploitation_id")->first();
    return $this->exploitationRoles()
      ->where('exploitation_id', $this->current_exploitation_id)
      ->with('role')
      ->first()?->role;
  }

  // public function roles(): BelongsToMany
  // {
  //     return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
  // }


  public function ownsCurrentExploitation(): bool
  {
    $exploitation = Exploitation::findOrFail($this->current_exploitation_id);
    return $exploitation->proprietaire_id === $this->id;
  }

  public function canEditRucher(Rucher $rucher): bool
  {
    if ($this->isBlocked()) {
      return false;
    }
    $role = $this->currentRole();
    if (!$role) {
      return false;
    }
    return $role->canEditRucher($rucher);
  }

  public function canViewRucher(Rucher $rucher): bool
  {
    $role = $this->currentRole();
    if (!$role) {
      return false;
    }
    return $role->canEditRucher($rucher);
  }

  public function isPremium(): bool
  {
    return false;
  }

  public function isBlocked(): bool
  {
    if ($this->isPremium()) {
      return false;
    }
    // Bloquer si l'utilisateur n'est pas premium et qu'il a plus d'une exploitation
    $exploitations = $this->ownedExploitations()->count();
    if ($exploitations > 1) {
      return true;
    }
    // 10 ruches max par user
    $ruches = $this->ownedExploitations()->with('ruchesNonArchivees')->get()->pluck('ruches')->flatten();
    $nbRuches = $ruches->count();
    if ($nbRuches > 10) {
      return true;
    }
    // Sinon
    return false;
  }

  public function associerExploitation(Exploitation $exploitation, Role $role)
  {
    if ($role->exploitation_id !== $exploitation->id) {
      abort(403, "Ce role n'appartient pas à la bonne exploitation");
    }
    $this->exploitationRoles()->updateOrCreate([
      "exploitation_id" => $exploitation->id,
      "role_id" => $role->id
    ]);
  }

  public function ruchers()
  {
    return $this->currentRole()->ruchers()->get();
  }
}

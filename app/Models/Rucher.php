<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rucher extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function exploitation(): BelongsTo
    {
        return $this->belongsTo(Exploitation::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_rucher', 'rucher_id', 'role_id')
            ->withPivot('peut_modifier', 'peut_lire');
    }

    public function partenaires(): BelongsToMany
    {
        return $this->belongsToMany(Partenaire::class, 'partenaire_rucher', 'rucher_id', 'partenaire_id');
    }

    public function ruches(): HasMany
    {
        return $this->hasMany(Ruche::class);
    }

    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }
}

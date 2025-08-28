<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Ruche extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

//    protected $appends = ["couleur_reine"];

    protected function casts(): array
    {
        return [
            'gestion_rbc' => 'boolean',
            'archivee' => 'boolean',
        ];
    }

    public function rucher(): BelongsTo
    {
        return $this->belongsTo(Rucher::class);
    }

    public function exploitation(): BelongsTo
    {
        return $this->belongsTo(Exploitation::class);
    }

    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class);
    }

    public function hausses(): HasMany
    {
        return $this->hasMany(Hausse::class);
    }

    public function visites(): HasMany
    {
        return $this->hasMany(Visite::class);
    }

    public function nourrissements(): HasManyThrough
    {
        return $this->hasManyThrough(Nourrissement::class, Visite::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function souche(): BelongsTo
    {
        return $this->belongsTo(Souche::class, 'souche_id');
    }

    public function reine(): BelongsTo
    {
        return $this->belongsTo(Reine::class, 'reine_id');
    }
}

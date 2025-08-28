<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Souche extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function exploitation(): BelongsTo
    {
        return $this->belongsTo(Exploitation::class);
    }

    public function ruches(): HasMany
    {
        return $this->hasMany(Ruche::class);
    }

    public function reines(): HasMany
    {
        return $this->hasMany(Reine::class);
    }
}

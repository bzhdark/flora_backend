<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Extraction extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function auteur(): BelongsTo
    {
        return $this->belongsTo(User::class, 'auteur_id');
    }

    public function miellee(): BelongsTo
    {
        return $this->belongsTo(Miellee::class);
    }

    public function haussesRecoltees(): HasMany
    {
        return $this->hasMany(HausseRecoltee::class);
    }
}

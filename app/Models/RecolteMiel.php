<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RecolteMiel extends Model
{
    use HasFactory;

    protected $table = 'recoltes_miel';

    protected $guarded = ["id"];

    public function miellee(): BelongsTo
    {
        return $this->belongsTo(Miellee::class);
    }

    public function visite(): BelongsTo
    {
        return $this->belongsTo(Visite::class);
    }

    public function haussesRecoltees(): HasMany
    {
        return $this->hasMany(HausseRecoltee::class);
    }
}

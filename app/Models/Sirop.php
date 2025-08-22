<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sirop extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function nourrissements(): HasMany
    {
        return $this->hasMany(Nourrissement::class);
    }

    public function exploitation(): BelongsTo
    {
        return $this->belongsTo(Exploitation::class);
    }
}

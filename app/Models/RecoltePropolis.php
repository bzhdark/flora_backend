<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecoltePropolis extends Model
{
    use HasFactory;

    protected $table = 'recoltes_propolis';

    protected $guarded = ["id"];

    public function visite(): BelongsTo
    {
        return $this->belongsTo(Visite::class);
    }
}

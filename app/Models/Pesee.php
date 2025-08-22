<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pesee extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    protected $casts = [
        'poids' => "double",
    ];

    public function visite(): BelongsTo
    {
        return $this->belongsTo(Visite::class);
    }
}

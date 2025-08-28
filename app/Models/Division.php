<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Division extends Model
{
    use HasFactory;

    protected $guarded = [
        "id"
    ];

    public function visite(): BelongsTo
    {
        return $this->belongsTo(Visite::class);
    }

    public function rucheDestination(): BelongsTo
    {
        return $this->belongsTo(Ruche::class, 'ruche_destination_id');
    }

    protected function casts(): array
    {
        return [
            'reine_prise' => 'boolean',
        ];
    }
}

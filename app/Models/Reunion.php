<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reunion extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function visite(): BelongsTo
    {
        return $this->belongsTo(Visite::class);
    }

    public function rucheDestination(): BelongsTo
    {
        return $this->belongsTo(Ruche::class, 'ruche_destination_id');
    }

    public function rucheOrigine(): BelongsTo
    {
        return $this->belongsTo(Ruche::class, 'ruche_origine_id');
    }

    public function reineOrigine(): BelongsTo
    {
        return $this->belongsTo(Reine::class, 'reine_origine_id');
    }

    public function reineDestination(): BelongsTo
    {
        return $this->belongsTo(Reine::class, 'reine_destination_id');
    }

    public function reineConservee(): BelongsTo
    {
        return $this->belongsTo(Reine::class, 'reine_conservee_id');
    }
}

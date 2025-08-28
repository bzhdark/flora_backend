<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reine extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $appends = ["couleur"];


    protected function casts(): array
    {
        return [
            'marquee' => 'boolean',
            'morte' => 'boolean',
            'vendue' => 'boolean',
            'donnee' => 'boolean',
            'essaimee' => 'boolean',
        ];
    }

    public function getCouleurAttribute(): string
    {
        return "blue";
    }

    public function exploitation(): BelongsTo
    {
        return $this->belongsTo(Exploitation::class);
    }

    public function mere(): BelongsTo
    {
        return $this->belongsTo(Reine::class, 'mere_id');
    }

    public function souche(): BelongsTo
    {
        return $this->belongsTo(Souche::class, 'souche_id');
    }
}

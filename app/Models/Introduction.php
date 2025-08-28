<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Introduction extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function visite(): BelongsTo
    {
        return $this->belongsTo(Visite::class);
    }

    public function reine(): BelongsTo
    {
        return $this->belongsTo(Reine::class);
    }

    public function souche(): BelongsTo
    {
        return $this->belongsTo(Souche::class);
    }

    public function mere(): BelongsTo
    {
        return $this->belongsTo(Reine::class, 'mere_id');
    }

    public function ruche(): HasOneThrough
    {
        return $this->hasOneThrough(Ruche::class, Visite::class);
    }

    protected function casts(): array
    {
        return [
            'echec' => 'boolean',
            'terminee' => 'boolean',
        ];
    }
}

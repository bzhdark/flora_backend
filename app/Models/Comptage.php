<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comptage extends Model
{
    use HasFactory;

    protected $fillable = [
        'visite_id',
        'suit_traitement',
        'type',
        'nb_varroas',
        'duree',
        'poids_abeilles',
        'produits_traitement_id',
        'nb_abeilles',
    ];

    public function visite(): BelongsTo
    {
        return $this->belongsTo(Visite::class);
    }

    public function produitsTraitement(): BelongsTo
    {
        return $this->belongsTo(ProduitTraitement::class, 'produits_traitement_id');
    }

    protected function casts(): array
    {
        return [
            'suit_traitement' => 'boolean',
        ];
    }
}

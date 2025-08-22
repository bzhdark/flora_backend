<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Traitement extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function produitTraitement(): BelongsTo
    {
        return $this->belongsTo(ProduitTraitement::class, "produit_traitement_id");
    }

    public function visite(): BelongsTo
    {
        return $this->belongsTo(Visite::class);
    }
}

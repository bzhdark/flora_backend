<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cadre extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function typeCadres(): BelongsToMany
    {
        return $this->belongsToMany(TypeCadre::class, 'cadre_types_cadre', 'cadre_id', 'type_cadre_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TypeCadre extends Model
{
    use HasFactory;

    protected $table = 'types_cadres';

    protected $guarded = ["id"];

    public function cadres(): BelongsToMany
    {
        return $this->belongsToMany(Cadre::class, 'cadre_types_cadre', 'type_cadre_id', 'cadre_id');
    }

    protected function casts(): array
    {
        return [
            'est_divisible' => 'boolean',
        ];
    }
}

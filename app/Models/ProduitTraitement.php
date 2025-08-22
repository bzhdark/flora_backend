<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitTraitement extends Model
{
    use HasFactory;

    protected $table = 'produits_traitements';

    protected $guarded = ["id"];

    protected function casts(): array
    {
        return [
            'lanieres' => 'boolean',
        ];
    }
}

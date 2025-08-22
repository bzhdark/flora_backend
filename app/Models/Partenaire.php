<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Partenaire extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function exploitation(): BelongsTo
    {
        return $this->belongsTo(Exploitation::class);
    }

    public function ruchers(): BelongsToMany
    {
        return $this->belongsToMany(Rucher::class, 'partenaire_rucher', 'partenaire_id', 'rucher_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HausseRecoltee extends Model
{
    use HasFactory;

    protected $table = 'hausses_recoltees';

    protected $guarded = ["id"];

    public function recoltesMiel(): BelongsTo
    {
        return $this->belongsTo(RecolteMiel::class, 'recoltes_miel_id');
    }

    public function hausse(): BelongsTo
    {
        return $this->belongsTo(Hausse::class, "hausse_id");
    }

    public function ruche(): BelongsTo
    {
        return $this->belongsTo(Ruche::class, "ruche_id");
    }

    public function exploitation(): BelongsTo
    {
        return $this->belongsTo(Exploitation::class);
    }

    public function extraction(): BelongsTo
    {
        return $this->belongsTo(Extraction::class, "ruche_id");
    }
}

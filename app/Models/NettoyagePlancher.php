<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NettoyagePlancher extends Model
{
    use HasFactory;

    protected $table = 'nettoyages_planchers';

    protected $guarded = ["id"];

    public function visite(): BelongsTo
    {
        return $this->belongsTo(Visite::class);
    }

    protected function casts(): array
    {
        return [
            'presence_mycoses' => 'boolean',
            'presence_rongeurs' => 'boolean',
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PoseElement extends Model
{
    use HasFactory;

    protected $table = 'poses_elements';

    protected $guarded = ["id"];

    public function visite(): BelongsTo
    {
        return $this->belongsTo(Visite::class);
    }

    protected function casts(): array
    {
        return [
            'grille_a_reine' => 'boolean',
            'grille_a_propolis' => 'boolean',
            'chasse_abeilles' => 'boolean',
            'bonnet' => 'boolean',
            'chaussette' => 'boolean',
            'chaussure' => 'boolean',
            'echarpe' => 'boolean',
            'coussin' => 'boolean',
            'lange' => 'boolean',
            'lanieres' => 'boolean',
            'trappe_a_pollen' => 'boolean',
        ];
    }
}

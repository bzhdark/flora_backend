<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class PoseElement extends Model {
        use HasFactory;

        protected $table = 'poses_elements';

        protected $fillable = [
        'visite_id',
        'grille_a_reine',
        'grille_a_propolis',
        'chasse_abeilles',
        'bonnet',
        'chaussette',
        'chaussure',
        'echarpe',
        'coussin',
        'lange',
        'lanieres',
        'trappe_a_pollen',
        ];

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

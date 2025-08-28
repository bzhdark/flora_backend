<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Introduction extends Model {
        use HasFactory;

        protected $fillable = [
        'visite_id',
        'reine_id',
        'souche_id',
        'mere_id',
        'generation',
        'type',
        'age_cellule',
        'date_introduction',
        'date_ctrl_naissance',
        'date_ctrl_ponte',
        'echec',
        'terminee',
        ];

        public function visite(): BelongsTo
        {
        return $this->belongsTo(Visite::class);
        }

        public function reine(): BelongsTo
        {
        return $this->belongsTo(Reine::class);
        }

        public function souche(): BelongsTo
        {
        return $this->belongsTo(Souche::class);
        }

        public function mere(): BelongsTo
        {
        return $this->belongsTo(Reine::class, 'mere_id');
        }

        protected function casts(): array
        {
        return [
        'echec' => 'boolean',
        'terminee' => 'boolean',
        ];
        }
    }

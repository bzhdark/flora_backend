<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Transvasement extends Model {
        use HasFactory;

        protected $fillable = [
        'visite_id',
        'ruche_destination_id',
        'ruche_origine_id',
        ];

        public function visite(): BelongsTo
        {
        return $this->belongsTo(Visite::class);
        }

        public function rucheDestination(): BelongsTo
        {
        return $this->belongsTo(Ruche::class, 'ruche_destination_id');
        }

        public function rucheOrigine(): BelongsTo
        {
        return $this->belongsTo(Ruche::class, 'ruche_origine_id');
        }
    }

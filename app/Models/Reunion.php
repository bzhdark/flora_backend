<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Reunion extends Model {
        use HasFactory;

        protected $fillable = [
        'visite_id',
        'ruche_destination_id',
        'ruche_origine_id',
        'reine_origine_id',
        'reine_destination_id',
        'reine_conservee_id',
        'commentaires',
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

        public function reineOrigine(): BelongsTo
        {
        return $this->belongsTo(Reine::class, 'reine_origine_id');
        }

        public function reineDestination(): BelongsTo
        {
        return $this->belongsTo(Reine::class, 'reine_destination_id');
        }

        public function reineConservee(): BelongsTo
        {
        return $this->belongsTo(Reine::class, 'reine_conservee_id');
        }
    }

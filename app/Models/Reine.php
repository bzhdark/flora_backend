<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Reine extends Model {
        use HasFactory;

        protected $fillable = [
        'reference',
        'exploitation_id',
        'annee_naissance',
        'numero_dossard',
        'marquee',
        'type_souche',
        'mere_id',
        'pere',
        'commentaires',
        ];

        public function exploitation(): BelongsTo
        {
        return $this->belongsTo(Exploitation::class);
        }

        public function mere(): BelongsTo
        {
        return $this->belongsTo(Reine::class, 'mere_id');
        }

        protected function casts(): array
        {
        return [
        'marquee' => 'boolean',
        ];
        }
    }

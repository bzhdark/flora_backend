<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class RenouvellementCires extends Model {
        use HasFactory;

        protected $table = 'renouvellements_cires';

        protected $fillable = [
        'visite_id',
        'nb_cadres',
        'commentaires',
        ];

        public function visite(): BelongsTo
        {
        return $this->belongsTo(Visite::class);
        }
    }

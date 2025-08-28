<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Note extends Model {
        use HasFactory;

        protected $fillable = [
        'ruche_id',
        'rucher_id',
        'titre',
        'contenu',
        ];

        public function ruche(): BelongsTo
        {
        return $this->belongsTo(Ruche::class);
        }

        public function rucher(): BelongsTo
        {
        return $this->belongsTo(Rucher::class);
        }
    }

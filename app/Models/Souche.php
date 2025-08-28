<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Souche extends Model {
        use HasFactory;

        protected $fillable = [
        'nom',
        'exploitation_id',
        ];

        public function exploitation(): BelongsTo
        {
        return $this->belongsTo(Exploitation::class);
        }
    }

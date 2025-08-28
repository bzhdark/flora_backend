<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Controle extends Model {
        use HasFactory;

        protected $fillable = [
        'visite_id',
        'comportement',
        'force',
        'reserves',
        'reine_vue',
        'debut_de_ponte',
        'essaimee',
        'males',
        'couvain_platre',
        'loque_americaine',
        'loque_europeenne',
        'nosemose',
        'maladie_noire',
        'autre_virus',
        'frelon_europeen',
        'frelon_asiatique',
        'frelon_oriental',
        'varroas',
        'fausse_teigne',
        'aethina_tumida',
        ];

        public function visite(): BelongsTo
        {
        return $this->belongsTo(Visite::class);
        }

        protected function casts(): array
        {
        return [
        'reine_vue' => 'boolean',
        'debut_de_ponte' => 'boolean',
        'essaimee' => 'boolean',
        'couvain_platre' => 'boolean',
        'loque_americaine' => 'boolean',
        'loque_europeenne' => 'boolean',
        'nosemose' => 'boolean',
        'maladie_noire' => 'boolean',
        'frelon_europeen' => 'boolean',
        'frelon_asiatique' => 'boolean',
        'frelon_oriental' => 'boolean',
        'varroas' => 'boolean',
        'fausse_teigne' => 'boolean',
        'aethina_tumida' => 'boolean',
        ];
        }
    }

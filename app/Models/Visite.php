<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Visite extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public $with = ['nourrissement', 'traitement', 'mort'];

    public function auteur(): BelongsTo
    {
        return $this->belongsTo(User::class, 'auteur_id');
    }

    public function ruche(): BelongsTo
    {
        return $this->belongsTo(Ruche::class, 'ruche_id');
    }

    public function exploitation(): BelongsTo
    {
        return $this->belongsTo(Exploitation::class, 'exploitation_id');
    }

    public function nourrissement(): HasOne
    {
        return $this->hasOne(Nourrissement::class);
    }

    public function traitement(): HasOne
    {
        return $this->hasOne(Traitement::class);
    }

    public function poseHausses(): HasOne
    {
        return $this->hasOne(PoseHausses::class);
    }

    public function recolteMiel(): HasOne
    {
        return $this->hasOne(RecolteMiel::class);
    }

    public function recoltePropolis(): HasOne
    {
        return $this->hasOne(RecoltePropolis::class);
    }

    public function recoltePollen(): HasOne
    {
        return $this->hasOne(RecoltePollen::class);
    }

    public function recolteGeleeRoyale(): HasOne
    {
        return $this->hasOne(RecolteGeleeRoyale::class);
    }

    public function pesee(): HasOne
    {
        return $this->hasOne(Pesee::class);
    }

    public function mort(): HasOne
    {
        return $this->hasOne(Mort::class);
    }

    public function comptage(): HasOne
    {
        return $this->hasOne(Comptage::class);
    }

    public function controle(): HasOne
    {
        return $this->hasOne(Controle::class);
    }

    public function nettoyagePlancher(): HasOne
    {
        return $this->hasOne(NettoyagePlancher::class);
    }

    public function renouvellementCire(): HasOne
    {
        return $this->hasOne(RenouvellementCires::class);
    }

    public function apiculteurs(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_visite', 'visite_id', 'user_id');
    }

    public function divisions(): HasOne
    {
        return $this->hasOne(Division::class);
    }

    public function poseElements(): HasOne
    {
        return $this->hasOne(PoseElement::class);
    }

    public function transvasement(): HasOne
    {
        return $this->hasOne(Transvasement::class);
    }

    public function reunion(): HasOne
    {
        return $this->hasOne(Reunion::class);
    }

    public function introduction(): HasOne
    {
        return $this->hasOne(Introduction::class);
    }
}

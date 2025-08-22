<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Visite extends Model
{
  use HasFactory;

  protected $guarded = ["id"];

  public $with = ['nourrissement'];

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
}

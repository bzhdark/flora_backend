<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeRuche extends Model
{
  use HasFactory;

  protected $table = 'types_ruches';
  protected $guarded = ["id"];

  public function ruches(): HasMany
  {
    return $this->hasMany(Ruche::class);
  }

  public function exploitation(): BelongsTo
  {
    return $this->belongsTo(Exploitation::class);
  }
}

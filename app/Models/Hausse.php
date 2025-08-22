<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hausse extends Model
{
  use HasFactory;

  protected $guarded = ["id"];


  public function ruche(): BelongsTo
  {
    return $this->belongsTo(Ruche::class);
  }

  public function exploitation(): BelongsTo
  {
    return $this->belongsTo(Exploitation::class);
  }

  public function hausseRecoltees(): HasMany
  {
    return $this->hasMany(HausseRecoltee::class);
  }

  public function posesHausses(): BelongsToMany
  {
    return $this->belongsToMany(PoseHausses::class, 'hausse_pose_hausses', 'hausse_id', 'pose_hausse_id');
  }
}

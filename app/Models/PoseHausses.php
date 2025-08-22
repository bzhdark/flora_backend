<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PoseHausses extends Model
{
  use HasFactory;

  protected $table = 'poses_hausses';

  protected $guarded = ["id"];

  public function visite(): BelongsTo
  {
    return $this->belongsTo(Visite::class);
  }

  public function hausses(): BelongsToMany
  {
    return $this->belongsToMany(Hausse::class, 'hausse_pose_hausses', 'pose_hausse_id', 'hausse_id');
  }
}

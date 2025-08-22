<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function rucher(): BelongsTo
    {
        return $this->belongsTo(Rucher::class);
    }

    public function ruche(): BelongsTo
    {
        return $this->belongsTo(Ruche::class);
    }

    public function exploitation(): BelongsTo
    {
        return $this->belongsTo(Exploitation::class);
    }

    protected function casts(): array
    {
        return [
            'date_notification' => 'date',
            'notif_envoyee' => 'boolean',
            'fait' => 'boolean',
        ];
    }
}

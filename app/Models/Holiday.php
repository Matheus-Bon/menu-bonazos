<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Holiday extends Model
{
    use HasFactory;
    protected $table = 'holidays';
    protected $fillable = ['name_of_holiday', 'date_of_holiday', 'fixed', 'unit_id'];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}

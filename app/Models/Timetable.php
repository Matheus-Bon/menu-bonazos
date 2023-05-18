<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Timetable extends Model
{
    use HasFactory;
    protected $table = 'timetables';
    protected $fillable = ['opens_at', 'closes_at', 'day_of_week', 'active'];


    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
    
}

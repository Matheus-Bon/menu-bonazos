<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'units';
    protected $fillable = ['name','street', 'district', 'city', 'state', 'zip_code', 'phone', 'isOpen', 'manager_id'];


    public function timetable(): HasOne
    {
        return $this->hasOne(Timetable::class);
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'unit_id');
    }
}

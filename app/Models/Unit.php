<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Unit extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'units';
    protected $fillable = ['name','street', 'district', 'city', 'state', 'zip_code', 'phone', 'isOpen'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $hidden = [
        
    ];

    public function timetables(): HasMany
    {
        return $this->hasMany(Timetable::class, 'unit_id');
    }

    public function manager(): HasOne
    {
        return $this->hasOne(User::class);
    }
}

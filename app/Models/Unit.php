<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Unit extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'units';
    protected $fillable = ['name','street', 'district', 'city', 'state', 'zip_code', 'phone', 'isOpen', 'manager_id'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    

    public function timetable(): HasOne
    {
        return $this->hasOne(Timetable::class);
    }

    public function manager(): HasOne
    {
        return $this->hasOne(User::class);
    }
}

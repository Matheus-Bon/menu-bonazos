<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

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

    protected static function boot()
    {
        parent::boot();

        static::saving(function($unit) {
            $unit->slug = Str::of($unit->name)->slug('-');
        });
    }

    protected $with =['timetables', 'categories', 'holidays'];

    public function timetables(): HasMany
    {
        return $this->hasMany(Timetable::class, 'unit_id');
    }

    public function manager(): HasOne
    {
        return $this->hasOne(User::class, 'unit_id');
    }

    public function holidays(): HasMany
    {
        return $this->hasMany(Holiday::class, 'unit_id');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'unit_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'unit_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = ['name', 'discount', 'weight', 'available', 'description', 'server_people'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Product::class);
    }

    public function price(): HasOne
    {
        return $this->hasOne(\App\Models\Price::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = ['name', 'active', 'unit_id'];

    protected $with = ['products'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }


    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}

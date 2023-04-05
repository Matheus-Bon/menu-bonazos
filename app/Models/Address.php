<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = ['is_default'];

   
    public function users():BelongsToMany
    {
        return $this->belongsToMany(\App\Models\User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = ['local_name', 'street', 'district', 'state', 'complement', 'zip_code', 'standard_address'];

   
    public function users():BelongsToMany
    {
        return $this->belongsToMany(\App\Models\User::class);
    }
}

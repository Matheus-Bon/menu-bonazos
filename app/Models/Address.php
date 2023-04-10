<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Address extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'addresses';

    protected $fillable = ['local_name','street', 'district', 'city', 'state', 'complement', 'zip_code', 'standard_address'];

   
    public function users():BelongsToMany
    {
        return $this->belongsToMany(\App\Models\User::class);
    }
}

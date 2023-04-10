<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class StandardAddressChange extends Controller
{
    public function __invoke(Address $address)
    {
        $user = Auth::user();

        $user->addresses()->update(['standard_address' => false]);
        

        $address->update(['standard_address' => true]);

        return to_route('profile.edit');
        
    }
}

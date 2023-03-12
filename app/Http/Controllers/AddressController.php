<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $address = new Address();

        $address->user_id = auth()->id();
        $address->local_name = $request->local_name;
        $address->street = $request->street;
        $address->district = $request->district;
        $address->state = $request->state;
        $address->complement = $request->complement;
        $address->zip_code = $request->zip_code;

        $address->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');

    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        $user_id = Auth::user()->id;

        $addresses = Address::where('user_id',$user_id)->get();

        return view('address-user-form', ['addresses' => $addresses]);


        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //
    }
}

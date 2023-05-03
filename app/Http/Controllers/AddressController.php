<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddressUpdateRequest;



class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia(
            'Profile/Partials/Address/IndexAddressInformationForm',
            [
                //dd(gettype(Auth::user()->addresses)),
                'addresses' => Auth::user()->addresses
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Profile/Partials/Address/CreateAddressInformationForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    
        $user =$request->user();
        $addressesCount = $user->addresses()->count();

        //dd( $user->addresses()->create(['city' => $request->city,'local_name' => $request->local_name,]));

        $request->validate([
            'local_name' => 'required',
            'street' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required',
            'complement' => 'required',
            'zip_code' => 'required|min:8|max:8',
            'standard_address' => 'boolean',
        ]);
        
        $user->addresses()->create([
            'local_name' => $request->local_name,
            'street' => $request->street,
            'district' => $request->district,
            'city' => $request->city,
            'state' => $request->state,
            'complement' => $request->complement,
            'zip_code' => $request->zip_code,
            'standard_address' => $addressesCount === 0 ? true : false
        ]);

        
        return Redirect::route('profile.edit');
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        return inertia(
            'Profile/Partials/Address/ShowAddress',
            [
                'address' => $address
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        return inertia(
            'Profile/Partials/Address/EditAddressInformationForm',
            [
                'user' => Auth::user(),
                'address' => $address
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     * Essa função usa AddressUpdateRequest (Dentro de App/Http/Requests) para criar o validador em outro arquivo
     */
    public function update(AddressUpdateRequest $request, $addressId):RedirectResponse
    {
        
        $address = Address::findOrFail($addressId);
        $address->fill($request->validated());
        $address->save();
       
        return Redirect::route('profile.edit');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->deleteOrFail();

        return redirect()->back()->with('success', 'Endereço excluído!');
    }
}

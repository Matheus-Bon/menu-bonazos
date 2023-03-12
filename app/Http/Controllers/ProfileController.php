<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Address;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        $user_id = Auth::user()->id;
        $addresses = Address::where('user_id',$user_id)->get();


        return view('profile.edit', [
            'user' => $request->user(),
            'addresses' => $addresses,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());


        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }



    /* 
    
    Functions Address
    
    */

    public function storeAddress(Request $request)
    {
        
        $address = new Address();

        //$code = encrypt($address->street = $request->street);

        $address->user_id = auth()->id();
        $address->local_name = $request->local_name;
        $address->street = $request->street;
        $address->district = $request->district;
        $address->state = $request->state;
        $address->complement = $request->complement;
        $address->zip_code = $request->zip_code;
        $address->code = $request->zip_code;

        $address->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');

    }


    public function updateAddress(Request $request)
    {

    }

    public function destroyAddress(Address $code)
    {

        $code->delete();
        

        return redirect()->route('profile.edit');
    }



    public function showFormAddress()
    {
        return view('profile.address-form');
    }


}

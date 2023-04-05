<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Address;
use Illuminate\Support\Facades\DB;




class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        $user = Auth::user();
        
        $addresses = $user->addresses;
        


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
        $user = Auth::user();
        $numberAddresses = Address::where('user_id',$user->id)->count();

        $address = new Address();
        
        $address->user_id = $user->id;
        $address->local_name = $request->local_name;
        $address->street = $request->street;
        $address->district = $request->district;
        $address->state = $request->state;
        $address->complement = $request->complement;
        $address->zip_code = $request->zip_code;
        

        if($numberAddresses == 0){

            $address->is_default = true;

        }else{

            $address->is_default = false;
        }
        
        $address->save();

        return Redirect::route('profile.edit')->with('status', 'profile-created');

    }


    public function updateAddress($code , Request $request)
    {
        $address = Address::where('code', '=', $code)->first();

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

    public function showUpdateAddress(Request $request)
    {
        $code = $request->code;
        $user_id = Auth::user()->id;
        $address = Address::where('user_id',$user_id)->get();
        $address_code = Address::where('code', $code)->first();

        if($user_id && $address && $address_code){
            return view('profile.address-form-update' , [
                'code' => $code,
                'address' => $address_code,
            ]);

        }

        
    }

    public function destroyAddress(Request $request)
    {

        /* 
            Função de deletar endereço com mais uma camada de segurança. 
            Essa função busca o id do usuário autenticado no site e compara se esse id é daquele endereço mesmo, 
            logo depois deleta, caso não mosta um erro.

        */


        $user_id = Auth::user()->id;
        $address_user_id = Address::where('user_id',$user_id)->first();
        
        if($address_user_id){

            DB::table('addresses')->where('code','=',$request->code)->delete();

            return redirect()->route('profile.edit');

        }else{

            echo 'Desculpe, ocorreu um erro.';
        }
        
        
    }



    public function showFormAddress()
    {
        return view('profile.address-form');
    }


    public function updateDefaultAddress($code)
    {

        $user_id = Auth::user()->id;

        
        $default = Address::where('code',$code)->first();

        
        
        if(Auth::user() && $default->is_default == false){

            Address::where('user_id',$user_id)->first()->where('is_default',true)->update(['is_default' => false]);


            Address::where('code',$code)->first()->update(['is_default' => true]);

        }
        
        return redirect()->back()->with('success', 'Default address updated successfully.');
    }

    


}

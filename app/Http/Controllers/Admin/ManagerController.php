<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use App\Models\Unit;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|string|min:3|max:40',
            'email' => 'required|email|string|unique:users,email',
            'password' => ['required', 'confirmed',  Rules\Password::defaults()]
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ])->assignRole('manager');


        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Inertia::render('Admin/Unit', [
            
            'managerEdit' => User::where('id', $id)->firstOrfail(),
            'units' => Unit::with('manager')->get(),
            'managers' => User::role(['manager','admin'])->with('unit')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $managerFound = User::findOrfail($id);

        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => ['string','email', 'required',Rule::unique('users')->ignore($managerFound->id)],
        ]);

        $managerFound->update([

            'name' => $request->name,
            'email' => $request->email
        ]);

        if ($managerFound->isDirty('email')) {
            $managerFound->email_verified_at = null;
        }

        $managerFound->save();

        return back();
    }

    // Função para atualizar a senha do Manager
    public function updatePasswordOfManager(Request $request)
    {   
        $request->validate([
            'new_password' => 'required|string|min:8|confirmed',
            'admin_password' => 'required|string|min:8'
        ]);

        $adm = Auth::user();
        $manager = User::findOrfail($request->manager);

        if(!Hash::check($request->admin_password, $adm->password)){
            return back()->withErrors(['admin_password' => 'Senha inválida.']);
        }

        if(Hash::check($request->new_password, $manager->password)){
            return back()->withErrors(['new_password' => 'A senha não pode ser mesma que a antiga.']);
        }

        $manager->password = Hash::make($request->new_password);
        $manager->save();
            
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $manager)
    {
        $managerFound = User::findOrFail($manager->id);     
        
        $managerFound->delete();

        return redirect()->route('unit.dashboard.unit.index');
    }
}

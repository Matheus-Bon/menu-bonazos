<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{

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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

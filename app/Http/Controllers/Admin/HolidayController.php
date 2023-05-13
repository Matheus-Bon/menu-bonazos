<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use Carbon\Carbon;
use App\Models\Holiday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        
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
        //dd($request);
        $request->validate([
            'name_of_holiday' => 'required|string|min:3',
            'date_of_holiday' => 'required|date',
            'fixed' => 'boolean',
        ]);

        Holiday::create([
            'name_of_holiday' => $request->name_of_holiday,
            'date_of_holiday' => $request->date_of_holiday,
            'fixed' => false,
        ]);

        return Redirect::back()->with('toast', 'Feriado criado com sucesso.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

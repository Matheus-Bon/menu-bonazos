<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UnitCreateRequest;
use Database\Seeders\HolidaySeeder;
use Database\Seeders\TimetablesTableSeeder;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        
        return Inertia::render('Admin/Unit',
            [
                'units' => Unit::with('manager')->get(),
                'managers' => User::role('manager')->with('unit')->get()
            ]
        );
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
    public function store(UnitCreateRequest $request)
    {   
        $managers = User::role('manager')->get();
        $manager = $managers->where('id', $request->manager_id)->first();

        $unit = Unit::create([
            'name' => $request->name,
            'street' => $request->street,
            'district' => $request->district,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'phone' => $request->phone
        ]);

        // Atribuindo o relacionamento entre Manager e Unit
        $manager->unit()->associate($unit);
        $manager->save();
        
        $seederTimetable = new TimetablesTableSeeder(); //Semeador instanceado de forma dinâmica para criar dia da semana para cada unidade
        $seederTimetable->run($unit->id); // Semeador chama a função run() e passa o id da unidade criada para semear o BD com os horarios da unidade

        $seederHoliday = new HolidaySeeder();
        $seederHoliday->run($unit->id);

        return to_route('dashboard.unit.index');
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

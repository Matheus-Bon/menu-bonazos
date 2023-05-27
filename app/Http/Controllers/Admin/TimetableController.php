<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Holiday;
use App\Models\Timetable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        return Inertia::render('Admin/Timetable',

            [
                'timetable' => Timetable::all(),
              
            ]
    
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Admin/Partials/Timetable/CardTimetable');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->day_of_week);
        $request->validate([
            'opens_at' => 'required',
            'closes_at' => 'required',
            'day_of_week' => 'required',
        ]);

        Timetable::create([
            'opens_at' => $request->opens_at,
            'closes_at' => $request->closes_at,
            'day_of_week' => $request->day_of_week,
        ]);

        return Redirect::back();
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
        return inertia('Admin/Partials/Timetable/CardTimetableUpdate');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Timetable $timetable)
    {   
        $timetable->update(
            $request->validate([
                'opens_at' => 'required',
                'closes_at' => 'required'
            ])
        );

        return Redirect::back()->with('success', 'Horário atualizado!');
    }

    public function updateActiveDay(Request $request, Timetable $timetable)
    {
        $timetable->active = !$timetable->active;
        $timetable->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

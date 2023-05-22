<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Holiday;
use App\Models\Timetable;
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

        return to_route('dashboard.timetable.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //dd(gettype(Holiday::where('id', $id)->first()) );
        return Inertia::render('Admin/Timetable', [
            'holidayEdit' => Holiday::where('id', $id)->first(),
            'holidays' => Inertia::lazy(fn () => Holiday::get()),
            'timetable' => Timetable::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Holiday $holiday)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Holiday $holiday)
    {
        //dd($request->name);
        $holidayFound = Holiday::findOrFail($holiday->id);

        $request->validate([
            'name' => 'required|string|min:3', // 'name' aqui se referencia ao 'name_of_holiday' do form em ModalEditHoliday
            'date' => 'date|required'          // 'date' aqui se referencia ao 'date_of_holiday' do form em ModalEditHoliday
        ]);

        $holidayFound->name_of_holiday = $request->name; // 'name' aqui se referencia ao 'name_of_holiday' do form em ModalEditHoliday
        $holidayFound->date_of_holiday = $request->date;  // 'date' aqui se referencia ao 'date_of_holiday' do form em ModalEditHoliday
        $holidayFound->save();
        
        return to_route('dashboard.timetable.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        $holiday = Holiday::findOrFail($id);

        $holiday->delete();

        return to_route('dashboard.timetable.index');
    }
}

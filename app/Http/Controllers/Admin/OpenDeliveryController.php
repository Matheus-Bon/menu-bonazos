<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Carbon\Carbon;
use App\Models\Unit;
use App\Models\User;
use App\Models\Timetable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OpenDeliveryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $currentDayOfWeek = Carbon::now()->format('1');
        $currentTime = Carbon::now()->format('H:i');
        $managers = User::role('manager')->get();
        $userCurrent = Auth::user();
        $manager = $managers->where('id', $userCurrent->id)->first();

        $timetable = Timetable::where('day_of_week', $currentDayOfWeek)->first();
        
        if($timetable){

            $opensAt = $timetable->opens_at;
            $closesAt = $timetable->closes_at;

            if($currentTime >= $opensAt && $currentTime <= $closesAt) {

                $manager->unit->isOPen = true;

            } else{
                $manager->unit->isOPen = false;
            }
        }

    }
}

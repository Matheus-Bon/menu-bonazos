<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        $this->call(RoleSeeder::class);
        
        $this->call(UnitSeeder::class);

        $this->call(AdminSeeder::class);

        $seederTimetable = new TimetablesTableSeeder();
        $seederTimetable->run(Unit::all()->first()->id);

        $seederHoliday = new HolidaySeeder();
        $seederHoliday->run(Unit::all()->first()->id);

        
        
        

        
    }
}

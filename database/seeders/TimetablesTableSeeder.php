<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimetablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($unitId = null): void
    {   

        
            \App\Models\Timetable::factory()->create([
                'opens_at' => null,
                'closes_at' => null,
                'day_of_week' => 'Segunda-feira',
                'unit_id' => $unitId
            ]);
            \App\Models\Timetable::factory()->create([
                'opens_at' => null,
                'closes_at' => null,
                'day_of_week' => 'Terça-feira',
                'unit_id' => $unitId
            ]);
            \App\Models\Timetable::factory()->create([
                'opens_at' => null,
                'closes_at' => null,
                'day_of_week' => 'Quarta-feira',
                'unit_id' => $unitId
            ]);
            \App\Models\Timetable::factory()->create([
                'opens_at' => null,
                'closes_at' => null,
                'day_of_week' => 'Quinta-feira',
                'unit_id' => $unitId
            ]);
            \App\Models\Timetable::factory()->create([
                'opens_at' => null,
                'closes_at' => null,
                'day_of_week' => 'Sexta-feira',
                'unit_id' => $unitId
            ]);
            \App\Models\Timetable::factory()->create([
                'opens_at' => null,
                'closes_at' => null,
                'day_of_week' => 'Sábado',
                'unit_id' => $unitId
            ]);
            \App\Models\Timetable::factory()->create([
                'opens_at' => null,
                'closes_at' => null,
                'day_of_week' => 'Domingo',
                'unit_id' => $unitId
            ]);
        
        

    }
}

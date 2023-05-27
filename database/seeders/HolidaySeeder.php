<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($unitId = null): void
    {   
    
        \App\Models\Holiday::factory()->create([
            'name_of_holiday' => 'Ano Novo',
            'date_of_holiday' => Carbon::createFromDate(null, 1, 1),
            'fixed' => true,
            'unit_id' => $unitId
        ]);

        \App\Models\Holiday::factory()->create([
            'name_of_holiday' => 'Natal',
            'date_of_holiday' => Carbon::createFromDate(null, 12, 25),
            'fixed' => true,
            'unit_id' => $unitId
        ]);

        if(User::role('admin')->first()->region === 'BR'){
            
            \App\Models\Holiday::factory()->create([
                'name_of_holiday' => 'Tiradentes',
                'date_of_holiday' => Carbon::createFromDate(null, 4, 21),
                'fixed' => true,
                'unit_id' => $unitId
            ]);
    
            \App\Models\Holiday::factory()->create([
                'name_of_holiday' => 'Dia do Trabalho',
                'date_of_holiday' => Carbon::createFromDate(null, 5, 1),
                'fixed' => true,
                'unit_id' => $unitId
            ]);
    
            \App\Models\Holiday::factory()->create([
                'name_of_holiday' => 'Independência',
                'date_of_holiday' => Carbon::createFromDate(null, 9, 7),
                'fixed' => true,
                'unit_id' => $unitId
            ]);
    
            \App\Models\Holiday::factory()->create([
                'name_of_holiday' => 'Nossa Senhora de Aparecida',
                'date_of_holiday' => Carbon::createFromDate(null, 10, 12),
                'fixed' => true,
                'unit_id' => $unitId
            ]);
    
            \App\Models\Holiday::factory()->create([
                'name_of_holiday' => 'Finados',
                'date_of_holiday' => Carbon::createFromDate(null, 11, 2),
                'fixed' => true,
                'unit_id' => $unitId
            ]);
    
            \App\Models\Holiday::factory()->create([
                'name_of_holiday' => 'Proclamação da República',
                'date_of_holiday' => Carbon::createFromDate(null, 11, 15),
                'fixed' => true,
                'unit_id' => $unitId
            ]);
    
        }

        if(User::role('admin')->first()->region === 'EUA'){
            
            \App\Models\Holiday::factory()->create([
                'name_of_holiday' => 'Dia dos Veteranos',
                'date_of_holiday' => Carbon::createFromDate(null, 11, 10),
                'fixed' => true,
                'unit_id' => $unitId
            ]);

            \App\Models\Holiday::factory()->create([
                'name_of_holiday' => 'Dia da Independência',
                'date_of_holiday' => Carbon::createFromDate(null, 7, 4),
                'fixed' => true,
                'unit_id' => $unitId
            ]);
        }
    }
}

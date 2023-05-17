<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);

        \App\Models\Timetable::factory()->create([
            'opens_at' => null,
            'closes_at' => null,
            'day_of_week' => 'Segunda-feira'
        ]);
        \App\Models\Timetable::factory()->create([
            'opens_at' => null,
            'closes_at' => null,
            'day_of_week' => 'Terça-feira'
        ]);
        \App\Models\Timetable::factory()->create([
            'opens_at' => null,
            'closes_at' => null,
            'day_of_week' => 'Quarta-feira'
        ]);
        \App\Models\Timetable::factory()->create([
            'opens_at' => null,
            'closes_at' => null,
            'day_of_week' => 'Quinta-feira'
        ]);
        \App\Models\Timetable::factory()->create([
            'opens_at' => null,
            'closes_at' => null,
            'day_of_week' => 'Sexta-feira'
        ]);
        \App\Models\Timetable::factory()->create([
            'opens_at' => null,
            'closes_at' => null,
            'day_of_week' => 'Sábado'
        ]);
        \App\Models\Timetable::factory()->create([
            'opens_at' => null,
            'closes_at' => null,
            'day_of_week' => 'Domingo'
        ]);

        \App\Models\Holiday::factory()->create([
            'name_of_holiday' => 'Ano Novo',
            'date_of_holiday' => '2024-01-01',
            'fixed' => true
        ]);

        \App\Models\Holiday::factory()->create([
            'name_of_holiday' => 'Paixão de Cristo',
            'date_of_holiday' => '2023-04-07',
            'fixed' => true
        ]);

        \App\Models\Holiday::factory()->create([
            'name_of_holiday' => 'Tiradentes',
            'date_of_holiday' => '2023-04-21',
            'fixed' => true
        ]);

        \App\Models\Holiday::factory()->create([
            'name_of_holiday' => 'Dia do Trabalho',
            'date_of_holiday' => '2023-05-01',
            'fixed' => true
        ]);

        \App\Models\Holiday::factory()->create([
            'name_of_holiday' => 'Corpus Christi',
            'date_of_holiday' => '2023-06-08',
            'fixed' => true
        ]);

        \App\Models\Holiday::factory()->create([
            'name_of_holiday' => 'Independência',
            'date_of_holiday' => '2023-09-07',
            'fixed' => true
        ]);

        \App\Models\Holiday::factory()->create([
            'name_of_holiday' => 'Nossa Senhora de Aparecida',
            'date_of_holiday' => '2023-10-12',
            'fixed' => true
        ]);

        \App\Models\Holiday::factory()->create([
            'name_of_holiday' => 'Dia do Professor',
            'date_of_holiday' => '2023-10-15',
            'fixed' => true
        ]);

        \App\Models\Holiday::factory()->create([
            'name_of_holiday' => 'Finados',
            'date_of_holiday' => '2023-11-02',
            'fixed' => true
        ]);

        \App\Models\Holiday::factory()->create([
            'name_of_holiday' => 'Proclamação da República',
            'date_of_holiday' => '2023-11-15',
            'fixed' => true
        ]);

        \App\Models\Holiday::factory()->create([
            'name_of_holiday' => 'Natal',
            'date_of_holiday' => '2023-12-25',
            'fixed' => true
        ]);
    }
}

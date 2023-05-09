<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    }
}

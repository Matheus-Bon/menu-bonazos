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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);
        
        $this->call(UnitSeeder::class);

        $this->call(AdminSeeder::class);

        $this->call(TimetablesTableSeeder::class);


        \App\Models\Holiday::factory()->create([
            'name_of_holiday' => 'Ano Novo',
            'date_of_holiday' => '2023-01-01',
            'fixed' => true
        ]);

        \App\Models\Holiday::factory()->create([
            'name_of_holiday' => 'Natal',
            'date_of_holiday' => '2023-12-25',
            'fixed' => true
        ]);

        if(User::role('admin')->first()->region === 'BR'){
            
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
                'name_of_holiday' => 'Finados',
                'date_of_holiday' => '2023-11-02',
                'fixed' => true
            ]);
    
            \App\Models\Holiday::factory()->create([
                'name_of_holiday' => 'Proclamação da República',
                'date_of_holiday' => '2023-11-15',
                'fixed' => true
            ]);
    
        }

        if(User::role('admin')->first()->region === 'EUA'){
            
            \App\Models\Holiday::factory()->create([
                'name_of_holiday' => 'Dia dos Veteranos',
                'date_of_holiday' => '2023-11-10',
                'fixed' => true
            ]);

            \App\Models\Holiday::factory()->create([
                'name_of_holiday' => 'Dia da Independência',
                'date_of_holiday' => '2023-07-04',
                'fixed' => true
            ]);
        }
        
        

        
    }
}

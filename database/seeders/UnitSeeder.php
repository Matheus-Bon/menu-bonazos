<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Unit::factory()->create([
            'name' => 'Principal',
            'street' => 'Av. Leão Nobre',
            'district' => 'Fenda',
            'city' => 'Mar',
            'state' => 'FB',
            'zip_code' => '28138758',
            'phone' => '21964805493',
            
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hospital;

class HospitalsTableSeeder extends Seeder
{
    public function run()
    {
        // Create Regency Hospital
        Hospital::create([
            'name' => 'Regency Hospital',
            'password' => bcrypt('password'), 
        ]);

        // Create Kew Hospital
        Hospital::create([
            'name' => 'Kew Hospital',
            'password' => bcrypt('password'), 
        ]);

    }
}

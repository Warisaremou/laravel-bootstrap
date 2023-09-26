<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Option::create([
        //     'code_opt' => 'AGE',
        //     'nom_opt' => 'Administration et gestion des entreprises'    
        // ]);

        // Option::create([
        //     'code_opt' => 'SIL',
        //     'nom_opt' => 'Systems Informatiques et Logiciels'    
        // ]);

        Option::create([
            'code_opt' => 'AGRO',
            'nom_opt' => 'Agronomie'    
        ]);
        Option::create([
            'code_opt' => 'RIT',
            'nom_opt' => 'Réseaux Informatiques et Télécommunications'    
        ]);
    }
}

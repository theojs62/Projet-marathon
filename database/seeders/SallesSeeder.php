<?php

namespace Database\Seeders;

use App\Models\Exposition;
use App\Models\Salle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SallesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Salle::factory(4)->create();
        Salle::factory()->create([
            'nom' => 'Outdoor',
            'theme' => 'Libre',
            'description' => '<p>Salle réservée aux visiteurs qui souhaitent faire connaitre de nouveaux artistes...</p>'
        ]);
    }
}

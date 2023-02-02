<?php

namespace Database\Seeders;

use App\Models\Exposition;
use App\Models\Salle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParcoursSeeder extends Seeder {
    /**
     * Run the database seeds.
     * On donne ici un parcours statique.
     *  1 : Salle de départ
     *  2, 3 : Salles suivantes de 1
     *  3, 5 : Salles suivantes de 2
     *  2, 5 : Salles suivantes de 3
     *  4 : Salle suivante de 5
     *  4 : Salle de sortie (sans salle suivante)
     *
     *
     * @return void
     */
    public function run() {
        $salles = [];
        for ($i = 1; $i <= 5; $i++)
            $salles[$i] = Salle::find($i);
        $salles[1]->entree = true;
        $salles[1]-> save();
        $salles[1] -> suivantes()-> attach([2, 3]);
        $salles[2] -> suivantes()-> attach([3, 5]);
        $salles[3] -> suivantes()-> attach([2, 5]);
        $salles[5] -> suivantes()-> attach([4]);
        $salles[5] -> editable = true;
        $salles[5] -> save();
     }
}

<?php

namespace Database\Seeders;

use App\Models\Commentaire;
use App\Models\Oeuvre;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentairesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Factory::create('fr_FR');
        $user_ids = User::all()->pluck('id');
        $oeuvres = Oeuvre::all();
        foreach ($oeuvres as $oeuvre) {
            $nbComments = $faker->numberBetween(2,count($user_ids));
            $selectedUserIds = $faker->randomElements($user_ids, $nbComments);
            foreach($selectedUserIds as $user_id) {
                Commentaire::factory()->create([
                    'user_id' => $user_id,
                    'oeuvre_id' => $oeuvre->id,
                ]);
            }
        }
    }
}

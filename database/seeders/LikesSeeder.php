<?php

namespace Database\Seeders;

use App\Models\Oeuvre;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikesSeeder extends Seeder {
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
            $nbLikes = $faker->numberBetween(1, count($user_ids));
            $selectedUserIds = $faker->randomElements($user_ids, $nbLikes);
            $oeuvre->likes()->attach($selectedUserIds);
        }
    }
}

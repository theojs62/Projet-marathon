<?php

namespace Database\Seeders;

use App\Models\Oeuvre;
use App\Models\Tag;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OeuvresTagsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Factory::create('fr_FR');
        $tag_ids = Tag::all()->pluck('id');
        $oeuvres = Oeuvre::all();

        foreach ($oeuvres as $oeuvre) {
            $nbTags = $faker->numberBetween(1, 3);
            $selectedTagIds = $faker->randomElements($tag_ids, $nbTags);
            $oeuvre->tags()->attach($selectedTagIds);
        }
    }
}

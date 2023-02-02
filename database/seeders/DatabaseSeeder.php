<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Exposition;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(UserSeeder::class);
        $this->call(SallesSeeder::class);
        $this->call(OeuvresSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(CommentairesSeeder::class);
        $this->call(LikesSeeder::class);
        $this->call(OeuvresTagsSeeder::class);
        $this->call(ParcoursSeeder::class);
    }
}

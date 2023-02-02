<?php

namespace Database\Factories;

use App\Utils\Utils;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentaire>
 */
class CommentaireFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        $created_at = $this->faker->dateTimeBetween('-10 months', '-15 days');
        return [
            'titre' => $this->faker->words(4, true),
            'contenu' => Utils::html(),
            'created_at' => $created_at,
            'updated_at' => $this->faker->dateTimeBetween($created_at,'now')
        ];
    }
}

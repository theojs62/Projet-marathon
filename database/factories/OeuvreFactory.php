<?php

namespace Database\Factories;

use App\Utils\Utils;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Oeuvre>
 */
class OeuvreFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        $nb = $this->faker->numberBetween(1,4);
        return [
            'nom' => $this->faker->words(3, true),
            'media_url' => sprintf("images/oeuvres/oeuvre-%d.jpg",$nb),
            'thumbnail_url' => sprintf("images/thumbnails/thumbnail-%d.jpg",$nb),
            'auteur' => $this->faker->name(),
            'date_creation' => $this->faker->dateTimeBetween('-3 years', '-6 months'),
            'description' =>Utils::html(),
        ];
    }
}

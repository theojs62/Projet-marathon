<?php

namespace Database\Factories;

use App\Utils\Utils;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salle>
 */
class SalleFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'nom' => $this->faker->words(3, true),
            'theme' => $this->faker->randomElement(["Fractales", "Images 3D", "Images AI", "Lancer Rayons"]),
            'description' => Utils::html(),
            'plan_url' => sprintf("images/salles/salle-%d.jpeg",$this->faker->numberBetween(1,3)),
        ];
    }
}

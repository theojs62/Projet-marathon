<?php

namespace App\Utils;

use Faker\Factory;
use Faker\Generator;

class Utils {
    static Generator $faker;

    static public function list($nbItems = 4): string {
        if (!isset(Utils::$faker))
            Utils::$faker = Factory::create('fr_FR');
        $str = "<ul>";
        for ($i = 0; $i < $nbItems; $i++) {
            $str .= "<li>" . Utils::$faker->words(3, true) . "</li>";
        }
        $str .= "</ul>";
        return $str;
    }

    static public function html($nbPar = 3) {
        if (!isset(Utils::$faker))
            Utils::$faker = Factory::create('fr_FR');
        $str = "<div>";
        $posList = Utils::$faker->numberBetween(-1, $nbPar);
        for ($i = 0; $i < $nbPar; $i++) {
            if ($posList == $i) {
                $str .= Utils::list();
            }
            $str .= "<p>" . Utils::$faker->paragraph() . "</p>";
        }
        $str .= "</div>";
        return $str;
    }

}

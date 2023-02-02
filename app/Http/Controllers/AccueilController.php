<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function indexSansConnexion(): Factory|View|Application
    {
        $s = Salle::where('entree', true)->first();
        $firstSalle = Salle::find(1);
        $secondSalle = Salle::find(2);
        $thirdSalle = Salle::find(3);
        $fourSalle = Salle::find(4);
        return view('accueil', [
            's' => $s,
            'firstSalle' => $firstSalle,
            'secondSalle' => $secondSalle,
            'thirdSalle' => $thirdSalle,
            'fourSalle' => $fourSalle,
        ]);
    }

    /**
     * @return Factory|View|Application
     */
    public function indexAvecConnexion(): Factory|View|Application
    {
        $s = Salle::where('entree', true)->first();
        $firstSalle = Salle::find(1);
        $secondSalle = Salle::find(2);
        $thirdSalle = Salle::find(3);
        $fourSalle = Salle::find(4);
        return view('home', [
            's' => $s,
            'firstSalle' => $firstSalle,
            'secondSalle' => $secondSalle,
            'thirdSalle' => $thirdSalle,
            'fourSalle' => $fourSalle,
        ]);
    }
}

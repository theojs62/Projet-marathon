<?php

namespace App\Http\Controllers;

use App\Models\Oeuvre;
use App\Models\Salle;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    /**
     * @param int $id
     * @return Factory|View|Application
     */
    public function show(int $id): Factory|View|Application
    {
        $s = Salle::where('entree', true)->first();
        $oeuvre = Oeuvre::find($id);
        $oeuvres = Oeuvre::all();
        return view('auteurs.show', [
            'auteur' => $oeuvre->auteur,
            'oeuvres' => $oeuvres,
            's' => $s,
        ]);
    }
}

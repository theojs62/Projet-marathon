<?php

namespace App\Http\Controllers;

use App\Models\Oeuvre;
use App\Models\Salle;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $s = Salle::where('entree', true)->first();
        return view('salle.index', [
            's' => $s,
        ]);
    }
    /**
     * @param Request $request
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(Request $request, int $id): Application|Factory|View
    {
        $s = Salle::where('entree', true)->first();
        $salle = Salle::find($id);
        $oeuvres = $salle->oeuvres;
        $sallesSuivantes = $salle->suivantes;
        return view("salle.show", [
            'salle' => $salle,
            'oeuvres' => $oeuvres,
            'sallesSuivantes' => $sallesSuivantes,
            's' => $s,
        ]);
    }
}

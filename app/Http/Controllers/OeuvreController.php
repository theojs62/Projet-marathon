<?php

namespace App\Http\Controllers;

use App\Models\Oeuvre;
use App\Models\Salle;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class OeuvreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return view('oeuvres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate(
            $request,
            [
                'nom'=>'required',
                'description'=>'required',
                'auteur'=>'required'
            ]
        );
        //dd($request);
        //dd($request);
        $oeuvre = new Oeuvre;
        $oeuvre->nom = $request->nom;
        $oeuvre->description = $request->description;
        $oeuvre->auteur = $request->auteur;
        $oeuvre->media_url='/images/oeuvres' ;
        $oeuvre->thumbnail_url='/images/thumbnails';
        $oeuvre->date_creation=now();
        $oeuvre->salle_id=5;
        if ($request->hasFile('media_url') && $request->file('media_url')->isValid()) {
            $file = $request->file('media_url');
            $base = 'oeuvre';
            $now = time();
            $nom = sprintf("%s_%d.%s", $base, $now, $file->extension());
            $file->storeAs('/images/oeuvres/', $nom);
            $oeuvre->media_url = "images//oeuvres/".$nom;
        }
        if ($request->hasFile('thumbnail_url') && $request->file('thumbnail_url')->isValid()) {
            //dd($request);
            $file = $request->file('thumbnail_url');
            $base = 'thumbnails';
            $now = time();
            $nom = sprintf("%s_%d.%s", $base, $now, $file->extension());
            $file->storeAs('/images/thumbnails/', $nom);
            $oeuvre->thumbnail_url = "images//thumbnails/".$nom;
        }


        // insertion de l'enregistrement dans la base de données
        $oeuvre->save();
        //dd($oeuvre);

        // redirection vers la page qui affiche la liste des oeuvres
        return redirect()->route('oeuvres.show',['oeuvre'=>$oeuvre]);

    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(Request $request, int $id): View|Factory|Application
    {
        $s = Salle::where('entree', true)->first();
        $isLike = false;
        $oeuvre = Oeuvre::find($id);
        $commentaires = $oeuvre->commentaires()->orderBy('created_at','DESC')->get();
        $type = $request->input('type',null);
        if(Auth::check()) {
            $user = Auth::user();
            $users = $oeuvre->likes;
            if ($type == 'remove') {
                $user->likes()->detach($oeuvre);
                return view("oeuvres.show",["oeuvre"=>$oeuvre, "commentaires"=>$commentaires, "isLike"=>$isLike]);
            } elseif ($type == 'add') {
                $user->likes()->attach($oeuvre);
                $isLike = true;
                return view("oeuvres.show",["oeuvre"=>$oeuvre, "commentaires"=>$commentaires, "isLike"=>$isLike]);
            }
            foreach ($users as $u) {
                if($user->id == $u->id) {
                    $isLike = true;
                }
            }
        }
        return view("oeuvres.show",[
            "oeuvre"=>$oeuvre,
            "commentaires"=>$commentaires,
            "isLike"=>$isLike,
            's' => $s,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Salle;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function index(): Application|RedirectResponse|Redirector
    {
        $s = Salle::where('entree', true)->first();
        return redirect('home', [
            's' => $s,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function create(): Redirector|RedirectResponse|Application
    {
        $s = Salle::where('entree', true)->first();
        return redirect('home', [
            's' => $s,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(Request $request): Redirector|RedirectResponse|Application
    {
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id): View|Factory|Application
    {
        $s = Salle::where('entree', true)->first();
        $user = User::find($id);
        $externAvatar = str_starts_with($user->avatar, 'http');
        $likesNumber = $user->likes->count();
        $commentairesNumber = $user->commentaires->count();
        return view('users.show', [
            'user' => $user,
            'likes' => $likesNumber,
            'commentaries' => $commentairesNumber,
            'externAvatar' => $externAvatar,
            's' => $s,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->validate($request, [
           'avatar_link' => 'required',
        ]);
        $user = User::find($id);
        $user->avatar = $request->avatar_link;
        $user->save();
        return redirect(route('users.show', $id));
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

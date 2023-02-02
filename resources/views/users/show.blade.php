@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('title')
    <div class="bannier" style="background-image: url({{asset('storage/images/annexes/baniere.jpg')}});">
        @if (!empty($user))
            <h2>{{ $user->name }}</h2>
        @else
            <h2>Utilisateur inconnu</h2>
        @endif
    </div>
@endsection


@section('content')
    <section class="profil" style="display: flex; flex-direction: column; text-align: center; margin-top: 5rem; margin-bottom: 5rem;  ">
        <article>
            <div class="avatar">
                @if (!empty($user))
                    @if($externAvatar)
                        <img src="{{ $user->avatar }}" alt="Cet utilisateur n'a pas d'avatar" style="margin-bottom: 5rem;">
                    @else
                        <img src="{{ asset('storage/'.$user->avatar) }}" alt="Cet utilisateur n'a pas d'avatar" style="margin-bottom: 5rem;">
                    @endif
            </div>
            <h2>{{ $user->nom }}</h2>
            </div>
            @if($user->admin)
                <div>
                    <i>Cet utilisateur est un administrateur.</i>
                </div>
            @endif
            <div>
                <i>Compte créé le {{ $user->created_at }}</i>
            </div>
            @if(!empty($user->email))
                <div>
                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                </div>
            @endif
            @if(Auth::user()->id == $user->id)
                <form action="{{route('users.update', $user->id)}}" method="POST">
                    @csrf()
                    @method('PUT')
                    <div class="text-center" style="margin-top: 2rem">
                        <h3>Mettre à jour votre avatar</h3>
                        <div class="form-group">
                            <div>
                                <label for="avatar_link">Lien du nouvel avatar :</label>
                            </div>
                            <br>
                            <div style="text-align: center; margin: auto;">
                                <input style="margin: auto; " class="zone_text"  type="text" id="avatar_link" name="avatar_link" placeholder="Le lien de votre nouvel avatar">
                                <br>
                                <small>Le lien doit être une image.</small>
                            </div>
                        </div>
                        <br>
                        <div>
                            <button class="button" type="submit">Modifier</button>
                        </div>
                    </div>
                </form>
            @endif
            @else
                <h1>L'utilisateur n'existe pas</h1>
            @endif
        </article>
    </section>
@endsection


@section('footer')
    @include('layouts.footer')
@endsection

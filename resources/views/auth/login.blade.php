@extends('layouts.app')

@section('content')

    @include("_errors")
    <div class="logtotal">
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="Logtitre">
                <h2>Connectez vous !</h2>
            </div>
            <div>
                <div class="Logdescrip">
                    <p>
                        Si vous n'avez pas de compte,
                        <a href="{{ route('register') }}">vous pouvez en créer un.</a>
                    </p>
                </div>
            </div>
            <div class="mailco">
                <label for="email">Adresse mail</label>
                <input class="zone_text" type="email" name="email" id="email">
            </div>
            <div class="mdp">
                <label for="pwd">Mot de passe</label>
                <input class="zone_text" type="password" name="password" id="pwd">
            </div>
            <div>
                <input class="button" type="submit" value="Connexion">
                <a class="button" href="{{route('accueil')}}">Retour à l'accueil </a>
            </div>
        </form>
    </div>
@endsection

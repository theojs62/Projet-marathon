@extends('layouts.app')

@section('content')
    <div class="logtotal">
        @include("_errors")
        <form class="crecos" action="{{route('register')}}" method="post">
            @csrf
            <div>
                <h2>Créer votre compte</h2>
                <div class="regdescrip">
                    Si vous avez déjà un compte, <a href="{{route('login')}}">connectez-vous</a>.
                </div>
            </div>
            <div>
                <label for="name">Nom</label>
                <input class="zone_text" type="text" name="name" id="name" placeholder="Votre nom">
            </div>

            <!-- Email Address -->
            <div>
                <label for="email">Adresse mail</label>
                <input class="zone_text" type="email" name="email" id="email" placeholder="Votre adresse mail">
            </div>


            <!-- Password -->
            <div>
                <label for="pwd">Mot de passe</label>
                <input class="zone_text" type="password" name="password" id="pwd" placeholder="Votre mot de passe">
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="conf_pwd">Confirmation mot de passe</label>
                <input class="zone_text" type="password" name="password_confirmation" id="conf_pwd" placeholder="Votre mot de passe">
            </div>
            <div>
                <input class="button" type="submit" value="S'enregistrer">
                <a class="button" href="{{route('accueil')}}">Retour à la page principale</a>
            </div>
        </form>
    </div>
@endsection

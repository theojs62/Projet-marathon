@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('title')
    <div class="bannier" style="background-image: url({{asset('storage/images/annexes/baniere.jpg')}});">
        <h2>{{ $oeuvre->nom }}</h2>
    </div>
@endsection

@section('content')
<article class="container">
    @if(!empty($oeuvre))

        <div class="">
            <h1>Informations</h1>
        </div>
        <img src="{{asset('storage/'.$oeuvre->media_url)}}" alt="media_url">
        @if(Auth::check())
            @if($isLike)
                <a href="{{ route('oeuvres.show', [$oeuvre->id]) }}?type=remove" class="btn btn-primary">
                    Dislike
                </a>
            @else
                <a href="{{ route('oeuvres.show', [$oeuvre->id]) }}?type=add" class="btn btn-primary">
                    Like
                </a>
            @endif
        @endif
        <h3>Nombre de likes :</h3>
        <p>{{ $oeuvre->likes()->count() }}</p>

        <h2>Nom :</h2>
        <p>{{$oeuvre->nom}}</p>
        <h2>Description :</h2>
        <p>{!! $oeuvre->description !!}</p>
        <h2>Date de création :</h2>
        <p>{{$oeuvre->date_creation}}</p>
        <h2>Auteur :</h2>
        <p><a href="{{ route('auteurs.show', $oeuvre->id) }}">{{$oeuvre->auteur}}</a></p>
        <br>
        <h2>Commentaires</h2>
        @foreach($commentaires as $commentaire)
            <li>{{$commentaire->titre}}</li>
            {!! $commentaire->contenu !!}
        @endforeach
        @if(Auth::check())
        <form method="POST" action="{{route("commentaire.store", $oeuvre->id)}}">
            {!! csrf_field() !!}
            <div class="text-center" style="margin-top: 2rem">
                <h3>Ajouter un commentaire</h3>
                <hr class="mt-2 mb-2">
            </div>
            <input id="oeuvre_id" name="oeuvre_id" type="hidden" value="{{ $oeuvre->id }}">
            <div>
                <label for="titre"><strong>Titre : </strong></label>
                <input type="text" name="titre" id="titre"
                       value="{{ old('titre') }}"
                       placeholder="titre">
            </div>
            <div>
                <label for="contenu"><strong>Votre commentaire :</strong></label>
                <textarea name="contenu" id="contenu" rows="6" class="form-control"
                          placeholder="Votre commentaire..">{{ old('contenu') }}</textarea>
            </div>
            <div>
                <button class="btn btn-success" type="submit">Valider</button>
            </div>
        </form>
        @endif
    @else
        <h1>L'œuvre n'existe pas</h1>
    @endif
</article>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection

@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('title')
    <div class="bannier" style="background-image: url({{asset('storage/images/annexes/baniere.jpg')}});">
        <h2>{{ $auteur }}</h2>
    </div>
@endsection

@section('content')
    <article class="container">
        @if (!empty($auteur && !empty($oeuvres)))
            <h2>{{ $auteur }}</h2>
            <h3>Liste de ses oeuvres</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom de l'oeuvre</th>
                    <th scope="col">Date de création</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($oeuvres as $oeuvre)
                    @if($oeuvre->auteur == $auteur)
                        <tr>
                            <td> <img src="{{asset('storage/'.$oeuvre->thumbnail_url)}}" alt="image de l'oeuvre"></td>
                            <td>{{ $oeuvre->nom}}</td>
                            <td>{{ $oeuvre->date_creation}}</td>
                            <td><a href="{{ route('oeuvres.show', $oeuvre->id) }}">Voir</a></td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        @else
            <i>L'auteur n'a pas d'œuvres ou n'existe pas</i>
        @endif
    </article>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection

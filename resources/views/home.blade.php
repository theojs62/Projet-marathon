@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('title')
    <div class="bannier" style="background-image: url({{asset('storage/images/annexes/baniere.jpg')}});">
        <h2>
            Bienvenue sur l’exposition virtuelle d’Art To Movies.
        </h2>
    </div>
@endsection

@section('content')
    <section class="page">
        <h2>NOS  DIFFÉRENTES  SALLES</h2>
        <section class="genre">
            <div class="genre-item sfpr-txt">
                <p>{!! $firstSalle->description !!}</p>
            </div>
            <div class="genre-item sfpr-img" style="background-image: url({{ asset('storage/'.$firstSalle->oeuvres->first()->media_url) }});"></div>
        </section>
        <section class="genre genre-inverse">
            <div class="genre-item sfpr-txt">
                <p><p>{!! $secondSalle->description !!}</p>
            </div>
            <div class="genre-item sfpr-img" style="background-image: url({{ asset('storage/'.$secondSalle->oeuvres->first()->media_url) }});"></div>
        </section>
        <section class="genre">
            <div class="genre-item sfpr-txt">
                <p>{!! $thirdSalle->description !!}</p>
            </div>
            <div class="genre-item sfpr-img" style="background-image: url({{ asset('storage/'.$thirdSalle->oeuvres->first()->media_url) }});"></div>
        </section>
        <section class="genre genre-inverse">
            <div class="genre-item sfpr-txt">
                <p>{!! $fourSalle->description !!}</p>
            </div>
            <div class="genre-item sfpr-img" style="background-image: url({{ asset('storage/'.$fourSalle->oeuvres->first()->media_url) }});"></div>
        </section>
    </section>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection

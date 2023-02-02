@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <section class="hall">
        <div class="hall-logo">
            <img src="images/logo2.png" alt="">
        </div>
        <div class="hall-titre">
            <h2>Exposition de FanArt</h2>
        </div>
        <a href="{{ route('salle.show', $s->id) }}">Commencez votre visite !</a>
    </section>
@endsection

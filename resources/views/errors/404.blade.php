@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('title')
    <div class="bannier" style="background-image: url({{asset('storage/images/annexes/baniere.jpg')}});">
        <h2>
            Error 404
        </h2>
    </div>
@endsection

@section('content')
    <section id="error">
        <div class="erreur">
            <p>
                La page que vous demandez n'a pas été trouvé.
            </p>
        </div>
    </section>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection

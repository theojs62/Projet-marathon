@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('title')
    <div class="bannier" style="background-image: url({{asset('storage/images/annexes/baniere.jpg')}});">
        <h2>Ajouter une oeuvre</h2>
    </div>
@endsection

@section('content')
<form action="{{route('oeuvres.store')}}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="text-center" style="margin-top: 2rem">
        <h3>Ajouter une Oeuvre</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>

        <label for="nom"><strong>Nom : </strong></label>
        <input type="text" name="nom" id="nom"
               value="{{ old('nom') }}"
               placeholder="nom">
    </div>
    <div>
        <label for="textarea-input"><strong>Description :</strong></label>
        <textarea name="description" id="description" rows="6" class="form-control"
                  placeholder="Description.."></textarea>
    </div>

    <div>

        <label for="auteur"><strong>Auteur : </strong></label>
        <input type="text" name="auteur" id="auteur"
               value="{{ old('auteur') }}"
               placeholder="auteur">
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1">Ajouter une grande image :</label>
        <input type="file" class="image" id="media_url" name="media_url">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Ajouter une petite image :</label>
        <input type="file" class="image" id="thumbnail_url" name="thumbnail_url">
    </div>
    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
</form>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection

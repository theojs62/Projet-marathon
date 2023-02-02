@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
<body>
<div class="salle-fond" style="background-image: url({{ asset('storage/'.$salle->plan_url) }}); background-size: cover;">
    <div class="slideshow-container">
        @foreach($oeuvres as $oeuvre)
            <div class="mySlides fade">
                <a href="{{ route('oeuvres.show', $oeuvre->id) }}">
                    <img src="{{ asset('storage/'.$oeuvre->media_url) }}" style="width:100%" alt="Image de l'oeuvre">
                </a>
            </div>
        @endforeach
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <br>

    <div class="pts" style="text-align:center">
        @for($i = 0; $i < $oeuvres->count(); $i++)
            <span class="dot" onclick="currentSlide({{ $i + 1 }})"></span>
        @endfor
    </div>

    @foreach($sallesSuivantes as $salle)
        <div class="but-on">
            <a href="{{ route('salle.show', $salle->id) }}">{{ $salle->nom}}</a>
        </div>
    @endforeach

</div>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>
</body>
@endsection


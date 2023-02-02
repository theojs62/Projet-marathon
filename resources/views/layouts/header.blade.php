<!--header-->
<header>
    <div class="pre-header">
        <nav class="container">
            <h1 id="logo" href="">Art to Movies</h1>
            <a class="" href="{{ route('accueil') }}">Accueil</a>
            <a href="{{ route('salle.index') }}">Exposition</a>
            <a class="" href="ressources.html">Ressource</a>
            <a class="" href="contact.html">Contact</a>
            @guest
                <a href="{{ route('login') }}">Connexion</a>
            @else
                @if (Auth::user())
                    <a href="{{ route('users.show', Auth::user()->id) }}">Mon profil</a>
                    <a href="{{ route('oeuvres.create') }}">Ajouter une oeuvre</a>
                @endif
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}"
                      method="POST" style="display: none;"> {{ csrf_field() }}
                </form>
            @endguest
        </nav>
    </div>
</header>

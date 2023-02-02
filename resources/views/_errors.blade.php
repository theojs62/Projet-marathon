@if ($errors->any())
    <div class="errors">
        <h3 class="titre-erreurs">Liste des erreurs</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

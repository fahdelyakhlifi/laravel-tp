
@extends ('tp5/layout')
@section('content')

<div class="container mt-4 p-4 border rounded shadow bg-light">
    <h1 class="text-center text-primary">Détails de la Marque</h1>

    @if ($marque)
        <ul class="list-group">
            <li class="list-group-item"><strong>ID :</strong> {{ $marque->id }}</li>
            <li class="list-group-item"><strong>Nom :</strong> {{ $marque->name }}</li>
            <li class="list-group-item"><strong>Description :</strong> {{ $marque->description }}</li>
        </ul>
    @else
        <div class="alert alert-warning text-center">Aucune Marque trouvée</div>
    @endif

    <div class="text-center mt-3">
        <a href="{{ route('marque.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>



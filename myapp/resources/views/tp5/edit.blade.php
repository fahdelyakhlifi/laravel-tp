@extends ('layouts.bootstrap')
@section('content')

<div class="container p-4 mt-4 border rounded shadow bg-light">
    <h2 class="text-center text-primary">Modifier la Marque</h2>

    <form action="/marque/{{ $marque->id }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nn" class="form-label">Nom :</label>
            <input type="text" name="nn" id="nn" class="form-control" value="{{ $marque->name }}" required>
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label">Description :</label>
            <textarea name="desc" id="desc" class="form-control" rows="4">{{ $marque->description }}</textarea>
        </div>

        <input type="hidden" name="ii" value="{{ $marque->id }}">

        <div class="d-flex justify-content-between">
            <a href="{{ route('marque.index') }}" class="btn btn-secondary">Annuler</a>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </div>
    </form>
</div>



{{-- code sans design --}}
{{-- @extends ('layouts.app')
@section('content')

<h2>Modifier la Marque</h2>

<form action="/marque/{{ $marque->id }}" method="post">
    @csrf
    @method('PUT')

    <div>
        <label for="nn">Nom :</label>
        <input type="text" name="nn" id="nn" value="{{ $marque->name }}" required>
    </div>

    <div>
        <label for="desc">Description :</label>
        <textarea name="desc" id="desc" rows="4">{{ $marque->description }}</textarea>
    </div>

    <input type="hidden" name="ii" value="{{ $marque->id }}">

    <div>
        <a href="{{ route('marque.index') }}">Annuler</a>
        <button type="submit">Mettre à jour</button>
    </div>
</form>

@endsection --}}
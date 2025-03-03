@extends ('layouts.bootstrap')
@section('content')
<form action="/marque" method="post" class="container p-4 mt-4 border rounded shadow bg-light">
    @csrf
    <div class="mb-3">
        <label for="nn" class="form-label fw-bold">Nom :</label>
        <input type="text" name="nn" id="nn" class="form-control" placeholder="Entrez le nom">
    </div>

    <div class="mb-3">
        <label for="desc" class="form-label fw-bold">Description :</label>
        <textarea name="desc" id="desc" class="form-control" rows="4" placeholder="Ajoutez une description"></textarea>
    </div>

    <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
</form>




{{-- code sans design --}}
{{-- @extends ('layouts.app')
@section('content')
<form action="/marque" method="post">
    @csrf
    <div>
        <label for="nn">Nom :</label>
        <input type="text" name="nn" id="nn" placeholder="Entrez le nom">
    </div>

    <div>
        <label for="desc">Description :</label>
        <textarea name="desc" id="desc" rows="4" placeholder="Ajoutez une description"></textarea>
    </div>

    <button type="submit">Enregistrer</button>
</form>
@endsection --}}
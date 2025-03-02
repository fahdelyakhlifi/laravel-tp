@extends ('layouts.bootstrap')
@section('content')
<form action="/enregistre" method="post" class="container p-4 mt-4 border rounded shadow bg-light">
    @csrf

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error )
            <li>{{$error }}</li>
            @endforeach
        </ul>
    </div>

    @else

    @endif

    <div class="mb-3">
        <label for="nn" class="form-label fw-bold">name :</label>
        <input type="text" name="name" id="nn" class="form-control" placeholder="Entrez le nom">
        @error('name')
        <p style="color: red">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="pp" class="form-label fw-bold">prix :</label>
        <input type="number" name="prix" id="pp" placeholder="Ajoutez prix"></input>
        @error('prix')
        <p style="color: red"> ajouter prix :{{$message}}</p>
        @enderror
    </div>



    <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
</form>

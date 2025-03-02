@extends ('layouts.bootstrap')
@section('content')



    <div class="p-4 shadow-lg card">
        <h1 class="mb-4 text-center text-dark">Liste des Marques</h1>

        <!-- Formulaire de recherche -->
        <form class="mb-4 d-flex justify-content-center" action="/marque" method="get">
            <input type="text" class="form-control w-50 me-2" name="search" value="{{ request('search') }}"
                placeholder="Rechercher une marque...">
            <button type="submit" class="btn btn-outline-primary">Rechercher</button>
        </form>

        <!-- Bouton Ajouter une marque -->
        <div class="mb-3 text-end">
            <a href="marque/create" class="btn btn-primary">
                <i class="fas fa-plus"></i> Ajouter une marque
            </a>
        </div>

        <!-- Tableau des marques -->
        <div class="table-responsive">
            <table class="table align-middle table-hover">
                <thead class="text-center table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marqs as $m)
                        <tr>
                            <td class="text-center">{{ $m->id }}</td>
                            <td>{{ $m->name }}</td>
                            <td>{{ $m->description }}</td>
                            <td class="text-center">
                                <a href="/marque/{{$m->id}}/edit" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                                <form action="/marque/{{ $m->id }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette marque ?');">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            {{$marqs->links("pagination::bootstrap-4")}}
        </div>
    </div>


@endsection






{{-- code sans design --}}
{{-- @extends ('layouts.app')
@section('content')

<h1>Liste des Marques</h1>

<!-- Formulaire de recherche -->
<form action="/marque" method="get">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher une marque...">
    <button type="submit">Rechercher</button>
</form>

<!-- Bouton Ajouter une marque -->
<div>
    <a href="marque/create">Ajouter une marque</a>
</div>

<!-- Tableau des marques -->
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($marqs as $m)
        <tr>
            <td>{{ $m->id }}</td>
            <td>{{ $m->name }}</td>
            <td>{{ $m->description }}</td>
            <td>
                <a href="/marque/{{$m->id}}/edit">Modifier</a>
                <form action="/marque/{{ $m->id }}" method="post" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette marque ?');">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination -->
<div>
    {{$marqs->links()}}
</div>

@endsection --}}
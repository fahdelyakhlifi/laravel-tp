@extends ('tp5/layout')
@section('content')



    <div class="card shadow-lg p-4">
        <h1 class="text-center text-dark mb-4">Liste des Marques</h1>

        <!-- Formulaire de recherche -->
        <form class="d-flex justify-content-center mb-4" action="/marque" method="get">
            <input type="text" class="form-control w-50 me-2" name="search" value="{{ request('search') }}" placeholder="Rechercher une marque...">
            <button type="submit" class="btn btn-outline-primary">Rechercher</button>
        </form>

        <!-- Bouton Ajouter une marque -->
        <div class="text-end mb-3">
            <a href="marque/create" class="btn btn-primary">
                <i class="fas fa-plus"></i> Ajouter une marque
            </a>
        </div>

        <!-- Tableau des marques -->
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-primary text-center">
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
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette marque ?');">
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
        <div class="d-flex justify-content-center mt-4">
            {{$marqs->links("pagination::bootstrap-4")}}
        </div>
    </div>


@endsection

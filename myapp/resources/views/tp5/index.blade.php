@extends ('tp5/layout')
@section('content')

<body class="container mt-4">
    <h1 class="text-center mb-4">Liste des Marques</h1>

    <a href="marque/create" class="btn btn-primary mb-3">Ajouter une marque</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
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
                        <a href="/marque/{{$m->id}}/edit" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="/marque/{{ $m->id }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{$marqs->links("pagination::bootstrap-4")}}
    </div>

</body>
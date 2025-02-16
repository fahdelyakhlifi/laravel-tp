@extends ('layout')
@section('content')
<div class="container mt-4">
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>
            @if($category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->prix }} DH</td>
                </tr>


        </tbody>
    </table>
    @else
        <p colspan="3" class="text-center text-warning">
            Désolé, aucun produit trouvé avec le nom :
                <strong class="text-danger">{{ $nom }}</strong>
        </p>
</div>
    @endif

@endsection

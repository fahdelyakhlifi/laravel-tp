@extends('layouts.app')

@section('content')
    <div class="container min-h-screen px-6 py-10 mx-auto bg-gray-100">

        <!-- Titre de la page -->
        <h1 class="mt-4 mb-8 text-3xl font-bold text-center text-gray-800">Liste des Produits</h1>

        <!-- Bouton Ajouter un produit -->
        <div class="mt-4 mb-6 text-center">
            <a href="{{ route('products.create') }}" class="px-4 py-2 text-white rounded bg-sky-700">+ Ajouter
                un produit</a>
        </div>


        <!-- Barre de recherche et selecteur de tri -->
        <div class="flex items-center mb-6" style="gap: 16px;">


            <!-- Barre de Recherche -->
            <form action="{{ route('products.index') }}" method="GET" class="flex items-center" style="margin-right: 16px;">

                <input type="text" name="search" placeholder="Recherche par produit" class="px-4 py-2 border rounded"
                    value="{{ request('search') }}" style="margin-right: 5px;">

                <input type="number" name="min" placeholder="Rechercher par min" class="px-4 py-2 border rounded"
                    value="{{ request('min') }}" style="margin-right: 5px;">

                <input type="number" name="max" placeholder="Recherche par max" class="px-4 py-2 border rounded"
                    value="{{ request('max') }}" style="margin-right: 5px;">


                <button type="submit" class="px-4 py-2 text-white rounded bg-sky-700">
                    Recherche
                </button>

                <!-- Button de search de data ajax  -->
                <button type="button" class="px-4 py-2 ml-4 text-white rounded loadData bg-sky-400"
                    onclick="LoadData()">Load Data</button>
            </form>

            <!-- Selecteur de tri -->
            <form action="{{ route('products.index') }}" method="GET" class="flex items-center">

                <select name="sort" onchange="this.form.submit()" class="px-4 py-2 border rounded">

                    <option value="">Trie Par prix</option>
                    <option value="min" {{ request('sort') == 'min' ? 'selected' : '' }}>Prix min</option>
                    <option value="max" {{ request('sort') == 'max' ? 'selected' : '' }}>Prix max</option>

                </select>
            </form>

            {{-- <p>Nombre de resultats : {{ count($products) }}</p> --}}
            {{-- pour calculer le total des produits rechercher --}}
            {{-- <p>Nombre de resultats : {{ $products->total() }}</p> --}}



        </div>

        <!-- Affichage du nombre total de résultats -->
        <div class="p-4 text-center text-blue-700 bg-blue-100 border border-blue-400 rounded-lg shadow-md">
            <p class="font-semibold">
                Nombre de résultats : {{ $products->total() }}
            </p>
        </div>

        <br>

        <!-- message de succès -->
        @if (session('success'))
            <div class="p-4 text-red-700 bg-red-100 border border-red-400 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <br>
        <!-- Tableau des produits -->
        <div class="overflow-hidden bg-white border border-gray-300 rounded-lg shadow-md">
            <table class="w-full border-collapse" id="table-result">
                <thead class="text-gray-800 bg-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-center">Titre</th>
                        <th class="px-4 py-3 text-center">Description</th>
                        <th class="px-4 py-3 text-center">Prix</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>


                <tbody class="divide-y divide-gray-300">
                    @foreach ($products as $product)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3 font-semibold text-gray-900">
                                {{ $product->title }}
                            </td>

                            <td class="px-4 py-3 text-center text-gray-700">
                                {{ $product->description }}
                            </td>

                            <td class="px-4 py-3 font-medium text-center text-gray-800">
                                {{ $product->newPrice }} dh
                                @if ($product->discount > 0)
                                    <span class="ml-2 text-gray-500 line-through">
                                        {{ $product->price }} dh
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-3 space-x-2 text-center">

                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="px-3 py-1 text-white transition bg-blue-500 rounded hover:bg-blue-700"
                                    style="margin-right: 10px;">
                                    Modifier
                                </a>

                                <a href="{{ route('products.show', $product->id) }}"
                                    class="px-3 py-1 text-white transition bg-green-500 rounded hover:bg-green-700"
                                    style="margin-right: 10px;">
                                    Détails
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 text-white transition bg-red-500 rounded hover:bg-red-700">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Script Ajax -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function LoadData() {
                console.log("Bouton cliqué !");
                $.ajax({


                    url: "{{ route('ajax.list') }}", // Assurez-vous que cette route est correcte



                    type: "GET",



                    data: {
                        search: $("input[name='search']").val(),
                        min: $("input[name='min']").val(),
                        max: $("input[name='max']").val(),
                        sort: $("select[name='sort']").val()
                    },



                    success: function (result) {
                        console.log("Données chargées avec succès", result);
                        $("#table-result tbody").html(result.html);     // Mettre à jour uniquement le tbody
                    },



                    error: function (result) {
                        console.error("Erreur lors du chargement des données", result);
                    }
                });
            }

            // Appeler LoadData() lors du clic sur un bouton
            $(document).ready(function () {
                $(".loadData").on("click", function () {
                    LoadData();
                });
            });
        </script>

        <!-- Pagination -->
        <div class="flex justify-center mt-6 space-x-2">
            <a href="{{ $products->previousPageUrl() }}" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">
                Précédent
            </a>
            @for ($i = 1; $i <= $products->lastPage(); $i++)
                <a href="{{ $products->url($i) }}"
                    class="px-3 py-1 rounded {{ $products->currentPage() === $i ? 'bg-blue-500 text-white' : 'bg-gray-300 hover:bg-gray-400' }}">
                    {{ $i }}
                </a>
            @endfor
            <a href="{{ $products->nextPageUrl() }}" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">
                Suivant
            </a>
        </div>
    </div>
@endsection





{{-- code sans design --}}
{{-- @extends('layouts.app')

@section('content')
<div class="container">

    <!-- Titre de la page -->
    <h1>Liste des Produits</h1>

    <!-- Bouton Ajouter un produit -->
    <a href="{{ route('products.create') }}">+ Ajouter un produit</a>

    <!-- Formulaire de recherche -->
    <form action="{{ route('products.index') }}" method="GET">
        <input type="text" name="search" placeholder="Recherche par produit" value="{{ request('search') }}">
        <input type="number" name="min" placeholder="Prix min" value="{{ request('min') }}">
        <input type="number" name="max" placeholder="Prix max" value="{{ request('max') }}">
        <button type="submit">Rechercher</button>
    </form>

    <!-- Sélecteur de tri -->
    <form action="{{ route('products.index') }}" method="GET">
        <select name="sort" onchange="this.form.submit()">
            <option value="">Trie Par prix</option>
            <option value="min" {{ request('sort')=='min' ? 'selected' : '' }}>Prix min</option>
            <option value="max" {{ request('sort')=='max' ? 'selected' : '' }}>Prix max</option>
        </select>
    </form>

    <!-- Affichage du nombre total de résultats -->
    <p>Nombre de résultats : {{ $products->total() }}</p>

    <!-- Message de succès -->
    @if (session('success'))
    <p>{{ session('success') }}</p>
    @endif

    <!-- Tableau des produits -->
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->newPrice }} dh</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}">Modifier</a>
                    <a href="{{ route('products.show', $product->id) }}">Détails</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div>
        <a href="{{ $products->previousPageUrl() }}">Précédent</a>
        @for ($i = 1; $i <= $products->lastPage(); $i++)
            <a href="{{ $products->url($i) }}">{{ $i }}</a>
            @endfor
            <a href="{{ $products->nextPageUrl() }}">Suivant</a>
    </div>
</div>
@endsection --}}
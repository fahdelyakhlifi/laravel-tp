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
                <button type="submit" class="px-4 py-2 text-white rounded bg-sky-700">
                    Recherche
                </button>

                <!-- Button de search de data ajax  -->
                <button type="button" class="px-4 py-2 ml-4 text-white rounded loadData bg-sky-400">Load Data</button>
            </form>

            <!-- Selecteur de tri -->
            <form action="{{ route('products.index') }}" method="GET" class="flex items-center">

                <select name="sort" onchange="this.form.submit()" class="px-4 py-2 border rounded">

                    <option value="">Trie Par prix</option>
                    <option value="min" {{ request('sort') == 'min' ? 'selected' : '' }}>Prix min</option>
                    <option value="max" {{ request('sort') == 'max' ? 'selected' : '' }}>Prix max</option>

                </select>
            </form>
        </div>

        <!-- Tableau des produits -->
        <div class="overflow-hidden bg-white border border-gray-300 rounded-lg shadow-md">
            <table class="w-full border-collapse">
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
            $(document).ready(function () {
                $(".loadData").click(function () {
                    let search = $("input[name='search']").val();
                    let sort = $("select[name='sort']").val();

                    console.log("Bouton cliqué !");
                    $.ajax({

                        url: "{{ route('ajax.list') }}",


                        type: "GET",


                        data: { search: search, sort: sort },


                        success: function (response) {
                            if (response.html) {
                                $("tbody").html(response.html);
                            }
                        },


                        error: function (xhr) {
                            console.error("Erreur lors du chargement des données", xhr);
                        }
                    });
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
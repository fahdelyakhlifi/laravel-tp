@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-10 bg-gray-100 min-h-screen">

        <!-- Titre de la page -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mt-4 mb-8">Liste des Produits</h1>

        <!-- Bouton Ajouter un produit -->
        <div class="text-center mt-4 mb-6">
            <a href="{{ route('products.create') }}" class="bg-sky-700 text-white px-4 py-2 rounded">+ Ajouter
                un produit</a>
        </div>


        <!-- Barre de recherche et selecteur de tri -->
        <div class="flex items-center mb-6" style="gap: 16px;">


            <!-- Barre de Recherche -->
            <form action="{{ route('products.index') }}" method="GET" class="flex items-center" style="margin-right: 16px;">

                <input 
                    type="text" 
                    name="search" 
                    placeholder="Recherche par produit" 
                    class="px-4 py-2 border rounded"
                    value="{{ request('search') }}"
                    style="margin-right: 5px;"
                >
                <button 
                    type="submit" 
                    class="bg-sky-700 text-white px-4 py-2 rounded"
                >
                    Recherche
                </button>
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
        <div class="overflow-hidden bg-white shadow-md rounded-lg border border-gray-300">
            <table class="w-full border-collapse">
                <thead class="bg-gray-200 text-gray-800">
                    <tr>
                        <th class="py-3 px-4 text-center">Titre</th>
                        <th class="py-3 px-4 text-center">Description</th>
                        <th class="py-3 px-4 text-center">Prix</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>


                <tbody class="divide-y divide-gray-300">
                    @foreach ($products as $product)
                        <tr class="hover:bg-gray-100">
                            <td class="py-3 px-4 font-semibold text-gray-900">
                                {{ $product->title }}
                            </td>

                            <td class="py-3 px-4 text-center text-gray-700">
                                {{ $product->description }}
                            </td>

                            <td class="py-3 px-4 text-center font-medium text-gray-800">
                                {{ $product->newPrice }} dh
                                @if ($product->discount > 0)
                                    <span class="text-gray-500 line-through ml-2">
                                        {{ $product->price }} dh
                                    </span>
                                @endif
                            </td>

                            <td class="py-3 px-4 text-center space-x-2">

                                <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 transition" style="margin-right: 10px;">
                                    Modifier
                                </a>

                                <a href="{{ route('products.show', $product->id) }}"
                                    class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700 transition" style="margin-right: 10px;">
                                    Détails
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 transition" >Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Pagination -->
        <div class="mt-6 flex justify-center space-x-2">
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
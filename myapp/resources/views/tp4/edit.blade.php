@extends('layouts.app')

@section('content')
    <div class="container px-4 py-8 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-center">Modifier le Produit : {{ $product->title }}</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST"
            class="max-w-lg p-6 mx-auto bg-white rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <!-- Title Field -->
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Titre :</label>
                <input type="text" name="title" id="title" value="{{ $product->title }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Entrez le titre du produit" required>
            </div>

            <!-- Price Field -->
            <div class="mb-6">
                <label for="price" class="block mb-2 text-sm font-bold text-gray-700">Prix :</label>
                <input type="number" step="0.01" name="price" id="price" value="{{ $product->price }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Entrez le prix du produit" required>
            </div>

            <!-- Description Field -->
            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-bold text-gray-700">Description :</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Entrez la description du produit">{{ $product->description }}</textarea>
            </div>

            <!-- Discount Field -->
            <div class="mb-6">
                <label for="discount" class="block mb-2 text-sm font-bold text-gray-700">Discount :</label>
                <input type="number" step="0.01" name="discount" id="discount" value="{{ $product->discount }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Entrez le discount (si applicable)">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                    class="px-6 py-2 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">Enregistrer
                    les Modifications</button>
            </div>
        </form>
    </div>
@endsection






{{-- code sans design --}}
{{-- @extends('layouts.app')

@section('content')
<div>
    <h1>Modifier le Produit : {{ $product->title }}</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Champ Titre -->
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" value="{{ $product->title }}" required>
        </div>

        <!-- Champ Prix -->
        <div>
            <label for="price">Prix :</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ $product->price }}" required>
        </div>

        <!-- Champ Description -->
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description" rows="4">{{ $product->description }}</textarea>
        </div>

        <!-- Champ Discount -->
        <div>
            <label for="discount">Discount :</label>
            <input type="number" step="0.01" name="discount" id="discount" value="{{ $product->discount }}">
        </div>

        <!-- Bouton Soumettre -->
        <div>
            <button type="submit">Enregistrer les Modifications</button>
        </div>
    </form>
</div>
@endsection --}}
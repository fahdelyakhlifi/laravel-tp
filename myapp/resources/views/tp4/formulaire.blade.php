@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Ajouter un Nouveau Produit</h1>

        <form action="{{ route('products.store') }}" method="POST"
            class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
            @csrf
            <!-- Title Field -->
            <div class="mb-6">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre :</label>
                <input type="text" name="title" id="title"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Entrez le titre du produit" required>
                    @error()
                        <p style="color: red"> ajouter prix</p>
                    @enderror
            </div>

            <!-- Price Field -->
            <div class="mb-6">
                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Prix :</label>
                <input type="number" step="0.01" name="price" id="price"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Entrez le prix du produit" required>
                    @error()
                        <p style="color: red"> ajouter prix</p>
                    @enderror
            </div>

            <!-- Description Field -->
            <div class="mb-6">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description :</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Entrez la description du produit"></textarea>
            </div>

            <!-- Discount Field -->
            <div class="mb-6">
                <label for="discount" class="block text-gray-700 text-sm font-bold mb-2">Discount :</label>
                <input type="number" step="0.01" name="discount" id="discount"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Entrez le discount (si applicable)">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Ajouter le
                    Produit</button>
            </div>
        </form>
    </div>
@endsection

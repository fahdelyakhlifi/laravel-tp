@extends('layouts.app')

@section('content')
    <div class="container px-4 py-8 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-center">Modifier le Produit : {{ $product->title }}</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST"
            class="max-w-lg p-6 mx-auto bg-white rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <!-- message de succès -->
            @if (session('success'))
                <div class="p-4 mb-4 text-green-700 bg-green-100 border border-green-400 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Title Field -->
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Titre :</label>
                <input type="text" name="title" id="title" value="{{ old('title', $product->title) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                    placeholder="Entrez le titre du produit" required>

                @error('title')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price Field -->
            <div class="mb-6">
                <label for="price" class="block mb-2 text-sm font-bold text-gray-700">Prix :</label>
                <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('price') border-red-500 @enderror"
                    placeholder="Entrez le prix du produit" required>

                @error('price')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description Field -->
            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-bold text-gray-700">Description :</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                    placeholder="Entrez la description du produit">{{ old('description', $product->description) }}</textarea>

                @error('description')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Discount Field -->
            <div class="mb-6">
                <label for="discount" class="block mb-2 text-sm font-bold text-gray-700">Discount :</label>
                <input type="number" step="0.01" name="discount" id="discount"
                    value="{{ old('discount', $product->discount) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('discount') border-red-500 @enderror"
                    placeholder="Entrez le discount (si applicable)">

                @error('discount')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-between">
                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                        class="px-6 py-2 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                        Enregistrer les Modifications
                    </button>
                </div>

                <!-- Bouton pour retourner à la liste des produits -->
                <a href="{{ route('products.index') }}"
                    class="px-6 py-2 text-white transition duration-300 bg-gray-500 rounded-lg hover:bg-gray-600">
                    Voir la liste
                </a>
            </div>
        </form>
    </div>
@endsection







{{-- code sans design --}}
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Produit : {{ $product->title }}</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Title Field -->
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" value="{{ old('title', $product->title) }}" required>

            @error('title')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- Price Field -->
        <div>
            <label for="price">Prix :</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}"
                required>

            @error('price')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- Description Field -->
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description"
                rows="4">{{ old('description', $product->description) }}</textarea>

            @error('description')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- Discount Field -->
        <div>
            <label for="discount">Discount :</label>
            <input type="number" step="0.01" name="discount" id="discount"
                value="{{ old('discount', $product->discount) }}">

            @error('discount')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit">Enregistrer les Modifications</button>
        </div>
    </form>
</div>
@endsection --}}
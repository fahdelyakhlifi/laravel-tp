@extends('layouts.app')

@section('content')


    <div class="container px-4 py-8 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-center">Ajouter un Nouveau Produit</h1>

        <!-- Groupe des error -->
        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                <strong>Erreurs de validation :</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <!-- Formulaire -->
        <form action="{{ route('products.store') }}" method="POST"
            class="max-w-lg p-6 mx-auto bg-white rounded-lg shadow-md">
            @csrf

            <!-- Title Field -->
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Titre :</label>
                <input type="text" name="title" id="title"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent "
                    placeholder="Entrez le titre du produit">

                <!-- Error Message -->
                @error('title')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price Field -->
            <div class="mb-6">
                <label for="price" class="block mb-2 text-sm font-bold text-gray-700">Prix :</label>
                <input type="number" step="0.01" name="price" id="price"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Entrez le prix du produit">

                <!-- Error Message -->
                @error('price')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description Field -->
            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-bold text-gray-700">Description :</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent "
                    placeholder="Entrez la description du produit">
                     </textarea>

                <!-- Error Message -->
                @error('description')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Discount Field -->
            <div class="mb-6">
                <label for="discount" class="block mb-2 text-sm font-bold text-gray-700">Discount :</label>
                <input type="number" step="0.01" name="discount" id="discount"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Entrez le discount (si applicable)">

                <!-- Error Message -->
                @error('discount')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                    class="px-6 py-2 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">Ajouter le
                    Produit</button>
            </div>
        </form>
    </div>
@endsection



{{-- code sans design --}}
{{-- @extends('layouts.app')

@section('content')
<div>
    <h1>Ajouter un Nouveau Produit</h1>

    <!-- Groupe des error -->
    @if ($errors->any())
    <di>
        <strong>Erreurs de validation :</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </di>
    @endif


    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <!-- Champ Titre -->
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">


            @error('title')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Prix -->
        <div>
            <label for="price">Prix :</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}">
            @error('price')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Description -->
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description" rows="4">{{ old('description') }}</textarea>
            @error('description')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Discount -->
        <div>
            <label for="discount">Discount :</label>
            <input type="number" step="0.01" name="discount" id="discount" value="{{ old('discount') }}">
            @error('discount')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Bouton Soumettre -->
        <div>
            <button type="submit">Ajouter le Produit</button>
        </div>
    </form>
</div>
@endsection --}}
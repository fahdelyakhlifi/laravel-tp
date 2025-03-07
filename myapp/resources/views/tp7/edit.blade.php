@extends('layouts.laptop_layout')

@section('title', __('messages.edit_laptop'))

@section('content')
    <h1 class="mb-6 text-3xl font-bold text-start">@lang('messages.edit_laptop')</h1>

    {{-- Afficher le message de succès --}}
    @if (session('success'))
        <div class="p-4 mb-6 text-green-700 bg-green-100 border-l-4 border-green-500">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('laptops.update', $laptops->id) }}" method="POST" class="p-6 mb-8 bg-white rounded-lg shadow-md"
        enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- Utilisation de la méthode PUT pour la mise à jour --}}

        {{-- Champ pour le nom du laptop --}}
        <div class="mb-4">
            <label for="name"
                class="block text-sm font-medium text-gray-700 text-start">@lang('messages.laptop_name')</label>
            <input type="text" name="name" id="name" value="{{ old('name', $laptops->name) }}"
                class="w-full p-2 mt-1 border border-gray-300 rounded">
            @error('name')
                <p class="mt-1 text-sm text-red-500 text-start">{{ $message }}</p>
            @enderror
        </div>

        {{-- Champ pour le prix du laptop --}}
        <div class="mb-4">
            <label for="price"
                class="block text-sm font-medium text-gray-700 text-start">@lang('messages.laptop_price')</label>
            <input type="text" name="price" id="price" value="{{ old('price', $laptops->price) }}"
                class="w-full p-2 mt-1 border border-gray-300 rounded">
            @error('price')
                <p class="mt-1 text-sm text-red-500 text-start">{{ $message }}</p>
            @enderror
        </div>

        {{-- Champ pour la description du laptop --}}
        <div class="mb-4">
            <label for="description"
                class="block text-sm font-medium text-gray-700 text-start">@lang('messages.laptop_description')</label>
            <input type="text" name="description" id="description" value="{{ old('description', $laptops->description) }}"
                class="w-full p-2 mt-1 border border-gray-300 rounded">
            @error('description')
                <p class="mt-1 text-sm text-red-500 text-start">{{ $message }}</p>
            @enderror
        </div>

        {{-- Champ pour téléverser une image --}}
        <div class="mb-4">
            <label for="image"
                class="block text-sm font-medium text-gray-700 text-start">@lang('messages.laptop_image_upload')</label>
            <input type="file" name="image" id="image" class="w-full p-2 mt-1 border border-gray-300 rounded">
            @error('image')
                <p class="mt-1 text-sm text-red-500 text-start">{{ $message }}</p>
            @enderror
        </div>

        {{-- Champ pour l'URL de l'image --}}
        <div class="mb-4">
            <label for="image_url"
                class="block text-sm font-medium text-gray-700 text-start">@lang('messages.laptop_image_url')</label>
            <input type="text" name="image_url" id="image_url" value="{{ old('image_url', $laptops->image_url) }}"
                class="w-full p-2 mt-1 border border-gray-300 rounded">
            @error('image_url')
                <p class="mt-1 text-sm text-red-500 text-start">{{ $message }}</p>
            @enderror
        </div>

        {{-- Boutons pour soumettre ou annuler --}}
        <div class="flex justify-between mb-4">
            {{-- Bouton de mise à jour --}}
            <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">
                <i class="mr-2 fas fa-save"></i> @lang('messages.update_laptop')
            </button>

            {{-- Bouton de retour --}}
            <a href="{{ route('laptops.index') }}" class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600">
                <i class="mr-2 fas fa-arrow-left"></i> @lang('messages.back_to_list')
            </a>
        </div>
    </form>
@endsection



{{-- code sans design --}}
{{-- Étendre le layout de base
@extends('layouts.laptop_layout')


Définir le titre de la page
@section('title', __('messages.edit_laptop'))


Contenu de la page
@section('content')


Titre de la page
<h1>@lang('messages.edit_laptop')</h1>

Formulaire de modification
<form action="{{ route('laptops.update', $laptops->id) }}" method="POST" enctype="multipart/form-data">

    @csrf Token CSRF pour la sécurité

    @method('PUT') Utilisation de la méthode PUT pour la mise à jour

    Champ pour le nom du laptop
    <div>
        <label for="name">@lang('messages.laptop_name')</label>
        <input type="text" name="name" id="name" value="{{ old('name', $laptops->name) }}">

        Affichage des erreurs de validation pour le champ "name"
        @error('name')
        <p>{{ $message }}</p>
        @enderror
    </div>

    Champ pour le prix du laptop
    <div>
        <label for="price">@lang('messages.laptop_price')</label>
        <input type="text" name="price" id="price" value="{{ old('price', $laptops->price) }}">

        Affichage des erreurs de validation pour le champ "price"
        @error('price')
        <p>{{ $message }}</p>
        @enderror
    </div>

    Champ pour la description du laptop
    <div>
        <label for="description">@lang('messages.laptop_description')</label>
        <input type="text" name="description" id="description" value="{{ old('description', $laptops->description) }}">

        Affichage des erreurs de validation pour le champ "description"
        @error('description')
        <p>{{ $message }}</p>
        @enderror
    </div>

    Champ pour téléverser une image
    <div>
        <label for="image">@lang('messages.laptop_image_upload')</label>
        <input type="file" name="image" id="image">

        Affichage des erreurs de validation pour le champ "image"
        @error('image')
        <p>{{ $message }}</p>
        @enderror
    </div>

    Champ pour l'URL de l'image
    <div>
        <label for="image_url">@lang('messages.laptop_image_url')</label>
        <input type="text" name="image_url" id="image_url" value="{{ old('image_url', $laptops->image_url) }}">

        Affichage des erreurs de validation pour le champ "image_url"
        @error('image_url')
        <p>{{ $message }}</p>
        @enderror
    </div>

    Boutons pour soumettre ou annuler
    <div>
        Bouton de mise à jour
        <button type="submit">@lang('messages.update_laptop')</button>

        Bouton de retour à la liste
        <a href="{{ route('laptops.index') }}">@lang('messages.back_to_list')</a>
    </div>
</form>
@endsection --}}
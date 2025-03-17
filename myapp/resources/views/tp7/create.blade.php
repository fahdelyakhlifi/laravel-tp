@extends('layouts.laptop_layout')

@section('title', __('messages.add_laptop'))

@section('content')
    <h1 class="mb-6 text-3xl font-bold text-start">@lang('messages.add_laptop')</h1>

    {{-- Afficher le message de succès --}}
    @if (session('success'))
        <div class="p-4 mb-6 text-green-700 bg-green-100 border-l-4 border-green-500">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('laptops.store') }}" method="POST" class="p-6 mb-8 bg-white rounded-lg shadow-md"
        enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name"
                class="block text-sm font-medium text-gray-700 text-start">@lang('messages.laptop_name')</label>
            <input type="text" name="name" id="name" class="w-full p-2 mt-1 border border-gray-300 rounded">

            @error('name')
                <p class="mt-1 text-sm text-red-500 text-start">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price"
                class="block text-sm font-medium text-gray-700 text-start">@lang('messages.laptop_price')</label>
            <input type="text" name="price" id="price" class="w-full p-2 mt-1 border border-gray-300 rounded">

            @error('price')
                <p class="mt-1 text-sm text-red-500 text-start">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description"
                class="block text-sm font-medium text-gray-700 text-start">@lang('messages.laptop_description')</label>
            <input type="text" name="description" id="description" class="w-full p-2 mt-1 border border-gray-300 rounded">

            @error('description')
                <p class="mt-1 text-sm text-red-500 text-start">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image"
                class="block text-sm font-medium text-gray-700 text-start">@lang('messages.laptop_image_upload')</label>
            <input type="file" name="image" id="image" class="w-full p-2 mt-1 border border-gray-300 rounded">

            @error('image')
                <p class="mt-1 text-sm text-red-500 text-start">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image_url"
                class="block text-sm font-medium text-gray-700 text-start">@lang('messages.laptop_image_url')</label>
            <input type="text" name="image_url" id="image_url" class="w-full p-2 mt-1 border border-gray-300 rounded">

            @error('image_url')
                <p class="mt-1 text-sm text-red-500 text-start">{{ $message }}</p>
            @enderror
        </div>



        <div class="flex justify-between mb-4">

            {{-- button d'ajouter --}}
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                <i class="mr-2 fas fa-plus-circle"></i> @lang('messages.add_laptop')
            </button>

            {{-- button de retour --}}
            <a href="{{ route('laptops.index') }}"
                class="px-4 py-2 text-white no-underline bg-gray-500 rounded hover:bg-gray-600">
                <i class="mr-2 fas fa-arrow-left"></i> @lang('messages.back_to_list')
            </a>


        </div>
    </form>
@endsection


{{-- code sans design --}}

{{--

@extends('layouts.laptop_layout')
Hérite de la mise en page définie dans layouts.laptop_layout

@section('title', __('messages.add_laptop'))
Définit le titre de la page en utilisant une clé de traduction

@section('content')
<h1>@lang('messages.add_laptop')</h1>
Affiche le titre de la page

<!-- Formulaire d'ajout d'un nouveau laptop -->
<form action="{{ route('laptops.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    Jeton CSRF pour sécuriser le formulaire contre les attaques CSRF

    <!-- Champ pour le nom du laptop -->
    <div>
        <label for="name">@lang('messages.laptop_name')</label>
        <input type="text" name="name" id="name">

        @error('name')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <!-- Champ pour le prix du laptop -->
    <div>
        <label for="price">@lang('messages.laptop_price')</label>
        <input type="text" name="price" id="price">

        @error('price')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <!-- Champ pour la description du laptop -->
    <div>
        <label for="description">@lang('messages.laptop_description')</label>
        <input type="text" name="description" id="description">

        @error('description')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <!-- Champ pour uploader une image -->
    <div>
        <label for="image">@lang('messages.laptop_image_upload')</label>
        <input type="file" name="image" id="image">

        @error('image')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <!-- Champ pour entrer une URL d'image -->
    <div>
        <label for="image_url">@lang('messages.laptop_image_url')</label>
        <input type="text" name="image_url" id="image_url">

        @error('image_url')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <!-- Bouton de soumission du formulaire -->
    <button type="submit">
        @lang('messages.add_laptop')
    </button>

    button de retour
    <a href="{{ route('laptops.index') }}">
        @lang('messages.back_to_list')
    </a>
</form>
@endsection

Fin de la section de contenu

--}}
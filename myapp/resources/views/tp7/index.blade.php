{{-- la liste des laptops --}}
@extends('layouts.laptop_layout')

@section('title', __('messages.laptops_list'))

@section('content')
    <h1 class="mb-6 text-3xl font-bold text-start">@lang('messages.laptops_list')</h1>


    {{-- Afficher le message de succès --}}
    @if (session('success'))
        <div class="p-4 mb-6 text-green-700 bg-green-100 border-l-4 border-green-500">
            {{ session('success') }}
        </div>
    @endif


    <!-- Lien vers le formulaire de création -->
    <a href="{{ route('laptops.create') }}" class="px-4 py-2 mb-4 text-white bg-blue-500 rounded hover:bg-blue-600">
        <i class="mr-2 fas fa-plus-circle"></i> @lang('messages.add_laptop')
    </a>

    <br />
    <br />

    <!-- Liste des laptops -->
    <div class="p-6 bg-white rounded-lg shadow-md">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-700 border-b-2 border-gray-300 text-start">
                        @lang('messages.laptop_id')
                    </th>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-700 border-b-2 border-gray-300 text-start">
                        @lang('messages.laptop_name')
                    </th>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-700 border-b-2 border-gray-300 text-start">
                        @lang('messages.laptop_price')
                    </th>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-700 border-b-2 border-gray-300 text-start">
                        @lang('messages.laptop_description')
                    </th>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-700 border-b-2 border-gray-300 text-start">
                        @lang('messages.laptop_image')
                    </th>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-700 border-b-2 border-gray-300 text-start">
                        @lang('messages.actions')
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($laptops as $index => $laptop)
                    <tr class="hover:bg-gray-50">

                        {{-- Si @foreach($laptops as $laptop) --}}
                        {{-- <td class="px-6 py-4 border-b border-gray-300">{{ $laptop->id }}</td> --}}

                        <td class="px-6 py-4 border-b border-gray-300">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $laptop->name }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $laptop->price }} @lang('messages.type_price')</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $laptop->description }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">
                            @if($laptop->image)
                                <div class="flex justify-center">
                                    @if(filter_var($laptop->image, FILTER_VALIDATE_URL))
                                        <img src="{{ $laptop->image }}" alt="{{ $laptop->name }}"
                                            class="object-cover w-32 h-24 transition-shadow duration-300 border border-gray-200 rounded-lg shadow-md hover:shadow-lg">
                                    @else
                                        <img src="{{ asset('storage/' . $laptop->image) }}" alt="{{ $laptop->name }}"
                                            class="object-cover w-32 h-24 transition-shadow duration-300 border border-gray-200 rounded-lg shadow-md hover:shadow-lg">
                                    @endif
                                </div>
                            @else
                                <span class="text-gray-500">No Image</span>
                            @endif
                        </td>


                        <td class="px-6 py-4 border-b border-gray-300">
                            <div class="flex items-center space-x-4">


                                {{-- Bouton de modification --}}
                                <a href="{{ route('laptops.edit', $laptop->id) }}" class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-edit"></i> @lang('messages.edit')
                                </a>

                                {{-- Bouton de détails --}}
                                <a href="{{ route('laptops.show', $laptop->id) }}" class="text-green-500 hover:text-green-700">
                                    <i class="fas fa-eye"></i> @lang('messages.details')
                                </a>

                                {{-- Bouton de suppression --}}
                                <form action="{{ route('laptops.destroy', $laptop->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash-alt"></i> @lang('messages.delete')
                                    </button>
                                </form>


                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection



{{-- code sans design --}}

{{--
@extends('layouts.laptop_layout')
Hérite de la mise en page définie dans layouts.laptop_layout

@section('title', __('messages.laptops_list'))
Définit le titre de la page en utilisant une clé de traduction

@section('content')
<h1>@lang('messages.laptops_list')</h1>
Titre de la page, traduit selon la langue choisie

<!-- Lien vers le formulaire de création d'un nouveau laptop -->
<a href="{{ route('laptops.create') }}">
    @lang('messages.add_laptop')
</a>

<br><br>

<!-- Liste des laptops -->
<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                Colonne pour l'ID du laptop

                <th>@lang('messages.laptop_name')</th>
                Colonne pour le nom du laptop

                <th>@lang('messages.laptop_price')</th>
                Colonne pour le prix

                <th>@lang('messages.laptop_description')</th>
                Colonne pour la description

                <th>@lang('messages.laptop_image')</th>
                Colonne pour afficher l'image

                <th>@lang('messages.actions')</th>
                Colonne pour les actions (modifier, supprimer)
            </tr>
        </thead>
        <tbody>
            @foreach($laptops as $laptop)
            Boucle sur tous les laptops disponibles
            <tr>
                <td>{{ $laptop->id }}</td>
                Affiche l'ID du laptop

                <td>{{ $laptop->name }}</td>
                Affiche le nom du laptop

                <td>{{ $laptop->price }} @lang('messages.type_price')</td>
                Affiche le prix du laptop avec l'unité monétaire

                <td>{{ $laptop->description }}</td>
                Affiche la description du laptop

                <td>
                    @if($laptop->image)
                    Vérifie si une image est disponible

                    @if(filter_var($laptop->image, FILTER_VALIDATE_URL))
                    Vérifie si l'image est une URL valide

                    <img src="{{ $laptop->image }}" alt="{{ $laptop->name }}">
                    Affiche l'image depuis une URL
                    @else
                    <img src="{{ asset('storage/' . $laptop->image) }}" alt="{{ $laptop->name }}">
                    Affiche l'image stockée localement
                    @endif
                    @else
                    <span>No Image</span>
                    Message si aucune image n'est disponible
                    @endif
                </td>

                <td>
                    <!-- Lien vers la page d'édition du laptop -->
                    <a href="{{ route('laptops.edit', $laptop->id) }}">
                        @lang('messages.edit')
                    </a>

                    <!-- Formulaire de suppression du laptop -->
                    <form action="{{ route('laptops.destroy', $laptop->id) }}" method="POST"
                        onsubmit="return confirm('@lang('messages.confirm_delete')');">
                        @csrf
                        Jeton de sécurité pour éviter les attaques CSRF

                        @method('DELETE')
                        Spécifie que la requête est une suppression

                        <button type="submit">@lang('messages.delete')</button>
                        Bouton pour supprimer le laptop
                    </form>
                </td>
            </tr>
            @endforeach
            Fin de la boucle
        </tbody>
    </table>
</div>
@endsection
Fin de la section du contenu

--}}
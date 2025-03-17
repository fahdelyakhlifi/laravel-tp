@extends('layouts.laptop_layout')

@section('title', __('messages.laptop_details'))

@section('content')
    <div class="container px-4 py-8 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-center text-gray-800">@lang('messages.laptop_details')</h1>

        @if ($laptops)
            <div class="max-w-lg p-6 mx-auto bg-white rounded-lg shadow-lg">
                <ul class="space-y-4">
                    <li>
                        <strong class="text-gray-700">@lang('messages.laptop_id') :</strong>
                        <span class="text-gray-600">{{ $laptops->id }}</span>
                    </li>
                    <li>
                        <strong class="text-gray-700">@lang('messages.laptop_name') :</strong>
                        <span class="text-gray-600">{{ $laptops->name }}</span>
                    </li>
                    <li>
                        <strong class="text-gray-700">@lang('messages.laptop_description') :</strong>
                        <span class="text-gray-600">{{ $laptops->description }}</span>
                    </li>
                    <li>
                        <strong class="text-gray-700">@lang('messages.laptop_price') :</strong>
                        <span class="text-gray-600">{{ $laptops->price }} @lang('messages.type_price')</span>
                    </li>
                    <li>
                        <strong class="text-gray-700">@lang('messages.laptop_image') :</strong>
                        <div class="mt-2">
                            @if($laptops->image)
                                @if(filter_var($laptops->image, FILTER_VALIDATE_URL))
                                    <img src="{{ $laptops->image }}" alt="{{ $laptops->name }}"
                                        class="object-cover w-32 h-24 transition-shadow duration-300 border border-gray-200 rounded-lg shadow-md hover:shadow-lg">
                                @else
                                    <img src="{{ asset('storage/' . $laptops->image) }}" alt="{{ $laptops->name }}"
                                        class="object-cover w-32 h-24 transition-shadow duration-300 border border-gray-200 rounded-lg shadow-md hover:shadow-lg">
                                @endif
                            @else
                                <span class="text-gray-500">@lang('messages.no_image')</span>
                            @endif
                        </div>
                    </li>
                </ul>

                {{-- Bouton de retour --}}
                <div class="flex justify-center mt-6">
                    <a href="{{ route('laptops.index') }}"
                        class="px-4 py-2 text-white no-underline transition duration-300 ease-in-out bg-gray-500 rounded hover:bg-gray-600">
                        <i class="mr-2 fas fa-arrow-left"></i> @lang('messages.back_to_list')
                    </a>
                </div>
            </div>
        @else
            {{-- Message d'erreur si aucun ordinateur portable n'est trouvé --}}
            <div class="max-w-lg p-6 mx-auto bg-red-100 border border-red-400 rounded-lg">
                <strong class="text-red-700">@lang('messages.no_laptop_found')</strong>
            </div>

            {{-- Bouton de retour --}}
            <div class="flex justify-center mt-6">
                <a href="{{ route('laptops.index') }}"
                    class="px-4 py-2 text-white no-underline transition duration-300 bg-gray-500 rounded hover:bg-gray-600">
                    <i class="mr-2 fas fa-arrow-left"></i> @lang('messages.back_to_list')
                </a>
            </div>
        @endif
    </div>
@endsection








{{-- code sans design --}}
{{--


@extends('layouts.laptop_layout')
Hérite de la mise en page définie dans layouts.laptop_layout

@section('title', __('messages.laptop_details'))
Définit le titre de la page en utilisant une clé de traduction

@section('content')
<div>
    <h1>@lang('messages.laptop_details')</h1>
    Affiche le titre de la page

    @if ($laptops)
    Vérifie si un laptop est disponible
    <div>
        <ul>
            <li><strong>@lang('messages.laptop_id') :</strong> {{ $laptops->id }}</li>
            Affiche l'ID du laptop

            <li><strong>@lang('messages.laptop_name') :</strong> {{ $laptops->name }}</li>
            Affiche le nom du laptop

            <li><strong>@lang('messages.laptop_description') :</strong> {{ $laptops->description }}</li>
            Affiche la description du laptop

            <li><strong>@lang('messages.laptop_price') :</strong> {{ $laptops->price }} @lang('messages.type_price')
            </li>
            Affiche le prix du laptop avec l'unité monétaire

            <li><strong>@lang('messages.laptop_image') :</strong>
                Vérifie si une image est disponible
                @if($laptops->image)

                @if(filter_var($laptops->image, FILTER_VALIDATE_URL))
                Vérifie si l'image est une URL valide

                <img src="{{ $laptops->image }}" alt="{{ $laptops->name }}">
                Affiche l'image depuis une URL
                @else

                <img src="{{ asset('storage/' . $laptops->image) }}" alt="{{ $laptops->name }}">
                Affiche l'image stockée localement
                @endif
                @else

                <span>No Image</span>
                Message si aucune image n'est disponible
                @endif
            </li>
        </ul>
    </div>
    @else
    Si aucun laptop n'est trouvé, affiche un message
    <div>
        <strong>@lang('messages.no_laptop_found')</strong>
    </div>
    @endif
</div>
@endsection
Fin de la section du contenu

--}}
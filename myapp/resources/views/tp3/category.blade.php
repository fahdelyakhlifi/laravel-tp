@extends('layouts.layout')

@section('content')
    <div class="max-w-4xl p-6 mx-auto mt-6 bg-white rounded-lg shadow-lg">
        <h2 class="mb-4 text-2xl font-bold text-center text-gray-900">Détails des Catégories</h2>


        {{-- * isset() vérifie si une variable existe et n'est pas null,
        * évitant ainsi les erreurs d'accès à des variables non définies --}}


        @if(isset($category)) {{-- Si une catégorie unique est recherchée --}}
            <table class="w-full border border-collapse border-gray-300">
                <thead class="text-white bg-gray-900">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300">ID</th>
                        <th class="px-4 py-2 border border-gray-300">Nom</th>
                        <th class="px-4 py-2 border border-gray-300">Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td class="px-4 py-2 border border-gray-300">{{ $category->id }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $category->name }}</td>
                        <td class="px-4 py-2 font-bold border border-gray-300 text-slate-700">{{ $category->prix }} DH</td>
                    </tr>
                </tbody>
            </table>

        @elseif(isset($categories) && $categories->count() > 0)  {{-- Si toutes les catégories sont affichées --}}
            <table class="w-full border border-collapse border-gray-300">
                <thead class="text-white bg-gray-900">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300">ID</th>
                        <th class="px-4 py-2 border border-gray-300">Nom</th>
                        <th class="px-4 py-2 border border-gray-300">Prix</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $cat)
                        <tr class="text-center">
                            <td class="px-4 py-2 border border-gray-300">{{ $cat->id }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $cat->name }}</td>
                            <td class="px-4 py-2 font-bold border border-gray-300 text-slate-700">{{ $cat->prix }} DH</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <p class="mt-4 text-lg font-semibold text-center text-red-500">
                Désolé, aucun produit trouvé avec le nom :
                <strong class="text-red-700">{{ $nom ?? 'inconnu' }}</strong>
            </p>
        @endif
    </div>
@endsection
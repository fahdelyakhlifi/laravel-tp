@extends('layouts.app')

@section('content')
    <div class="container p-6 mx-auto">
        <h1 class="mb-6 text-2xl font-bold text-center">Produits de la Marque: {{ $marque->name }}</h1>

        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="w-full border-collapse table-auto">
                <thead>
                    <tr class="text-sm leading-normal text-gray-700 uppercase bg-gray-200">
                        <th class="px-6 py-3 text-left">Titre</th>
                        <th class="px-6 py-3 text-left">Description</th>
                        <th class="px-6 py-3 text-left">Prix</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm font-light text-gray-600">
                    @foreach ($products as $product)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="px-6 py-3">{{ $product->title }}</td>
                            <td class="px-6 py-3">{{ $product->description }}</td>
                            <td class="px-6 py-3 font-semibold">{{ $product->newPrice }} dh</td>
                            <td class="flex justify-center px-6 py-3 space-x-4 text-center">
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="text-blue-500 hover:underline">Modifier</a>
                                <a href="{{ route('products.show', $product->id) }}"
                                    class="text-green-500 hover:underline">Détails</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-6">
            {{ $products->links() }}
        </div>
    </div>
@endsection





{{-- code sans design --}}
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Produits de la Marque: {{ $marque->name }}</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->newPrice }} dh</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}">Modifier</a>
                    <a href="{{ route('products.show', $product->id) }}">Détails</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div>
        {{ $products->links() }}
    </div>
</div>
@endsection --}}
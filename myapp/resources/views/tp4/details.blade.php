@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Détails du Produit</h1>

        @if ($product)
            <div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
                <ul>
                    <li class="mb-2"><strong>ID :</strong> {{ $product->id }}</li>
                    <li class="mb-2"><strong>Nom :</strong> {{ $product->title }}</li>
                    <li class="mb-2"><strong>Prix :</strong> {{ $product->price }} dh</li>
                    <li class="mb-2"><strong>Description :</strong> {{ $product->description }}</li>
                </ul>
            </div>
        @else
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative max-w-lg mx-auto" role="alert">
                <strong>Aucun produit trouvé</strong>
            </div>
        @endif
    </div>
@endsection
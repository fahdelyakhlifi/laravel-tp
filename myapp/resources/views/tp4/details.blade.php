@extends('layouts.app')

@section('content')
    <div class="container px-4 py-8 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-center">Détails du Produit</h1>

        @if ($product)
            <div class="max-w-lg p-6 mx-auto bg-white rounded-lg shadow-md">
                <ul>
                    <li class="mb-2"><strong>ID :</strong> {{ $product->id }}</li>
                    <li class="mb-2"><strong>Nom :</strong> {{ $product->title }}</li>
                    <li class="mb-2"><strong>Prix :</strong> {{ $product->price }} dh</li>
                    <li class="mb-2"><strong>Description :</strong> {{ $product->description }}</li>
                </ul>
            </div>
        @else
            <div class="relative max-w-lg px-4 py-3 mx-auto text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                <strong>Aucun produit trouvé</strong>
            </div>
        @endif
    </div>
@endsection
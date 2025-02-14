@extends('layouts.layout')

@section('title', 'Détails du Produit')

@section('content')
    <div class="card">
        <h1>Détails du Produit</h1>

        @if ($product)
            <ul>
                <li>ID : {{ $product->id }}</li>
                <li>Nom : {{ $product->title }}</li>
                <li>Prix : {{ $product->price }} dh</li>
                <li>Description : {{ $product->description }}</li>
            </ul>
        @else
            <div class="alert alert-error">Aucun produit trouvé</div>
        @endif
    </div>
@endsection
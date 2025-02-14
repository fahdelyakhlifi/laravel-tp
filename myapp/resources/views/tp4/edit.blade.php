@extends('layouts.layout')

@section('title', 'Modifier le Produit')

@section('content')
    <div class="card">
        <h1>Modifier le produit {{ $product->title }}</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Titre :</label>
            <input type="text" name="title" value="{{ $product->title }}" required>

            <label>Prix :</label>
            <input type="number" name="price" value="{{ $product->price }}" required>

            <label>Description :</label>
            <textarea name="description">{{ $product->description }}</textarea>

            <label>Discount :</label>
            <input type="number" name="discount" value="{{ $product->discount }}">

            <input type="submit" value="Enregistrer">
        </form>
    </div>
@endsection
@extends('layouts.layout')

@section('title', 'Ajouter un Produit')

@section('content')
    <div class="card">
        <h1>Ajouter un Nouveau Produit</h1>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <label>Titre :</label>
            <input type="text" name="title" required>

            <label>Prix :</label>
            <input type="number" step="0.01" name="price" required>

            <label>Description :</label>
            <textarea name="description"></textarea>

            <label>Discount :</label>
            <input type="number" step="0.01" name="discount">

            <input type="submit" value="Envoyer">
        </form>
    </div>
@endsection
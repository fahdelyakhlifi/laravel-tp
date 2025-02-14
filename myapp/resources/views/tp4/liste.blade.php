@extends('layouts.layout')

@section('title', 'Liste des Produits')

@section('content')
    <div class="card">
        <h1>Liste des Produits</h1>
        <a href="{{ route('products.create') }}" class="button">Nouveau produit</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $pr)
                    <tr>
                        <td>{{ $pr->id }}</td>
                        <td>{{ $pr->title }} {!! $pr->discountSpan !!}</td>
                        <td>{{ $pr->newPrice }} dh
                            @if ($pr->discount > 0)
                                <span style="text-decoration: line-through">{{ $pr->price }} dh</span>
                            @endif
                        </td>
                        <td>{{ $pr->description }}</td>
                        <td class="actions">
                            <a href="{{ route('products.edit', $pr->id) }}" class="button">Modifier</a>
                            <a href="{{ route('products.show', $pr->id) }}" class="button">Détails</a>
                            <form action="{{ route('products.destroy', $pr->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Supprimer" class="button">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

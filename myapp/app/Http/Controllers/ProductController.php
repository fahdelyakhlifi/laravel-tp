<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    //* Afficher tous les produits
    public function index()
    {
        $products = Product::all();
        return view('tp4.liste', compact('products'));
    }

    //* Formulaire d'ajout
    public function create()
    {
        return view('tp4.formulaire');
    }

    //* Enregistrer un produit
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'nullable',
            'discount' => 'nullable',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès');
    }

    //* Détails d'un produit
    public function show(Product $product)
    {
        return view('tp4.details', compact('product'));
    }

    //* Formulaire d'édition
    public function edit(Product $product)
    {
        return view('tp4.edit', compact('product'));
    }

    //* Mise à jour d'un produit
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'nullable',
            'discount' => 'nullable',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Produit mis à jour');
    }

    //* Suppression d'un produit
    public function destroy(Product $product)
    {
        $product->delete();

        // Réinitialiser l'auto-incrémentation
        DB::statement("ALTER TABLE products AUTO_INCREMENT = 1");


        return redirect()->route('products.index')->with('success', 'Produit supprimé');
    }
}
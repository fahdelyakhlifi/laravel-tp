<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\search;

class ProductController extends Controller
{
    //* Afficher tous les produits
    public function index(Request $request)
    {
        //*Recuperer la requete de Recherche
        $search = $request->input('search');

        //*Recuperer l'option de tri par prix
        $sort = $request->input('sort');

        //*Commencer la requete
        $query = Product::query();

        //La logique de filtre et tri
        // Appliquer la filtre par titre si une recherche est effectuee
        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        //Appliquer le tri par prix si une option est selectionne
        if ($sort) {
            if ($sort == 'min') {
                $query->orderBy('price', 'asc');
            } elseif ($sort == 'max') {
                $query->orderBy('price', 'desc');
            }
        }






        //$products = Product::all();

        // en normal avant le filtre et la recherche
        //$products = Product::paginate(10); // 10 produits par page

        $products = $query->paginate(10);
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
   /* public function search(Request $req)


    {
        $html = view("tp4.liste" ,compact(''))->render();
        return response()->json([
            'status' => true,
            'html' => $html,


        ]);

    }*/
}

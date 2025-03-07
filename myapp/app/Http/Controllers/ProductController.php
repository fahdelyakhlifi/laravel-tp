<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    /**
     * Afficher tous les produits avec options de recherche et de tri.
     */
    public function index(Request $request)
    {
        $text = $request->input('search');
        $min = $request->input('min');
        $max = $request->input('max');
        $sort = $request->input('sort');

        if ($text || $min || $max || $sort) {
            // Récupérer tous les produits et appliquer les filtres avant paginate()
            $products = Product::where('title', 'like', "%$text%");

            if ($min != null) {
                $products = $products->where('price', '>=', $min);
            }
            if ($max != null) {
                $products = $products->where('price', '<=', $max);
            }
            if ($sort) {
                $products = $products->orderBy('price', $sort === 'min' ? 'asc' : 'desc');
            }

            // Paginer après l'application des filtres
            $products = $products->paginate(10);
        } else {
            // Si aucun filtre n'est appliqué, paginer directement tous les produits
            $products = Product::paginate(10);
        }

        return view('tp4.liste', compact('products'));




        /*
                - Récupération des paramètres de recherche et de tri
                $search = $request->input('search');
                $sort = $request->input('sort');

                - Construction de la requête
                $query = Product::query();

                - Appliquer le filtre par titre si une recherche est effectuée
                if ($search) {
                    $query->where('title', 'like', '%' . $search . '%');
                }

                - Appliquer le tri par prix si une option est sélectionnée
                if ($sort) {
                    $query->orderBy('price', $sort === 'min' ? 'asc' : 'desc');
                }

                - Pagination des résultats
                $products = $query->paginate(10);
                return view('tp4.liste', compact('products'));
            }
        */

    }
    /**
     * Afficher le formulaire d'ajout d'un produit.
     */
    public function create()
    {
        return view('tp4.formulaire');
    }

    /**
     * Enregistrer un nouveau produit dans la base de données.
     */
    public function store(ProductRequest $request)
    {
        // Création du produit
        Product::create($request->validated());
        return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès');
    }

    /**
     * Afficher les détails d'un produit spécifique.
     */
    public function show(Product $product)
    {
        return view('tp4.details', compact('product'));
    }

    /**
     * Afficher le formulaire d'édition d'un produit.
     */
    public function edit(Product $product)
    {
        return view('tp4.edit', compact('product'));
    }

    /**
     * Mettre à jour un produit existant.
     */
    public function update(ProductRequest $request, Product $product)
    {
        // Mise à jour du produit
        $product->update($request->validated());
        return redirect()->route('products.edit', $product)->with('success', 'Produit mis à jour');
    }

    /**
     * Supprimer un produit de la base de données.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        // Réinitialiser l'auto-incrémentation
        DB::statement("ALTER TABLE products AUTO_INCREMENT = 1");

        return redirect()->route('products.index')->with('success', 'Produit supprimé');
    }
}
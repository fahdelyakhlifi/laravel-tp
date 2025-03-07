<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductAjaxController extends Controller
{
    /**
     * Gérer la recherche, le filtrage et le tri via Ajax.
     */
    public function searchAndSort(Request $request)
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

        /* -------------------------------------------------------------------------- */
        /*                                    Ajax                                    */
        /* -------------------------------------------------------------------------- */

        // Rendre la vue partielle et retourner le HTML
        $html = view('tp4.table', compact('products'))->render();
        return response()->json(['html' => $html]);
    }
}
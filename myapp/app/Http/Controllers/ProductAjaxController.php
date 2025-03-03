<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductAjaxController extends Controller
{
    /**
     * Gérer la recherche et le tri via Ajax.
     */
    public function searchAndSort(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');

        $query = Product::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        if ($sort) {
            $query->orderBy('price', $sort === 'min' ? 'asc' : 'desc');
        }

        $products = $query->get();

        $html = view('tp4.table', compact('products'))->render();
        return response()->json(['html' => $html]);
    }
}
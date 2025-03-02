<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;


class PagesController extends Controller
{

    /* -------------------------------------------------------------------------- */
    /*                                     tp1                                    */
    /* -------------------------------------------------------------------------- */
    function AfficherUsers()
    {
        //User hiya name dyal Model User li create
        $users = User::all();
        return view('tp1.user', compact('users'));
    }


    /* -------------------------------------------------------------------------- */
    /*                                     tp2                                    */
    /* -------------------------------------------------------------------------- */
    function home()
    {
        return view('tp2.home');
    }
    function forum()
    {
        return view('tp2.forum');
    }
    function contact_us()
    {
        return view('tp2.contact-us');
    }



    /* -------------------------------------------------------------------------- */
    /*                                     tp3                                    */
    /* -------------------------------------------------------------------------- */
    function Rechercher($nom)
    {
        $category = Category::where('name', '=', $nom)->first();
        return view('tp3.category', compact('category', 'nom'));
    }


    //pour afficher tous les categories disponible de base de donne 
    function AfficherCategories()
    {
        $categories = Category::all(); // Récupère toutes les catégories
        return view('tp3.category', compact('categories'));
    }


    /* -------------------------------------------------------------------------- */
    /*                                     tp4                                    */
    /* -------------------------------------------------------------------------- */
    function liste()
    {
        $produits = Product::all();
        return view('tp4.liste', compact('produits'));
    }

    function formulaire()
    {
        return view('tp4.formulaire');
    }

    function inserer(Request $re)
    {
        //dd($re->all());
        $nom = $re->get('nn');
        $prix = $re->input('pp');
        $resulta = Product::create([
            "name" => $nom,
            "prix" => $prix
        ]);
        return redirect('/produit');
    }

    function modifier($id)
    {
        $p = Product::find($id);
        return view('tp4.edit', compact('p'));
    }

    function enregister(Request $r)
    {
        $n = $r->get("nn");
        $prix = $r->get("pp");
        $id = $r->get("ii");

        $product = Product::find($id);
        $product->update([
            "name" => $n,
            "prix" => $prix
        ]);
        return redirect('/produit')->with('success', 'le produit <b>' . $product->name . '</b> a ete modifier ');
    }

    function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/produit')->with('success', 'le produit <b>' . $product->name . '</b> a ete supprimer ');
    }
}
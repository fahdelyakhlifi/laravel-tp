<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;

class PagesController extends Controller
{
    function home()
    {

        return view('tp1/home');
    }
    function forum()
    {
        return view('tp1/forum');
    }

    function contact_us()
    {
        return view('tp1/contact-us');
    }

    function abs()
    {
        //User hiya name dyal Model User li create
        $users = User::all();
        return view('ex1', compact('users'));
    }

    function affichier($n)
    {

        $p = Product::where('name', '=', $n)->first();
        return view('tp3/produit', compact('p', 'n'));
    }

    function liste()
    {
        $produits = Product::all();
        return view('/tp4/liste', compact('produits'));
    }


    //tp4
    function formulaire()
    {

        return view('tp4/formulaire');
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
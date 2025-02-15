<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class MarquesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $recherche = $req->input('search');
        if ($recherche) {
            $marqs = Marque::where("name", "like", "%$recherche%")->paginate(10);
        } else {
            $marqs = Marque::paginate(10);
        }
        //$marqs = Marque::orderBy('id', 'asc')->paginate(20); // Tri par ID croissant
        return view("tp5.index", compact('marqs'));



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tp5.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nn" => "required|string|unique:marques,name",
            "desc" => "nullable|string"
        ]);

        Marque::create([
            "name" => $request->nn,
            "description" => $request->desc
        ]);

        return redirect()->route('marque.index')->with('success', 'Marque créée avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Marque $marque)
    {
        return view('tp5.show', compact('marque'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marque $marque)
    {
        return view('tp5.edit', compact('marque'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marque $marque)
    {
        $request->validate([
            "nn" => "required|string|unique:marques,name," . $marque->id,
            "desc" => "nullable|string"
        ]);

        $marque->update([
            "name" => $request->nn,
            "description" => $request->desc
        ]);

        return redirect()->route('marque.index')->with('success', 'Marque mise à jour.');

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $marque = Marque::find($id);
        $marque->delete();

        return redirect('/marque')->with('success', 'Marque deleted successfully!');
    }
}
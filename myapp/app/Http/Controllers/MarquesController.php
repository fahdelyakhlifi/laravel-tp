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
    public function index()
    {
        //$marqs = Marque::all();
        $marqs = Marque::paginate(20);
        return view("tp5.index",compact('marqs'));

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
        $nom = $request->get('nn');
        $desc = $request->get('dd');


        Marque::create([
            "name" => $nom,
            "desc" => $desc,

        ]);

        return redirect("/marque");
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $marqs = Marque::find($id);

        if ($marqs == null) return redirect('/marque');

        return view("tp5.edit", compact('marqs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $nom = $request->get('nn');
        $desc = $request->get('desc');
        $id = $request->get('ii');

        $marqs = Marque::find($id);
        $marqs->update([
            "name" => $nom,
            "desc" => $desc,
        ]);

        return redirect("tp5.index ");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $marqs = Marque::find($id);
        if ($marqs == null)
        return "aucun marque";

        $marqs->delete();

        return redirect("/marque");
    }
}

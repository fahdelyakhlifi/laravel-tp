<?php

namespace App\Http\Controllers;

use App\Models\Laptops;
use Illuminate\Http\Request;


class LaptopsController extends Controller
{
    /**
     * Afficher une liste de la ressource.
     */
    public function index()
    {
        // $laptops = Laptops::all();

        // $laptops = Laptops::orderBy('id', 'asc')->get();

        $search = request()->input('search');
        $min = request()->input('min');
        $max = request()->input('max');

        if ($search || $min || $max) {
            $laptops = Laptops::where('name', 'like', "%$search%");

            if ($min != null) {
                $laptops = $laptops->where('price', '>=', $min);
            }
            if ($max != null) {
                $laptops = $laptops->where('price', '<=', $max);
            }

            $laptops = $laptops->paginate(10);
        } else {
            $laptops = Laptops::paginate(10);
        }

        return view('tp7.index', compact('laptops'));
    }

    /**
     * Afficher le formulaire de création d’une nouvelle ressource.
     */
    public function create()
    {
        return view('tp7.create');
    }

    /**
     * Stocker une ressource nouvellement créée dans le stockage.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation pour l'image téléchargée
            'image_url' => 'nullable|url',                                   // Validation pour l'URL de l'image
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } elseif ($request->has('image_url')) {
            $imagePath = $request->input('image_url');
        }


        Laptops::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,                                           // Sauvegarder le chemin local de l'image
        ]);

        /*

            - Creer un nouveau laptop
            Laptops::create($request->all());

         */

        return redirect()->route('laptops.create')->with('success', __('messages.laptop_added_success'));
    }

    /**
     * Afficher la ressource spécifiée.
     */
    public function show($id)
    {
        /*
            $laptops = Laptops::find($id);
            if (!$laptops) {
                return redirect()->route('laptops.index')->with('error', 'Laptop non trouvé.');
            }
            return view('tp7.show', compact('laptops'));
        */

        $laptops = Laptops::findOrFail($id);

        return view('tp7.show', compact('laptops'));
    }

    /**
     * Afficher le formulaire pour modifier la ressource spécifiée.
     */
    public function edit(string $id)
    {
        $laptops = Laptops::findOrFail($id);

        return view('tp7.edit', compact('laptops'));
    }

    /**
     * Mettre à jour la ressource spécifiée dans le stockage.
     */
    public function update(Request $request, string $id)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation pour l'image téléchargée
            'image_url' => 'nullable|url',                                   // Validation pour l'URL de l'image
        ]);


        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } elseif ($request->has('image_url')) {
            $imagePath = $request->input('image_url');
        }


        // Récupérer le laptop à modifier
        $laptops = Laptops::findOrFail($id);


        /* 
            - Mettre à jour les informations du laptop methode 1
            $laptops->update($request->all());
        */

        // Mettre à jour les informations du laptop methode 2
        $laptops->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,                           // Sauvegarder le chemin local de l'image
        ]);

        return redirect()->route('laptops.edit', $laptops->id)->with('success', __('messages.laptop_updated_success'));
    }

    /**
     * Supprimer la ressource spécifiée du stockage.
     */
    public function destroy(string $id)
    {
        /*
            Supprimer le laptop
            Laptops::destroy($id);
        */

        // Récupérer le laptop à supprimer
        $laptops = Laptops::findOrFail($id);

        // Supprimer le laptop
        $laptops->delete();

        // Rediriger vers la liste des laptops
        return redirect()->route('laptops.index')->with('success', __('messages.laptop_deleted_success'));
    }
}
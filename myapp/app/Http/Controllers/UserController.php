<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    public function create()
    {
        return view('tp7.create');
    }

    /* Apres utilisation de StoreUserRequest 'myapp\app\Http\Requests\StoreUserRequest.php' */
    public function store(StoreUserRequest $request)
    {

        Users::create($request->validated());


        return redirect('/user/create')->with('success', 'Utilisateur créé avec succès!');
    }

    /* {{     Avant (validation dans le contrôleur et non dans le fichier StoreUserRequest.php)    }}
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        Users::create($validated);

        return redirect('/user/create')->with('success', 'Utilisateur créé avec succès!');
    }
    */


    public function index()
    {
        $users = Users::all(); // Récupère tous les utilisateurs
        return view('tp7.index', compact('users'));
    }
}
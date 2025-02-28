<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    public function create()
    {
        return view('tp7.create');
    }

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

    public function index()
    {
        $users = Users::all(); // Récupère tous les utilisateurs
        return view('tp7.index', compact('users'));
    }
}
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="p-8 bg-white rounded-lg shadow-md w-96">
        <h1 class="mb-4 text-2xl font-bold text-center">Créer un utilisateur</h1>

        @if(session('success'))
            <p class="text-center text-green-500">{{ session('success') }}</p>
        @endif

        <form method="POST" action="/user/store" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700">Nom:</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-400">
                @error('name')                <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-700">Email:</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-400">
                @error('email')              <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-700">Mot de passe:</label>
                <input type="password" name="password"
                    class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-400">
                @error('password')              <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-between">
                <button type="submit"
                    class="px-4 py-2 text-white transition bg-blue-500 rounded-md hover:bg-blue-700">Créer</button>

                <!-- Bouton pour retourner à la liste des utilisateurs -->
                <a href="/users" class="px-4 py-2 text-white transition bg-gray-500 rounded-md hover:bg-gray-700">
                    Voir la liste
                </a>
            </div>
        </form>
    </div>
</body>





{{-- code sans design --}}
{{--

<body>
    <h1>Créer un utilisateur</h1>
    @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif
    <form method="POST" action="/user/store">
        @csrf
        <label>Nom:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Mot de passe:</label>
        <input type="password" name="password">
        @error('password') <p style="color: red;">{{ $message }}</p> @enderror

        <button type="submit">Créer</button>
    </form>
</body> --}}

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="_token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
</head>

<body class="flex flex-col min-h-screen text-gray-900 bg-gray-100">

    <nav class="p-4 shadow-lg bg-stone-950">
        <div class="container flex items-center justify-between mx-auto">
            <a href="/" class="text-lg font-bold text-white">MyApp</a>
            <ul class="flex space-x-4">
                <li><a href="/" class="text-white hover:underline">Accueil</a></li>
                <li><a href="#" class="text-white hover:underline">Catégories</a></li>
            </ul>
        </div>
    </nav>

    <div class="container flex-grow px-4 mx-auto mt-6">
        @yield('content')
    </div>

    <footer class="p-4 mt-auto text-center text-white bg-stone-800">
        &copy; {{ date('Y') }} MyApp - Tous droits réservés.
    </footer>

</body>

</html>

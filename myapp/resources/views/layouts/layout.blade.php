<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/assets/css/stylee.css">
</head>

<body>
    <!-- En-tête -->
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('products.index') }}">Accueil</a></li>
                <li><a href="{{ route('products.create') }}">Ajouter un produit</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>

    <!-- Pied de page -->
    <footer>
        <p>&copy; {{ date('Y') }} Formulaire Products </p>
    </footer>
</body>

</html>
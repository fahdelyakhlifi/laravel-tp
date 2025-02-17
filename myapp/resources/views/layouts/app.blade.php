<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <!-- Navbar -->
    <nav class="p-4 text-white bg-sky-700">
        <div class="container flex items-center justify-between mx-auto">
            <a href="{{ route('products.index') }}" class="text-xl font-bold">My App</a>
            <div>
                <a href="{{ route('products.index') }}" class="px-4 hover:text-gray-400">Products</a>
                <a href="{{ route('products.create') }}" class="px-4 hover:text-gray-400">Add Product</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container flex-1 p-4 mx-auto">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="p-4 mt-auto text-white bg-sky-700">
        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} My App. All rights reserved.
        </div>
    </footer>
</body>

</html>
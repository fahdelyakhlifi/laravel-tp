<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="bg-sky-700 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('products.index') }}" class="text-xl font-bold">My App</a>
            <div>
                <a href="{{ route('products.index') }}" class="px-4 hover:text-gray-400">Products</a>
                <a href="{{ route('products.create') }}" class="px-4 hover:text-gray-400">Add Product</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto p-4 flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-sky-700 p-4 text-white mt-auto">
        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} My App. All rights reserved.
        </div>
    </footer>
</body>

</html>
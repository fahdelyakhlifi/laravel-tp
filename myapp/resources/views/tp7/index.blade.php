<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-4xl p-6 bg-white rounded-lg shadow-md">
        <h2 class="mb-4 text-2xl font-bold text-center text-blue-600">Liste des utilisateurs</h2>

        <table class="w-full border border-collapse border-gray-300">
            <thead class="text-white bg-blue-500">
                <tr>
                    <th class="p-3 border border-gray-300">ID</th>
                    <th class="p-3 border border-gray-300">Nom</th>
                    <th class="p-3 border border-gray-300">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="transition hover:bg-gray-100">
                        <td class="p-3 text-center border border-gray-300">{{ $user->id }}</td>
                        <td class="p-3 text-center border border-gray-300">{{ $user->name }}</td>
                        <td class="p-3 text-center border border-gray-300">{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

{{-- code sans design --}}
{{--

<body>
    <h2>Liste des utilisateurs</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body> --}}
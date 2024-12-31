<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'My Application'</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav class="bg-gray-800 p-4">
        <ul class="flex justify-center space-x-4 text-white">
            <li><a href="/" class="hover:text-gray-400">Home</a></li> 
            <li><a href="/categories" class="hover:text-gray-400">Categories</a></li>
            <li><a href="/clients" class="hover:text-gray-400">Clients</a></li>
            <li><a href="/produits" class="hover:text-gray-400">Produits</a></li>
            <li><a href="/commandes" class="hover:text-gray-400">Commandes</a></li>
        </ul>
    </nav>
    <main>
        {{ $slot }}
    </main>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>

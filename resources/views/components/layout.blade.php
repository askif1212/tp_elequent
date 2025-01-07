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
<script>
    function deleteElement(id, route) {
        if (!confirm('Are you sure you want to delete this element?')) return;

        fetch(`/${route}/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById("deleteElement")
                        .closest('tr')
                        .remove();
                }
            })
            .catch(error => {
                alert('Error deleting product');
                console.error('Error:', error);
            });
    }
</script>

</html>

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
    <div class="fixed bottom-4 right-4">
        <button id="cartButton" class="bg-blue-500 text-white p-2 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.4 5M17 13l1.4 5M6 21h12M6 21a2 2 0 11-4 0M18 21a2 2 0 11-4 0" />
            </svg>
        </button>
        <div id="cartList" class="hidden bg-white shadow-lg rounded-lg p-4 mt-2">
            <h2 class="text-lg font-bold mb-2">Panier</h2>
            <ul id="cartItems"></ul>
        </div>
    </div>
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
    document.getElementById('cartButton').addEventListener('click', function() {
        const cartList = document.getElementById('cartList');
        cartList.classList.toggle('hidden');

        if (!cartList.classList.contains('hidden')) {
            fetch('/showCart')
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    const cartItems = document.getElementById('cartItems');
                    cartItems.innerHTML = '';

                    for (const id in data) {
                        const item = data[id];
                        const li = document.createElement('li');
                        li.textContent = `${item.nom} - Quantité: ${item.quantite} - Prix: ${item.prix}€`;
                        cartItems.appendChild(li);
                    }
                })
                .catch(error => console.error('Erreur:', error));
        }
    });
</script>

</html>

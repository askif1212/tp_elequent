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
            Panier
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
                        li.classList.add('flex', 'justify-between', 'items-center', 'mb-2');
                        li.innerHTML = `
                            <span>${item.nom} - Quantité: ${item.quantite} - Prix: ${item.prix}€</span>
                            <button class="delete-item bg-red-500 text-white p-1 rounded-full" data-id="${item.id}">
                                &#10005;
                            </button>
                        `;
                        cartItems.appendChild(li);
                    }

                    document.querySelectorAll('.delete-item').forEach(button => {
                        button.addEventListener('click', function() {
                            const itemId = this.getAttribute('data-id');
                            fetch(`/deleteFromCart/${itemId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').content,
                                        'Accept': 'application/json'
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        this.closest('li').remove();
                                    }
                                })
                                .catch(error => console.error('Erreur:', error));
                        });
                    });
                })
                .catch(error => console.error('Erreur:', error));
        }
    });
</script>

</html>

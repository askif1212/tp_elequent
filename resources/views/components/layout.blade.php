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
    <nav class="bg-gray-800 p-4 flex justify-center relative">
        <ul class="flex justify-center space-x-4 text-white flex-1">
            <li><a href="/" class="hover:text-gray-400">Home</a></li>
            <li><a href="/categories" class="hover:text-gray-400">Categories</a></li>
            <li><a href="/clients" class="hover:text-gray-400">Clients</a></li>
            <li><a href="/produits" class="hover:text-gray-400">Produits</a></li>
            <li><a href="/commandes" class="hover:text-gray-400">Commandes</a></li>
        </ul>
        <div class=" absolute right-4">
            <div class="relative">
                <div id="cartButton" class=" cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#fff">
                        <path
                            d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z" />
                    </svg>
                </div>
                <div class="p-2 border-slate-500 border w-fit min-h-6 rounded absolute top-[30%] right-[120%] hidden bg-slate-300 flex-col"
                    id="cartList">
                    <h3 class=" text-center font-semibold mb-3">Cart</h3>
                    <table class=" border border-slate-400 rounded-md w-full" id="cartTable">
                        <thead>
                            <tr>
                                <th class=" text-xs border border-slate-400"></th>
                                <th class=" text-xs border border-slate-400">Designation</th>
                                <th class=" text-xs border border-slate-400">Prix</th>
                                <th class=" text-xs border border-slate-400">Quantite</th>
                                <th class=" text-xs border border-slate-400">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </nav>
    <main>
        {{ $slot }}
    </main>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
<script>
    document.getElementById("cartButton").addEventListener("click", function() {
        const cartList = document.getElementById("cartList");
        cartList.classList.toggle('hidden');

        if (!cartList.classList.contains('hidden')) {
            fetch('/showCart')
                .then(response => response.json())
                .then(data => {
                    const cartTbody = document.querySelector('#cartTable tbody');
                    cartTbody.innerHTML = '';
                    for (const id in data) {
                        const tr = document.createElement('tr');
                        tr.setAttribute('data-id', id);
                        tr.classList.add("border-y", "border-slate-400");
                        const item = data[id];
                        const imageTd = document.createElement('td');
                        imageTd.classList.add('text-center');
                        imageTd.innerHTML = `
                             <div class=" w-[50px]">
                                        <img src="${item.image}" alt=""
                                            width="50px">
                            </div>
                        `;
                        const nameTd = document.createElement('td');
                        nameTd.classList.add('text-center');
                        nameTd.innerText = item.nom;
                        const priceTd = document.createElement('td');
                        priceTd.classList.add('text-center');
                        priceTd.innerText = item.prix;
                        const quantityTd = document.createElement('td');
                        quantityTd.classList.add('text-center');
                        quantityTd.innerText = item.quantite;
                        const deleteAction = document.createElement('td');
                        deleteAction.classList.add('text-center');
                        deleteAction.innerHTML = `
                            <div
                                class="bg-red-500 cursor-pointer rounded-full w-[calc(24px + 0.5rem)] h-[calc(24px + 0.5rem)] p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#fff">
                                    <path
                                        d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                </svg>
                            </div>
                        `;
                        deleteAction.addEventListener("click", (e) => {
                            e.preventDefault()
                            fetch("/deleteFromCart/" + item.id, {
                                    method: "DELETE",
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').content,
                                        'Accept': 'application/json'
                                    }
                                }).then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        document.querySelector(`tr[data-id="${item.id}"]`)
                                            .remove();
                                    }
                                }).catch(err => console.log(err))
                        })
                        tr.append(imageTd, nameTd, priceTd, quantityTd, deleteAction)
                        cartTbody.append(tr)
                    }
                })
                .catch(error => console.error('Erreur:', error));
        }
    });

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

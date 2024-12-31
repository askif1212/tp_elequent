<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Produits</h1>
        <a href="{{ route('produits.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create New produit</a>
        <br><br>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Price</th>
                    <th class="py-2 px-4 border-b">Stock</th>
                    <th class="py-2 px-4 border-b">Categorie ID</th>
                    <th class="py-2 px-4 border-b">Description</th>
                    <th class="py-2 px-4 border-b" colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $produit->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $produit->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $produit->price }}</td>
                        <td class="py-2 px-4 border-b">{{ $produit->stock }}</td>
                        <td class="py-2 px-4 border-b">{{ $produit->categorie_id }}</td>
                        <td class="py-2 px-4 border-b">{{ $produit->description }}</td>
                        <td class="py-2 px-4 border-b"><a href="{{ route('produits.show', ['id' => $produit->id]) }}" class="text-blue-500 hover:underline">Details</a></td>
                        <td class="py-2 px-4 border-b"><a href="{{ route('produits.edit', ['id' => $produit->id]) }}" class="text-yellow-500 hover:underline">Modifier</a></td>
                        <td class="py-2 px-4 border-b">
                            <button 
                                onclick="deleteProduit({{ $produit->id }})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"
                            >
                                Supprimer
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function deleteProduit(id) {
            if (!confirm('Are you sure you want to delete this product?')) return;

            fetch(`/produits/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector(`button[onclick="deleteProduit(${id})"]`)
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
</x-layout>

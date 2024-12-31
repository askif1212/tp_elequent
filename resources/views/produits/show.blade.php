<x-layout>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Details Produit</h1>
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b">ID</th>
                <th class="px-4 py-2 border-b">Name</th>
                <th class="px-4 py-2 border-b">Description</th>
                <th class="px-4 py-2 border-b">Price</th>
                <th class="px-4 py-2 border-b">Stock</th>
                <th class="px-4 py-2 border-b">Categorie ID</th>
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-4 py-2 border-b">{{ $produit->id }}</td>
                <td class="px-4 py-2 border-b">{{ $produit->name }}</td>
                <td class="px-4 py-2 border-b">{{ $produit->description }}</td>
                <td class="px-4 py-2 border-b">{{ $produit->price }}</td>
                <td class="px-4 py-2 border-b">{{ $produit->stock }}</td>
                <td class="px-4 py-2 border-b">{{ $produit->categorie_id }}</td>
                <td class="px-4 py-2 border-b">
                    <a href="{{ route('produits.edit', ['id' => $produit->id]) }}" class="text-blue-500 hover:underline">Modifier</a>
                    <form action="{{ route('produits.destroy', $produit->id) }}" method="post" class="inline-block ml-2">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="supprimer" class="text-red-500 hover:underline cursor-pointer">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</x-layout>
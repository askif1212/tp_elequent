<x-layout>
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-center">Détails du Produit</h1>
    <div class="flex justify-center mb-6">
        <img src="{{ asset('storage/' . $produit->image)}}" alt="No image" class="w-1/2 h-auto rounded-lg shadow-lg">
    </div>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Nom</th>
                    <th class="px-4 py-2 border-b">Description</th>
                    <th class="px-4 py-2 border-b">Prix</th>
                    <th class="px-4 py-2 border-b">Stock</th>
                    <th class="px-4 py-2 border-b">Catégorie ID</th>
                    <th class="px-4 py-2 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border-b text-center">{{ $produit->id }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $produit->name }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $produit->description }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $produit->price }} €</td>
                    <td class="px-4 py-2 border-b text-center">{{ $produit->stock }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $produit->categorie_id }}</td>
                    <td class="px-4 py-2 border-b text-center">
                        <a href="{{ route('produits.edit', ['id' => $produit->id]) }}" class="text-blue-500 hover:underline">Modifier</a>
                        <form action="{{ route('produits.destroy', $produit->id) }}" method="post" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Supprimer" class="text-red-500 hover:underline cursor-pointer">
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</x-layout>
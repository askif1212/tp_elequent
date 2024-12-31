<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Liste des categories</h1>
        @if (count($categories) == 0)
            <p class="text-gray-500">Aucune categorie</p>
        @else
            <p class="mb-4">Nombre des categories : {{ count($categories) }}</p>
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Description</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $item->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->description }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('categories.show', $item->id) }}" class="text-blue-500 hover:underline">Details</a>
                                <a href="{{ route('categories.edit', ['id' => $item->id]) }}" class="text-yellow-500 hover:underline ml-2">Modifier</a>
                                <button 
                                    onclick="deleteCategorie({{ $item->id }})"
                                    class="text-red-500 hover:underline ml-2 cursor-pointer"
                                >
                                    Supprimer
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script>
    function deleteCategorie(id) {
        if (!confirm('Are you sure you want to delete this category?')) return;

        fetch(`/categories/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelector(`button[onclick="deleteCategorie(${id})"]`)
                    .closest('tr')
                    .remove();
            }
        })
        .catch(error => {
            alert('Error deleting category');
            console.error('Error:', error);
        });
    }
    </script>
</x-layout>

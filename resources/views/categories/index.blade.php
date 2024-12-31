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
                                <form action="{{ route('categories.destroy', $item->id) }}" method="post" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Supprimer" class="text-red-500 hover:underline ml-2 cursor-pointer bg-transparent border-none p-0">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-layout>

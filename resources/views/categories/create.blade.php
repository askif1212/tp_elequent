<x-layout>
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h5 class="text-xl font-bold mb-4">Ajouter une nouvelle categorie:</h5>
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name:</label>
            <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description:</label>
            <textarea name="description" id="description" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        <input type="submit" value="Ajouter" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 cursor-pointer">
    </form>
</div>
</x-layout>

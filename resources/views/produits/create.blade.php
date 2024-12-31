<x-layout>
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-6">Add New Product</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produits.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Price:</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" required class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Stock:</label>
            <input type="number" name="stock" value="{{ old('stock') }}" required class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Category ID:</label>
            <input type="number" name="categorie_id" value="{{ old('categorie_id') }}" required class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Description:</label>
            <textarea name="description" required class="w-full p-2 border border-gray-300 rounded mt-1">{{ old('description') }}</textarea>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create</button>
            <a href="{{ route('produits.index') }}" class="text-blue-500 hover:underline">Back</a>
        </div>
    </form>
</div>
</x-layout>
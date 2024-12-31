<x-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1 class="text-2xl font-bold mb-6">Create Commande</h1>
        <form action="{{ route('commandes.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">Date:</label>
                <input type="date" name="date" id="date" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="client_id" class="block text-sm font-medium text-gray-700">Client ID:</label>
                <input type="text" name="client_id" id="client_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700">Create</button>
            </div>
        </form>
    </div>
</x-layout>

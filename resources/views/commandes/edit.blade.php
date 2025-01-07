<x-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">Something went wrong.</span>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h5 class="text-xl font-bold mb-4">Modifier la commande num {{ $commande->id }}:</h5>
        <form action="{{ route('commandes.update', $commande->id) }}" method="post" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">Date:</label>
                <input type="date" name="date" id="date" value="{{ old('date', $commande->date) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="client_id" class="block text-sm font-medium text-gray-700">Client ID:</label>
                <input type="number" name="client_id" id="client_id"
                    value="{{ old('client_id', $commande->client_id) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="Etat" class="block text-sm font-medium text-gray-700">Etat:</label>
                <select name="etat" id="etat" value="{{old('etat', $commande->etat)}}">
                    @foreach (['Recue', 'Livree', 'Retournee', 'Confirmee'] as $item)
                        <option @disabled($commande->etat === $item)>{{ $item }}</li>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="submit" value="Modifier"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            </div>
        </form>
    </div>
</x-layout>

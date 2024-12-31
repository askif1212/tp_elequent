<x-layout>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">{{ $commande->id }}</h1>
        <p class="mb-2">Date: {{ $commande->date }}</p>
        <p class="mb-2">Created at: {{ $commande->created_at }}</p>
        <p class="mb-2">Total: {{ $commande->total }}</p>
        <p class="mb-4">Client ID: {{ $commande->client_id }}</p>
        <div class="mb-4">
            <a href="{{ route('commandes.edit', $commande->id) }}" class="text-blue-500 hover:underline">Modifier</a>
        </div>
        <a href="{{ route('commandes.index') }}" class="text-blue-500 hover:underline">Back to Commandes</a>
    </div>
</x-layout>

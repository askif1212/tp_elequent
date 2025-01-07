<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Commandes</h1>
        <a href="{{ route('commandes.create') }}" class="text-blue-500 hover:underline">Create New Commande</a>
        <br>
        <div class="flex justify-center mb-4 ">
            <label for="category" class="mr-2">Filter par Etat:</label>
            <select class="border border-gray-300 rounded py-2 px-4" name="etat" id="etatFilter">
                <option value="all">All</option>
                @foreach (['Recue', 'Livree', 'Retournee', 'Confirmee'] as $etat)
                    <option value="{{ $etat }}">{{ $etat }}</option>
                @endforeach
            </select>
        </div>
        <table class="min-w-full bg-white border border-gray-200 mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Id</th>
                    <th class="px-4 py-2 border">Date</th>
                    <th class="px-4 py-2 border">Created at</th>
                    <th class="px-4 py-2 border">Total</th>
                    <th class="px-4 py-2 border">Client_id</th>
                    <th class="px-4 py-2 border">Etat</th>
                    <th class="px-4 py-2 border" colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commandes as $commande)
                    <tr>
                        <td class="px-4 py-2 border">{{ $commande->id }}</td>
                        <td class="px-4 py-2 border">{{ $commande->date }}</td>
                        <td class="px-4 py-2 border">{{ $commande->created_at }}</td>
                        <td class="px-4 py-2 border">{{ $commande->total == null ? 0 : $commande->total }}</td>
                        <td class="px-4 py-2 border">{{ $commande->client_id }}</td>
                        <td class="px-4 py-2 border">{{ $commande->etat }}</td>
                        <td class="px-4 py-2 border"><a href="{{ route('commandes.show', ['id' => $commande->id]) }}"
                                class="text-blue-500 hover:underline">Details</a></td>
                        <td class="px-4 py-2 border"><a href="{{ route('commandes.edit', ['id' => $commande->id]) }}"
                                class="text-blue-500 hover:underline">Modifier</a></td>
                        <td class="px-4 py-2 border">
                            <button onclick="deleteElement({{ $commande->id }},'commandes')"
                                class="text-red-500 hover:underline cursor-pointer" id="deleteElement">
                                supprimer
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>

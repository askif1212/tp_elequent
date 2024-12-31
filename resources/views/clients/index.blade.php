<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Clients</h1>
        <a href="{{ route('clients.create') }}" class="text-blue-500 hover:underline mb-4 inline-block">Create New Client</a>
        <br>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">First Name</th>
                    <th class="py-2 px-4 border-b">Last Name</th>
                    <th class="py-2 px-4 border-b">Phone</th>
                    <th class="py-2 px-4 border-b">City</th>
                    <th class="py-2 px-4 border-b">Birthday</th>
                    <th class="py-2 px-4 border-b" colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td class="py-2 px-4 border-b">{{$client->firstName}}</td>
                    <td class="py-2 px-4 border-b">{{$client->lastName}}</td>
                    <td class="py-2 px-4 border-b">{{$client->phone}}</td>
                    <td class="py-2 px-4 border-b">{{$client->city}}</td>
                    <td class="py-2 px-4 border-b">{{$client->birthDay}}</td>
                    <td class="py-2 px-4 border-b"><a href="{{route("clients.show",["id"=>$client->id])}}" class="text-blue-500 hover:underline">Details</a></td>
                    <td class="py-2 px-4 border-b"><a href="{{route("clients.edit",["id"=>$client->id])}}" class="text-blue-500 hover:underline">Modifier</a></td>
                    <td class="px-4 py-2 border">
                        <button 
                            onclick="deleteClient({{ $client->id }})"
                            class="text-red-500 hover:underline cursor-pointer"
                        >
                            Supprimer
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function deleteClient(id) {
            if (!confirm('Are you sure you want to delete this client?')) return;

            fetch(`/clients/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector(`button[onclick="deleteClient(${id})"]`)
                        .closest('tr')
                        .remove();
                }
            })
            .catch(error => {
                alert('Error deleting client');
                console.error('Error:', error);
            });
        }
    </script>
</x-layout>
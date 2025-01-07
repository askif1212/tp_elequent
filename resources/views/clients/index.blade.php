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
                            onclick="deleteElement({{ $client->id }},'clients')"
                            class="text-red-500 hover:underline cursor-pointer"
                            id="deleteElement"
                        >
                            Supprimer
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
<x-layout>
    <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-md space-y-4">
        <h1 class="text-xl font-bold">{{ $client->firstName }} {{ $client->lastName }}</h1>
        <p class="text-gray-700">Phone: {{ $client->phone }}</p>
        <p class="text-gray-700">City: {{ $client->city }}</p>
        <p class="text-gray-700">Birth Day: {{ $client->birthDay }}</p>
        <a href="{{ route('clients.index') }}" class="text-blue-500 hover:underline">Back to Clients</a>
    </div>
</x-layout>
<x-layout>
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h5 class="text-xl font-bold mb-4">Modifier le client num {{ $client->id }}:</h5>
    <form action="{{ route('clients.update', $client->id) }}" method="post" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="firstName" class="block text-sm font-medium text-gray-700">First Name:</label>
            <input type="text" name="firstName" id="firstName" value="{{ old('firstName', $client->firstName) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
            <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name:</label>
            <input type="text" name="lastName" id="lastName" value="{{ old('lastName', $client->lastName) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone:</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $client->phone) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
            <label for="city" class="block text-sm font-medium text-gray-700">City:</label>
            <input type="text" name="city" id="city" value="{{ old('city', $client->city) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
            <label for="birthDay" class="block text-sm font-medium text-gray-700">BirthDay:</label>
            <input type="date" name="birthDay" id="birthDay" value="{{ old('birthDay', $client->birthDay) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
            <textarea name="description" id="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description', $client->description) }}</textarea>
        </div>
        <div>
            <input type="submit" value="Modifier" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        </div>
    </form>
</div>
</x-layout>
<x-layout>
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Create Client</h1>
        <form action="{{ route('clients.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="firstName" class="block text-sm font-medium text-gray-700">First Name:</label>
                <input type="text" name="firstName" id="firstName" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name:</label>
                <input type="text" name="lastName" id="lastName" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone:</label>
                <input type="text" name="phone" id="phone" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">City:</label>
                <input type="text" name="city" id="city" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="birthDay" class="block text-sm font-medium text-gray-700">Birth Day:</label>
                <input type="date" name="birthDay" id="birthDay" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create</button>
            </div>
        </form>
    </div>
</x-layout>
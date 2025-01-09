<x-layout>
    <div class="container mx-auto mt-5">
        <h1 class="text-center mb-5 text-2xl font-bold">Produit Catalogue</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($produits as $produit)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ strpos($produit->image, "placehold") !== false ? $produit->image : asset('storage/' . $produit->image) }}" class="w-full h-48 object-cover" alt="{{ $produit->name }}">
                    <div class="p-4">
                        <h5 class="text-lg font-semibold">{{ $produit->name }}</h5>
                        <p class="text-gray-700">{{ $produit->description }}</p>
                        <p class="text-gray-900 font-bold mt-2">Prix: ${{ $produit->price }}</p>
                        <a href="#" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded">Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Page loaded');
        });
    </script>
</x-layout>

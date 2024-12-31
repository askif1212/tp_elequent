<x-layout>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Fiche categorie num : {{$categorie->id}}</h2>
        <p class="mb-2"><strong>Name : </strong> {{$categorie->name}}</p>
        <p class="mb-4"><strong>Description : </strong> {{$categorie->description}}</p>
        <a href="{{route("categories.index")}}" class="text-blue-500 hover:underline">Retour vers la liste</a>
    </div>
</x-layout>

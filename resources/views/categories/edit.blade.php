<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edytuj kategorię</h2>
    </x-slot>

    <div class="py-12">
        <div class="bg-white oveerflow-hidden shadow-sm sm:rounded-lg p-6">
            <form method="POST" action="{{route('categories.update', $category)}}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label>Nazwa</label>
                    <input type="text" name="name" value="{{$category->name}}" class="w-full border-gray-300 rounded">
                </div>

                @error('name')<p class="text-red-500">{{$message}}</p>@enderror
               
                <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded">Zapisz</button>
            </form>
        </div>
    </div>
</x-app-layout>
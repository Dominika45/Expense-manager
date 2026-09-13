<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kategorie
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                 <a href="{{ route('categories.create') }}"
   class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition font-bold mb-4">
                    Dodaj
                </a>
                <table class="w-full border rounded-sm">
                    <thead>
                        <tr>
                            <th class="p-2 border text-left">Nazwa</th>
                            <th class="p-2 border text-right">Akcja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td class="p-2 border">{{ $category->name }}</td>

                            <td class="p-2 border">
                                <div class="flex gap-3 justify-end">
                                    <a href="{{ route('categories.edit', $category) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition font-bold">Edytuj</a>
                                    <form method="POST" action="{{route('categories.destroy', $category)}}" onsubmit=" return confirm('Na pewno usunąć?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition font-bold">Usuń</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
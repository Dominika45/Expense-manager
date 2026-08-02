<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kategorie
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left">
                    <thead>
                        <tr>
                            <th>Nazwa</th>
                            <th>Akcja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>

                            <td class="flex gap-2">
                                <a href="{{ route('categories.edit', $category) }}" class="text-blue-600">Edytuj</a>
                                <form method="POST" action="{{route('categories.destroy', $category)}}" onsubmit=" return confirm('Na pewno usunąć?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">Usuń</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
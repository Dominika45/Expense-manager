<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transakcje
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full border rounded-sm">
                    <thead>
                        <tr>
                            <th class="p-2 border">Kategoria</th>
                            <th class="p-2 border">Limit</th>
                            <th class="p-2 border">Miesiąc</th>
                            <th class="p-2 border">Akcja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userBudgets as $budget)
                            <tr>
                                <td class="p-2 border">{{ $budget->category->name }}</td>
                                <td class="p-2 border">{{ $budget->limit_amount }}</td>
                                <td class="p-2 border">{{ $budget->month }}</td>
                                <td class="flex gap-2">
                                    <a href="{{ route('budget.edit', $budget) }}" class="text-blue-600">Edytuj</a>
                                    <form method="POST" action="{{route('budget.destroy', $budget)}}" onsubmit=" return confirm('Na pewno usunąć?')">
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
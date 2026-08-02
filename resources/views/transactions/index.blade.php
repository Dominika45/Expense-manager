<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transakcje
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Opis</th>
                            <th>Kategoria</th>
                            <th>Kwota</th>
                            <th>Akcja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->date }}</td>
                            <td>{{ $transaction->description }}</td>
                            <td>{{ $transaction->category->name }}</td>
                            <td>{{ $transaction->amount }}zł</td>

                            <td class="flex gap-2">
                                <a href="{{ route('transactions.edit', $transaction) }}" class="text-blue-600">Edytuj</a>
                                <form method="POST" action="{{route('transactions.destroy', $transaction)}}" onsubmit=" return confirm('Na pewno usunąć?')">
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
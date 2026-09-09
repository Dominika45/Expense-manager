<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Wydatki w tym miesiącu</h1>
                    {{$totalExpenses}}
                    <h2>Ilość transakcji</h2>
                    {{$totalTransactions}}
                    <h3>Średnia kwota transakcji w tym miesiącu</h3>
                    {{$averageTransaction}}
                    <h3>Wydatki według kategorii</h3>
                    <table class="w-full border rounded-sm">
                        <thead>
                            <tr>
                                <th class="p-2 border">Kategoria</th>
                                <th class="p-2 border">Kwota</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactionsByCategory as $transaction)
                                <tr>
                                    <td class="p-2 border">{{ $transaction->name }}</td>
                                    <td class="p-2 border">{{ $transaction->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

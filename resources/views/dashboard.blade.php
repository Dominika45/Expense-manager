<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pulpit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Podsumowanie</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white p-6 rounded-lg shadow">
                            <h2 class="text-lg font-semibold text-gray-700">
                                Wydatki w tym miesiącu
                            </h2>
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ $totalExpenses }} zł
                            </p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow">
                            <h2 class="text-lg font-semibold text-gray-700">
                                Ilość transakcji
                            </h2>
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ $totalTransactions }}
                            </p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow">
                            <h2 class="text-lg font-semibold text-gray-700">
                                Średnia kwota transakcji
                            </h2>
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ number_format($averageTransaction, 2) }} zł
                            </p>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Wydatki według kategorii</h3>
                    <table class="w-full border rounded-sm mb-8">
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
                                    <td class="p-2 border">{{ $transaction->total }} zł</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Wykres wydatków według kategorii</h3>
                    <div class="w-full md:w-1/2">
                        <canvas
                            id="expensesChart"
                            data-transactions='@json($transactionsByCategory)'
                        ></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/dashboard.js')
</x-app-layout>


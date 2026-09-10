<h1>Moje budżety</h1>

<p>To jest widok budżetów.</p>
<table class="w-full border rounded-sm">
    <thead>
        <tr>
            <th class="p-2 border">Kategoria</th>
            <th class="p-2 border">Limit</th>
            <th class="p-2 border">Miesiąc</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usersBudgets as $budget)
            <tr>
                <td class="p-2 border">{{ $budget->category->name }}</td>
                <td class="p-2 border">{{ $budget->limit_amount }}</td>
                <td class="p-2 border">{{ $budget->month }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
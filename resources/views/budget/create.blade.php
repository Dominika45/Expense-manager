<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nowy limit kategorii</h2>
    </x-slot>

    <div class="py-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form method="POST" action="{{route('budget.store')}}">
                @csrf
                <div class="mb-4">
                    <label>Kategoria</label>
                    <select name="category_id" class="w-full border-gray-300 rounded">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label>Limit</label>
                    <input type="number" step="0.01" name="limit_amount" class="w-full border-gray-300 rounded">
                </div>

                <div class="mb-4">
                    <label>Miesiąc</label>
                    <input type="date" name="month" class="w-full border-gray-300 rounded">
                </div>

                @error('category_id')<p class="text-red-500">{{$message}}</p>@enderror
                @error('limit_amount')<p class="text-red-500">{{$message}}</p>@enderror
                @error('month')<p class="text-red-500">{{$message}}</p>@enderror

                <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded">Zapisz</button>
            </form>
        </div>
    </div>
</x-app-layout>
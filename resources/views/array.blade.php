<x-app-layout>
    <div class="array-actions">
        <a href="{{ route('array.shuffle') }}">Перемешать иконки</a>
        <a href="{{ route('array.sort') }}">Сортировать по размеру ↑</a>
        <a href="{{ route('array.filter') }}">Размер более 500 кб</a>
    </div>

    <div class="cards-grid">
        @foreach ($array as $item)
        <div class="product-card">
            <img src="{{ Vite::asset('resources/images/' . $item['path']) }}" alt="{{ $item['title'] }}">
            <div class="product-card__body">
                <p class="product-card__title">{{ $item['title'] }} <span class="btn-sub">({{ $item['price'] }} кб)</span></p>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>

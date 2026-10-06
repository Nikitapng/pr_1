<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Массивы</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <header>
        <a class="logo" href="{{ route('home') }}">Iconspack</a>
        <nav>
            <a href="{{ route('home') }}">Главная</a>
            <a href="{{ route('array') }}">Массивы</a>
        </nav>
    </header>

    <main>

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
    </main>

    <footer>
        &copy; 2026 &mdash; Несен Никита Вячеславович
    </footer>

</body>

</html>
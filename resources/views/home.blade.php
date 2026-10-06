<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
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
        <div class="card">
            <img src="{{ Vite::asset('resources/images/img3.png') }}" alt="Картинка">
            <div class="card-text">
                <h1>Добро пожаловать!</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                    anim id est laborum.
                </p>
            </div>
        </div>
    </main>

    <footer>
        &copy; 2026 &mdash; Несен Никита Вячеславович
    </footer>

</body>

</html>
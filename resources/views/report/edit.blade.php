<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование заявки на иконку</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <header>
        <a class="logo" href="{{ route('home') }}">Iconspack</a>
        <nav>
            <a href="{{ route('home') }}">Главная</a>
            <a href="{{ route('array') }}">Массивы</a>
            <a href="{{ route('reports.index') }}">Заявки</a>
        </nav>
    </header>

    <main>
        <div class="page-header">
            <h1 class="page-title">Редактирование заявки #{{ $report->id }}</h1>
            <a href="{{ route('reports.index') }}" class="btn-link">&larr; Назад к списку</a>
        </div>

        <div class="card">
            <form action="{{ route('reports.update', $report->id) }}" method="POST" class="form">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="number">Название / Артикул иконки:</label>
                    <input type="text" id="number" name="number" value="{{ $report->number }}" placeholder="Например: Иконка настроек / settings-01" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">Описание и пожелания к иконке:</label>
                    <textarea id="description" name="description" rows="4" placeholder="Опишите стиль, формат, назначение иконки..." class="form-control" required>{{ $report->description }}</textarea>
                </div>

                <div>
                    <input type="submit" value="Обновить" class="btn btn-primary">
                </div>
            </form>
        </div>
    </main>

    <footer>
        &copy; 2026 &mdash; Несен Никита Вячеславович
    </footer>

</body>

</html>

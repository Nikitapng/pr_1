<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявки на иконки</title>
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
            <h1 class="page-title">Список заявок на иконки</h1>
            <a href="{{ route('reports.create') }}" class="btn btn-primary">Создать заявку</a>
        </div>

        <div class="card">
            @if ($reports->isEmpty())
                <p>Заявок пока нет. Вы можете <a href="{{ route('reports.create') }}" class="btn-link">создать первую заявку</a>.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Название / Артикул иконки</th>
                            <th>Описание</th>
                            <th>Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            <tr>
                                <td>{{ $report->id }}</td>
                                <td class="font-medium">{{ $report->number }}</td>
                                <td>{{ $report->description }}</td>
                                <td>
                                    <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-primary btn-sm">Редактировать</a>
                                    <form method="POST" action="{{ route('reports.destroy', $report->id) }}" class="inline-block">
                                        @method('delete')
                                        @csrf
                                        <input type="submit" value="Удалить" class="btn btn-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </main>

    <footer>
        &copy; 2026 &mdash; Несен Никита Вячеславович
    </footer>

</body>

</html>

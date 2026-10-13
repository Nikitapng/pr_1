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
            <div class="filters-panel">
                <div class="filters-row">
                    <span class="filters-label">Сортировка:</span>
                    <a href="{{ route('reports.index', ['sort' => 'desc', 'status' => $status]) }}" class="filter-btn @if($sort === 'desc') active @endif">Сначала новые</a>
                    <a href="{{ route('reports.index', ['sort' => 'asc', 'status' => $status]) }}" class="filter-btn @if($sort === 'asc') active @endif">Сначала старые</a>
                </div>

                <div class="filters-row">
                    <span class="filters-label">Фильтрация:</span>
                    <a href="{{ route('reports.index', ['sort' => $sort]) }}" class="filter-btn @if(!$status) active @endif">Все</a>
                    @foreach ($statuses as $item)
                    <a href="{{ route('reports.index', ['status' => $item->id, 'sort' => $sort]) }}" class="filter-btn @if($status == $item->id) active @endif">{{ $item->name }}</a>
                    @endforeach
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Название / Артикул</th>
                            <th>Описание</th>
                            <th>Статус</th>
                            <th>Дата и время</th>
                            <th class="th-actions">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                        <tr>
                            <td class="font-medium">{{ $report->number }}</td>
                            <td>{{ $report->description }}</td>
                            <td>
                                <span class="badge">{{ $report->status->name ?? 'Нет статуса' }}</span>
                            </td>
                            <td class="text-muted text-nowrap">
                                {{ $report->created_at ? $report->created_at->format('d.m.Y H:i') : '—' }}
                            </td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-primary btn-sm">Редактировать</a>
                                    <form method="POST" action="{{ route('reports.destroy', $report->id) }}" class="inline-form">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination-container">
                {{ $reports->appends(request()->query())->links() }}
            </div>
            @endif
        </div>
    </main>

    <footer>
        &copy; 2026 &mdash; Несен Никита Вячеславович
    </footer>

</body>

</html>
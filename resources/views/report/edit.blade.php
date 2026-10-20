<x-app-layout>
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
</x-app-layout>

<x-app-layout>
    <div class="page-header">
        <h1 class="page-title">Заявка на новую иконку</h1>
        <a href="{{ route('reports.index') }}" class="btn-link">&larr; Назад к списку</a>
    </div>

    <div class="card">
        <form action="{{ route('reports.store') }}" method="POST" class="form">
            @csrf
            <div class="form-group">
                <label for="number">Выберите иконку:</label>
                <select id="number" name="number" class="form-control" required>
                    <option value="" disabled selected>Выберите иконку из каталога</option>
        @foreach ($icons as $icon)
            <option value="{{ $icon['title'] }}">{{ $icon['title'] }} ({{ $icon['price'] }} кб)</option>
        @endforeach
    </select>
            </div>

            <div class="form-group">
                <label for="description">Описание и пожелания к иконке:</label>
                <textarea id="description" name="description" rows="4" class="form-control" required></textarea>
            </div>

            <div>
                <input type="submit" value="Создать" class="btn btn-primary">
            </div>
        </form>
    </div>
</x-app-layout>
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

            <!-- Поле с динамической маской Alpine Mask (Вариант А) -->
            <div x-data="{ country: 'ru' }" class="form-group">
                <label>Контактный телефон заявителя:</label>
                
                <div class="flex items-center gap-4 mb-1">
                    <label class="inline-flex items-center gap-1 cursor-pointer text-sm text-gray-700">
                        <input type="radio" value="ru" x-model="country">
                        <span>🇷🇺 РФ (+7)</span>
                    </label>
                    <label class="inline-flex items-center gap-1 cursor-pointer text-sm text-gray-700">
                        <input type="radio" value="by" x-model="country">
                        <span>🇧🇾 РБ (+375)</span>
                    </label>
                </div>

                <input 
                    type="tel" 
                    name="phone"
                    x-mask:dynamic="country === 'ru' ? '+7 (999) 999-99-99' : '+375 (99) 999-99-99'"
                    :placeholder="country === 'ru' ? '+7 (999) 999-99-99' : '+375 (29) 123-45-67'"
                    class="form-control"
                >
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

<x-app-layout>
    <div class="page-header">
        <h1 class="page-title">Список заявок на иконки</h1>
        <a href="{{ route('reports.create') }}" class="btn btn-primary">Создать заявку</a>
    </div>

    <div class="card">
        @if ($reports->isEmpty())
        <p>Заявок пока нет. Вы можете <a href="{{ route('reports.create') }}" class="btn-link">создать первую заявку</a>.</p>
        @else
        <x-filter :sort="$sort" :status="$status" />

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
                    @php
                        $iconItem = collect($icons)->firstWhere('title', $report->number);
                    @endphp
                    <tr>
                        <td class="font-medium">
                            <div class="flex items-center gap-2">
                                @if ($iconItem)
                                    <img src="{{ Vite::asset('resources/images/' . $iconItem['path']) }}" alt="{{ $report->number }}" style="width: 20px; height: 20px;" class="object-contain inline-block shrink-0">
                                @endif
                                <span>{{ $report->number }}</span>
                            </div>
                        </td>
                        <td>{{ $report->description }}</td>
                        <td>
                            <x-status :type="$report->status_id">
                                {{ $report->status->name ?? 'Новый' }}
                            </x-status>
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
</x-app-layout>

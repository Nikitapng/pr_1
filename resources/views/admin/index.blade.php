<x-app-layout>
    <div class="page-header">
        <h1 class="page-title">Панель администратора: все заявки</h1>
    </div>

    <div class="card">
        @if ($reports->isEmpty())
            <p class="text-muted">Заявок пока нет.</p>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Пользователь</th>
                            <th>Название / Артикул</th>
                            <th>Описание</th>
                            <th>Статус</th>
                            <th>Дата и время</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                        <tr>
                            <td class="font-medium">{{ $report->user->name }}</td>
                            <td>{{ $report->number }}</td>
                            <td>{{ $report->description }}</td>
                            <td>
                                @if ($report->status_id == 1)
                                <form class="status-form inline-form" action="{{ route('reports.status.update', $report->id) }}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <select name="status_id" class="status-select status-select-{{ $report->status_id }}">
                                        @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" {{ $status->id === $report->status_id ? 'selected' : '' }}>
                                            {{ $status->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </form>
                                @else
                                <span class="badge badge-status-{{ $report->status_id }}">{{ $report->status->name ?? 'Нет статуса' }}</span>
                                @endif
                            </td>
                            <td class="text-muted text-nowrap">
                                {{ $report->created_at ? $report->created_at->format('d.m.Y H:i') : '—' }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
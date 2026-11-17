@props(['sort', 'status'])

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
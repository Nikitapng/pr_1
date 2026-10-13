@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="md-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="md-pagination-item md-pagination-disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <svg viewBox="0 0 24 24" class="md-icon" fill="currentColor">
                    <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                </svg>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="md-pagination-item" aria-label="@lang('pagination.previous')">
                <svg viewBox="0 0 24 24" class="md-icon" fill="currentColor">
                    <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                </svg>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="md-pagination-item md-pagination-dots" aria-disabled="true">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="md-pagination-item md-pagination-active" aria-current="page">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="md-pagination-item" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="md-pagination-item" aria-label="@lang('pagination.next')">
                <svg viewBox="0 0 24 24" class="md-icon" fill="currentColor">
                    <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                </svg>
            </a>
        @else
            <span class="md-pagination-item md-pagination-disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <svg viewBox="0 0 24 24" class="md-icon" fill="currentColor">
                    <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                </svg>
            </span>
        @endif
    </nav>
@endif

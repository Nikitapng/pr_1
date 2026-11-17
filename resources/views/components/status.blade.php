@props(['type'])

<div>
    x-status -> {{ $type }}
    <span class="badge badge-status-{{ $type }}">{{ $slot }}</span>
</div>
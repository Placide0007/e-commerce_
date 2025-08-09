@props(['category'])

@php
    $isActive = request()->routeIs('category.filter') && request()->route('id') == $category->id;
@endphp

<a href="{{ route('category.filter', $category->id) }}"
   class="nav-item {{ $isActive ? 'active' : '' }}">
    {{ $category->category_name }}
</a>

@php
    $hasChildren = $menuLink->children->isNotEmpty();
@endphp

<x-nav-link :href="route($menuLink->url)" :active="request()->routeIs($menuLink->url)" :has-children="$hasChildren">
    {{ $menuLink->menu_name }}
</x-nav-link>

@if ($hasChildren)
    <div class="sub-menu">
        @foreach ($menuLink->children as $childMenuLink)
            @include('admin.menu_links.menu_link_dropdown', ['menuLink' => $childMenuLink])
        @endforeach
    </div>
@endif

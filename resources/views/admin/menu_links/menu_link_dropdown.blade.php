@php
    $hasChildren = $menuLink->children->isNotEmpty();
@endphp

<div class="menu-link">
    <a :href="route($menuLink - > url)"
        :class="{ 'active': request()->routeIs($menuLink -> url): has - children = "$hasChildren" }">
        {{ $menuLink->menu_name }}
    </a>
    @if ($hasChildren)
        <div class="sub-menu">
            @foreach ($menuLink->children as $childMenuLink)
                @include('admin.menu_links.menu_link_dropdown', ['menuLink' => $childMenuLink])
            @endforeach
        </div>
    @endif
</div>

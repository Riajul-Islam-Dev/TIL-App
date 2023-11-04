<div class="menu">
    @foreach ($menuLinks as $menuLink)
        <div class="menu-link">
            <a href="{{ route($menuLink->url) }}">{{ $menuLink->menu_name }}</a>
            @if ($menuLink->children->isNotEmpty())
                <div class="sub-menu">
                    @include('menu', ['menuLinks' => $menuLink->children])
                </div>
            @endif
        </div>
    @endforeach
</div>

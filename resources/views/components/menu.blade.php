<div class="menu">
    @foreach ($menuLinks as $menuLink)
        <div class="menu-link">
            <a href="{{ route($menuLink->url) }}">
                {{ $menuLink->menu_name }} @if ($menuLink->children->isNotEmpty())
                    <i class="fas fa-chevron-right"></i> <!-- Add the arrow icon here -->
                @endif
            </a>
            @if ($menuLink->children->isNotEmpty())
                <div class="sub-menu">
                    @include('components/menu', ['menuLinks' => $menuLink->children])
                </div>
            @endif
        </div>
    @endforeach
</div>

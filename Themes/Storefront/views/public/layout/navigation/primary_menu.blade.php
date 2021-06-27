<nav class="navbar navbar-expand-sm nav-full-width">
    <ul class="navbar-nav mega-menu horizontal-megamenu nav-full-width">
        @foreach ($primaryMenu->menus() as $menu)
            @include('public.layout.navigation.menu', ['type' => 'primary_menu'])
        @endforeach
    </ul>
</nav>

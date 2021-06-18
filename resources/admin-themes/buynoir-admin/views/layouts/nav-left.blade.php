<div class="navbar-left buynoir-navbar-left">
    <ul class="menubar">
        @foreach ($menu->items as $menuItem)
            <li class="menu-item {{ count($menuItem['children']) ? 'has-sub' : '' }} {{ $menu->getActive($menuItem) }}"  style="{{!empty($menuItem['style'])?$menuItem['style']:''}}">
                <a href="{{ count($menuItem['children']) ? current($menuItem['children'])['url'] : $menuItem['url'] }}">
                    <span class="icon {{ $menuItem['icon-class'] }}"></span>                    
                    <span>{{ trans($menuItem['name']) }}</span>
                </a>
                @if (count($menuItem['children']))
                    <ul class="buynoir-menubar-sub">
                        @foreach ($menuItem['children'] as $key => $menuItemChild)
                            <li class="{{ $menu->getActive($menuItemChild) }}"><a href="{{ $menuItemChild['url'] }}">{{ $key }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
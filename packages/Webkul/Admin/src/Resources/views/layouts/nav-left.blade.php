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
                            @if($key=="general" || $key=="content" || $key=="design")
                                <li class=" "><a href="{{ route('admin.configuration.index', 'general/'. $key) }}">{{ $key }}</a></li>
                            @else
                                <li class=""><a href="{{ $menuItemChild['url'] }}">{{ $key }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
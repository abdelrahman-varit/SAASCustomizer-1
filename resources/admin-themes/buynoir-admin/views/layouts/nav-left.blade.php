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
                                <li class="{{in_array(request()->route('slug2'),['general','content','design']) && ($key!='emails')?'active':''}}"><a href="{{ route('admin.configuration.index', 'general/'. $key) }}">{{ $key }}</a></li>
                            @elseif($key=="catalog")
                                <li class="{{in_array(request()->route('slug2'),['inventory','products','rich_snippets'])?'active':''}}"><a href="{{ route('admin.configuration.index', 'catalog/inventory') }}">{{ $key }}</a></li>
                            @elseif($key=="dropship")
                                <li class="{{($key=='dropship' && request()->route('slug')=="dropship" && request()->route('slug2')=="settings")?'active':''}}"><a href="{{ route('admin.configuration.index', 'dropship/settings') }}">{{ $key }} </a></li>
                            @elseif($key=="customer" )                                
                                <li class="{{($key=='customer' && request()->route('slug')=="customer" && request()->route('slug2')=='settings')?'active':''}}"><a href="{{ route('admin.configuration.index', 'customer/settings') }}">{{  $key }}</a></li>
                            @elseif($key=="sales")
                                <li class="{{in_array(request()->route('slug2'),['shipping','carriers','paymentmethods','orderSettings'])?'active':''}}"><a href="{{ route('admin.configuration.index', 'sales/shipping') }}">{{ $key }}</a></li>
                            @elseif($key=="emails")
                                <li class="{{$key=='emails' && request()->route('slug1')=="emails"?'active':''}}"><a href="{{ route('admin.configuration.index', 'emails/general') }}">{{ $key }}</a></li>
                            @else
                                <li class="{{ $menu->getActive($menuItemChild) }}"><a href="{{ $menuItemChild['url'] }}">{{ $key}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
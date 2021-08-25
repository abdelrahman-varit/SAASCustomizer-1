<!-- Sidebar Start -->
<div class="col-lg-4 col-xl-3">
    <div class="d-flex d-lg-none align-items-center justify-content-between mb-3">
        <h4 class="m-0">My Account</h4>
        <button class="btn" data-bs-toggle="collapse" data-bs-target=".customer-sidebar"><i class="fas fa-bars"></i></button>
    </div>
    <div class="collapse customer-sidebar bg-light">
        @foreach ($menu->items as $menuItem)
            @php
                $showCompare = core()->getConfigData('general.content.shop.compare_option') == "1" ? true : false;
            @endphp

            @if (! $showCompare)
                @php
                    unset($menuItem['children']['compare']);
                @endphp
            @endif

            @foreach ($menuItem['children'] as $subMenuItem)
                <a href="{{ $subMenuItem['url'] }}" class="{{ $menu->getActive($subMenuItem) }}">
                    <i class="fas fa-{{ $subMenuItem['icon'] }} me-2"></i> {{ trans($subMenuItem['name']) }}
                </a>
            @endforeach
        @endforeach
    </div>
    <a href=".customer-sidebar" class="d-lg-none" data-bs-toggle="collapse">@yield('activeItem')</a>
</div>
<!-- Sidebar End -->
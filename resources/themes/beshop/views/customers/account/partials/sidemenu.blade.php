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
                <a href="{{ $subMenuItem['url'] }}" class="{{ $menu->getActive($subMenuItem) }}"><svg xmlns="http://www.w3.org/2000/svg" width="13.996" height="20.994" xmlns:v="https://vecta.io/nano"><path d="M6.998 0A7.01 7.01 0 0 0 0 6.998a7.02 7.02 0 0 0 .84 3.326l5.775 10.445c.077.139.223.226.383.226s.306-.086.383-.226l5.777-10.448c.548-1.015.838-2.164.838-3.322A7.01 7.01 0 0 0 6.998 0zm0 10.497c-1.929 0-3.499-1.57-3.499-3.499s1.57-3.499 3.499-3.499 3.499 1.57 3.499 3.499-1.57 3.499-3.499 3.499z"/></svg> {{ trans($subMenuItem['name']) }}</a>
            @endforeach
        @endforeach
    </div>
    <a href="#" class="d-lg-none"><svg xmlns="http://www.w3.org/2000/svg" width="13.996" height="15.003" xmlns:v="https://vecta.io/nano"><path d="M6.999 0c-2.234 0-4.06 1.752-4.06 3.895S4.765 7.79 6.999 7.79s4.06-1.752 4.06-3.895S9.233 0 6.999 0zm6.967 10.904c-.106-.255-.248-.493-.408-.715a5.07 5.07 0 0 0-3.492-2.109c-.177-.017-.372.017-.514.119-.745.527-1.631.8-2.553.8a4.39 4.39 0 0 1-2.553-.8c-.141-.102-.337-.153-.514-.119-1.418.187-2.694.953-3.492 2.109-.159.221-.301.477-.408.715-.053.102-.035.221.018.323a6.73 6.73 0 0 0 .479.68c.248.323.514.612.815.884.248.238.532.459.815.681 1.401 1.004 3.085 1.531 4.822 1.531s3.422-.527 4.822-1.531a7.54 7.54 0 0 0 .815-.681 8.01 8.01 0 0 0 .816-.884c.177-.221.337-.442.479-.68.089-.102.106-.221.053-.323z"/></svg> Profile</a>
</div>
<!-- Sidebar End -->
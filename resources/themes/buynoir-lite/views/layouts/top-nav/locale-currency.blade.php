@php
    $searchQuery = request()->input();

    if ($searchQuery && ! empty($searchQuery)) {
        $searchQuery = implode('&', array_map(
            function ($v, $k) {
                if (is_array($v)) {
                    if (is_array($v)) {
                        $key = array_keys($v)[0];

                        return $k. "[$key]=" . implode('&' . $k . '[]=', $v);
                    } else {
                        return $k. '[]=' . implode('&' . $k . '[]=', $v);
                    }
                } else {
                    return $k . '=' . $v;
                }
            },
            $searchQuery,
            array_keys($searchQuery)
        ));
    } else {
        $searchQuery = false;
    }

@endphp
<div class="topbar-locale">
{!! view_render_event('bagisto.shop.layout.header.locale.before') !!}
   
       
            @php
                $localeImage = null;
            @endphp

            @foreach (core()->getCurrentChannel()->locales as $locale)
                @if ($locale->code == app()->getLocale())
                    @php
                        $localeImage = $locale->locale_image;
                    @endphp
                @endif
            @endforeach

            <div class="col-2 locale-img">
                @if ($localeImage)
                    <img src="{{ asset('/storage/' . $localeImage) }}" onerror="this.src = '{{ asset($localeImage) }}'" height="30" />
                @elseif (app()->getLocale() == 'en')
                    <img src="{{ asset('/themes/cognite/assets/images/icons/en.png') }}" />
                @endif
            </div>

            <select
                class="col-4 dropdown-toggle locale-switcher border-0"
                onchange="window.location.href = this.value"
                @if (count(core()->getCurrentChannel()->locales) == 1)
                    disabled="disabled"
                @endif>

                @foreach (core()->getCurrentChannel()->locales as $locale)
                    @if (isset($searchQuery) && $searchQuery)
                        <option
                            value="?{{ $searchQuery }}&locale={{ $locale->code }}"
                            {{ $locale->code == app()->getLocale() ? 'selected' : '' }}>
                            {{ $locale->name }}
                        </option>
                    @else
                        <option value="?locale={{ $locale->code }}" {{ $locale->code == app()->getLocale() ? 'selected' : '' }}>{{ $locale->name }}</option>
                    @endif
                @endforeach
            </select>

            <div class="select-icon-container col-2">
                <span class="select-icon rango-arrow-down"></span>
            </div>
        
  

{!! view_render_event('bagisto.shop.layout.header.locale.after') !!}

{!! view_render_event('bagisto.shop.layout.header.currency-item.before') !!}

    @if (core()->getCurrentChannel()->currencies->count() > 1)
               <i class="icon icon-currency"></i>
               <select
                    class="col-3 dropdown-toggle locale-switcher"
                    onchange="window.location.href = this.value">
                    @foreach (core()->getCurrentChannel()->currencies as $currency)
                        @if (isset($searchQuery) && $searchQuery)
                            <option value="?{{ $searchQuery }}&currency={{ $currency->code }}" {{ $currency->code == core()->getCurrentCurrencyCode() ? 'selected' : '' }}>{{ $currency->code }}</option>
                        @else
                            <option value="?currency={{ $currency->code }}" {{ $currency->code == core()->getCurrentCurrencyCode() ? 'selected' : '' }}>{{ $currency->code }}</option>
                        @endif
                    @endforeach

                </select>

                <div class="col select-icon-container col-1">
                    <span class="select-icon rango-arrow-down"></span>
                </div>
          
    @endif

</div>

{!! view_render_event('bagisto.shop.layout.header.currency-item.after') !!}

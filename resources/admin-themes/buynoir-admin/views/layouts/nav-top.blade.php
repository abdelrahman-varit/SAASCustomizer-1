<div class="navbar-top buynoir-navbar">
    <div class="buynoir-navbar-l">
        <div class="buynoir-navbar-toggler">
            <button type="button" onclick="document.body.classList.toggle('sidebar-toggle')">
                <i class="fas fa-list"></i>
            </button>
        </div>
        <div class="buynoir-navbar-logo">
            <a href="{{ route('admin.dashboard.index') }}">
                @if (core()->getConfigData('general.design.admin_logo.logo_image'))
                    <img src="{{ \Illuminate\Support\Facades\Storage::url(core()->getConfigData('general.design.admin_logo.logo_image')) }}" alt="{{ config('app.name') }}" style="height: 40px; width: 110px;"/>
                @else
                    <img src="{{ asset('buynoir/shopadmin/images/logo-bk.png') }}" alt="{{ config('app.name') }}"/>
                @endif
            </a>
        </div>
    </div>
    <div class="buynoir-navbar-r">
        <?php $locale = request()->get('admin_locale') ?: app()->getLocale();?>
        <div class="profile-info">
            <div class="dropdown-toggle">
                @foreach (core()->getAllLocales() as $localeModel)
                    @if ($localeModel->code == $locale)
                        <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/images/flags/'.$localeModel->code.'.png') }}" alt="{{ $localeModel->code }}"> {{ $localeModel->name }} <i class="fas fa-chevron-down"></i>
                    @endif
                @endforeach
            </div>

            <div class="dropdown-list bottom-right">
                <div class="dropdown-container" style="padding: 12px 15px 15px">
                    <div class="control-group" style="margin-bottom: 0">
                        <select class="control" onChange="window.location.href = this.value" style="width: 100%">
                            @foreach (core()->getAllLocales() as $localeModel)

                                <option value="{{ '?admin_locale=' . $localeModel->code }}" {{ ($localeModel->code) == $locale ? 'selected' : '' }}>
                                    {{ $localeModel->name }}
                                </option>

                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="profile-info">
            <div class="dropdown-toggle">
                <i class="fas fa-user-circle"></i><span>{{ auth()->guard('admin')->user()->role['name'] }}</span><i class="fas fa-chevron-down"></i>
            </div>

            <div class="dropdown-list bottom-right">
                <div class="dropdown-container">
                    <span class="app-version">{{ __('admin::app.layouts.app-version', ['version' => 'v' . config('app.version')]) }}</span>
                    <label>{{ auth()->guard('admin')->user()->name }}</label>
                    <ul>
                        <li>
                            <a href="{{ route('shop.home.index') }}" target="_blank">{{ __('admin::app.layouts.visit-shop') }}</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.subscription.plan.overview') }}">{{ trans('saassubscription::app.admin.layouts.subscription') }}</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.account.edit') }}">{{ __('admin::app.layouts.my-account') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.session.destroy') }}">{{ __('admin::app.layouts.logout') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>










<!-- <div class="navbar-top buynoir-navbar">
    <div class="brand-logo"> 
        <a href="{{ route('admin.dashboard.index') }}">
            @if (core()->getConfigData('general.design.admin_logo.logo_image'))
                <img src="{{ \Illuminate\Support\Facades\Storage::url(core()->getConfigData('general.design.admin_logo.logo_image')) }}" alt="{{ config('app.name') }}" style="height: 40px; width: 110px;"/>
            @else
                <img src="{{ asset('buynoir/shopadmin/images/logo-bk.png') }}" alt="{{ config('app.name') }}"/>
            @endif
        </a>
        <i class="fas fa-chevron-down"></i>
    </div>

    <div class="navbar-right">
        <div class="admin-dropdown-toggle">
            <div class="admin-dropdown-toggler" onclick="this.parentNode.classList.toggle('active')">
                <svg width="16" fill="#ffffff" enable-background="new 0 0 515.555 515.555" viewBox="0 0 515.56 515.56" xmlns="http://www.w3.org/2000/svg">
                    <path d="m496.68 212.21c25.167 25.167 25.167 65.971 0 91.138s-65.971 25.167-91.138 0-25.167-65.971 0-91.138 65.971-25.167 91.138 0"/>
                    <path d="m303.35 212.21c25.167 25.167 25.167 65.971 0 91.138s-65.971 25.167-91.138 0-25.167-65.971 0-91.138 65.971-25.167 91.138 0"/>
                    <path d="m110.01 212.21c25.167 25.167 25.167 65.971 0 91.138s-65.971 25.167-91.138 0-25.167-65.971 0-91.138 65.971-25.167 91.138 0"/>
                </svg>
            </div>
            <div class="admin-dropdown-toggle-content">

                <div class="profile">
                    <span class="avatar"></span>
                    <?php $locale = request()->get('admin_locale') ?: app()->getLocale();?>
                    <div class="profile-info">
                        <div class="dropdown-toggle">
                            <div style="display: inline-block; vertical-align: middle;">
                                @foreach (core()->getAllLocales() as $localeModel)
                                    @if ($localeModel->code == $locale)
                                        <span class="role">
                                            <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/images/flags/'.$localeModel->code.'.png') }}" alt="{{ $localeModel->code }}"> &nbsp; {{ $localeModel->name }}   
                                        </span>
                                    @endif
                                @endforeach
                                
                            </div>
                            <i class="fas fa-chevron-down"></i>
                        </div>

                        <div class="dropdown-list bottom-right">
                            <div class="control-group" style="padding-left: 15px; padding-right: 15px; margin-bottom: 10px">
                                <select class="control" onChange="window.location.href = this.value" style="width: 100%">
                                    @foreach (core()->getAllLocales() as $localeModel)

                                        <option value="{{ '?admin_locale=' . $localeModel->code }}" {{ ($localeModel->code) == $locale ? 'selected' : '' }}>
                                            {{ $localeModel->name }}
                                        </option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="profile-info">
                        <div class="dropdown-toggle">
                            <div style="display: inline-block; vertical-align: middle;">
                                <span class="role">
                                <i class="fas fa-user-circle"></i> &nbsp; {{ auth()->guard('admin')->user()->role['name'] }}
                                </span>
                            </div>
                            <i class="fas fa-chevron-down"></i>
                        </div>

                        <div class="dropdown-list bottom-right">
                            <span class="app-version">{{ __('admin::app.layouts.app-version', ['version' => 'v' . config('app.version')]) }}</span>
                            
                            <div class="dropdown-container">
                                <label>{{ auth()->guard('admin')->user()->name }}</label>
                                <ul>
                                    <li>
                                        <a href="{{ route('shop.home.index') }}" target="_blank">{{ __('admin::app.layouts.visit-shop') }}</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.subscription.plan.overview') }}">{{ trans('saassubscription::app.admin.layouts.subscription') }}</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.account.edit') }}">{{ __('admin::app.layouts.my-account') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.session.destroy') }}">{{ __('admin::app.layouts.logout') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div> -->
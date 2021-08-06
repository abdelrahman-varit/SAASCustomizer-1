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
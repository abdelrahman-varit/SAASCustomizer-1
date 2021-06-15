<div class="navbar-top buynoir-navbar">
    <div class="navbar-top-left">
        <div class="toggle-sidebar" onclick="document.body.classList.toggle('sidebar-inactive')">
            <svg width="16" enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                <g fill="#FFFFFF">
                    <path d="m479.18 91.897h-446.36c-18.131 0-32.821-14.69-32.821-32.82s14.69-32.821 32.821-32.821h446.36c18.13 0 32.82 14.69 32.82 32.821s-14.69 32.82-32.82 32.82z"/>
                    <path d="M295.385,288.821H32.821C14.69,288.821,0,274.13,0,256s14.69-32.821,32.821-32.821h262.564   c18.13,0,32.821,14.69,32.821,32.821S313.515,288.821,295.385,288.821z"/>
                </g>
                <path d="m479.18 288.82h-52.513c-18.13 0-32.821-14.69-32.821-32.821s14.69-32.821 32.821-32.821h52.513c18.13 0 32.82 14.69 32.82 32.821s-14.69 32.821-32.82 32.821z" fill="#FFFFFF"/>
                <path d="m479.18 485.74h-446.36c-18.131 0-32.821-14.691-32.821-32.821s14.69-32.821 32.821-32.821h446.36c18.13 0 32.82 14.69 32.82 32.821 0 18.13-14.69 32.821-32.82 32.821z" fill="#FFFFFF"/>
            </svg>
        </div>

        <div class="search-bar" style="display:none"> 
            <i class="icon search-icon"></i> 
            <input type="text" class="form-control"> 
        </div>
    </div>

    <div class="navbar-top-middle"> 
        <div class="brand-logo"> 
            <a href="{{ route('admin.dashboard.index') }}">
                @if (core()->getConfigData('general.design.admin_logo.logo_image'))
                    <img src="{{ \Illuminate\Support\Facades\Storage::url(core()->getConfigData('general.design.admin_logo.logo_image')) }}" alt="{{ config('app.name') }}" style="height: 40px; width: 110px;"/>
                @else
                    <img src="{{ asset('buynoir/shopadmin/images/logo-bk.png') }}" alt="{{ config('app.name') }}"/>
                @endif
            </a> 
        </div> 
    </div> 

    <div class="navbar-top-right">

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
                                <span class="name">
                                    {{ __('admin::app.datagrid.locale') }} 
                                </span>

                                @foreach (core()->getAllLocales() as $localeModel)
                                    @if ($localeModel->code == $locale)
                                        <span class="role">
                                            {{ $localeModel->name }}   
                                        </span>
                                    @endif
                                @endforeach
                                
                            </div>
                            <i class="icon arrow-down-icon active"> </i> 
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
                                <span class="name">
                                    {{ auth()->guard('admin')->user()->name }}
                                </span>

                                <span class="role">
                                    {{ auth()->guard('admin')->user()->role['name'] }}
                                </span>
                            </div>
                            <i class="icon arrow-down-icon active"></i>
                        </div>

                        <div class="dropdown-list bottom-right">
                            <span class="app-version">{{ __('admin::app.layouts.app-version', ['version' => 'v' . config('app.version')]) }}</span>
                            
                            <div class="dropdown-container">
                                <label>Account</label>
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
</div>
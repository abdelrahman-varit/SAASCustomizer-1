<div class="navbar-top buynoir-navbar">
    <div class="navbar-top-left"> 
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
        <div class="profile">
              <span class="avatar">   
            </span>

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
                    <div class="control-group">
                        <select class="control" onChange="window.location.href = this.value" style="margin-left: 30px;">
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
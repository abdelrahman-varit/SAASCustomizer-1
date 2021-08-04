<?php $locale = request()->get('admin_locale') ?: app()->getLocale();?>

<div class="header bg-white shadow-sm position-sticky top-0 start-0">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-auto">
                <button class="btn btn-light py-3 ps-0 d-lg-none sidebar-btn" onclick="document.body.classList.toggle('toggle-sidebar');"><i class="fas fa-list"></i></button>
                <a href="{{ route('admin.dashboard.index') }}" class="header-logo">
                    @if (core()->getConfigData('general.design.admin_logo.logo_image'))
                        <img src="{{ \Illuminate\Support\Facades\Storage::url(core()->getConfigData('general.design.admin_logo.logo_image')) }}" alt="{{ config('app.name') }}">
                    @else
                        <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/img/logo.svg') }}" alt="{{ config('app.name') }}">
                    @endif
                </a>
            </div>
            <div class="col">
                <div class="d-flex">
                    <button class="btn btn-light py-3 ps-0 d-none d-lg-block sidebar-btn" onclick="document.body.classList.toggle('toggle-sidebar');"><i class="fas fa-list"></i></button>
                    <div class="ms-auto d-flex gap-2 gap-lg-3">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle py-3" type="button" data-bs-toggle="dropdown">
                                @foreach (core()->getAllLocales() as $localeModel)
                                    @if ($localeModel->code == $locale)
                                        <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/img/flags/'.$localeModel->code.'.png') }}" alt="{{ $localeModel->code }}" class="me-2">
                                        <span class="d-none d-lg-inline-block">{{ $localeModel->name }}</span>
                                    @endif
                                @endforeach
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @foreach (core()->getAllLocales() as $localeModel)
                                    <li><a class="dropdown-item {{ ($localeModel->code == $locale) ? 'active' : '' }}" href="{{ '?admin_locale=' . $localeModel->code }}"><img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/img/flags/'.$localeModel->code.'.png') }}" alt="{{ $localeModel->code }}" class="me-2">{{ $localeModel->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle py-3" type="button" data-bs-toggle="dropdown"><i class="far fa-user-circle"></i><span class="d-none ms-2 d-lg-inline-block">{{ auth()->guard('admin')->user()->role['name'] }}</span></button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="px-3 small pb-2 border-bottom">
                                    <span class="text-secondary d-block">{{ __('admin::app.layouts.app-version', ['version' => 'v' . config('app.version')]) }}</span>
                                    <strong>{{ auth()->guard('admin')->user()->name }}</strong>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('shop.home.index') }}" target="_blank">{{ __('admin::app.layouts.visit-shop') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.subscription.plan.overview') }}">{{ trans('saassubscription::app.admin.layouts.subscription') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.account.edit') }}">{{ __('admin::app.layouts.my-account') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.session.destroy') }}">{{ __('admin::app.layouts.logout') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
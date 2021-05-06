{!! view_render_event('bagisto.shop.layout.header.account-item.before') !!}
    {{-- <login-header></login-header> --}}
{!! view_render_event('bagisto.shop.layout.header.account-item.after') !!}

<div class="topbar-login">
    <span class="dropdown-toggle">
        <i class="icon account-icon"></i>

        <span class="name">{{ __('shop::app.header.account') }}</span>

        <i class="icon arrow-down-icon"></i>
    </span>

    @guest('customer')
        <ul class="dropdown-list account guest">
            <li>
                <div>
                    <label style="color: #9e9e9e; font-weight: 700; text-transform: uppercase; font-size: 15px;">
                        {{ __('shop::app.header.title') }}
                    </label>
                    <hr>
                </div>

                <div style="margin-top: 5px;">
                    <span style="font-size: 12px;">{{ __('shop::app.header.dropdown-text') }}</span>
                </div>

                <div style="margin-top: 15px;">
                    <a class="btn btn-dark btn-md" href="{{ route('customer.session.index') }}" style="color: #ffffff">
                        {{ __('shop::app.header.sign-in') }}
                    </a>

                    <a class="btn btn-dark btn-md" href="{{ route('customer.register.index') }}" style="float: right; color: #ffffff">
                        {{ __('shop::app.header.sign-up') }}
                    </a>
                </div>
            </li>
        </ul>
    @endguest

    @auth('customer')
        <ul class="dropdown-list account customer">
            <li>
                <div>
                    <label style="color: #9e9e9e; font-weight: 700; text-transform: uppercase; font-size: 15px;">
                        {{ auth()->guard('customer')->user()->first_name }}
                    </label>
                </div>

                <ul>
                    <li>
                        <a href="{{ route('customer.profile.index') }}">{{ __('shop::app.header.profile') }}</a>
                    </li>

                    <li>
                        <a href="{{ route('customer.wishlist.index') }}">{{ __('shop::app.header.wishlist') }}</a>
                    </li>

                    <li>
                        <a href="{{ route('shop.checkout.cart.index') }}">{{ __('shop::app.header.cart') }}</a>
                    </li>

                    <li>
                        <a href="{{ route('customer.session.destroy') }}">{{ __('shop::app.header.logout') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    @endauth
</div>


<script type="text/x-template" id="login-header-template">
    <div class="dropdown">
        <div id="account" data-toggle="modal" data-target="#exampleModal">

            <div class="welcome-content pull-right text-right" @click="togglePopup">
                <i class="material-icons align-vertical-top"></i>
                <span class="text-center">
                    @guest('customer')
                        {{ __('velocity::app.header.welcome-message', ['customer_name' => trans('velocity::app.header.guest')]) }}!
                    @endguest

                    @auth('customer')
                        {{ __('velocity::app.header.welcome-message', ['customer_name' => auth()->guard('customer')->user()->first_name]) }}
                    @endauth
                </span>
                <span class="select-icon rango-arrow-down"></span>
            </div>
        </div>

        <!-- Modal -->

        <div class="account-modal sensitive-modal hide mt5">
            <!--Content-->
                @guest('customer')
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header no-border pb0">
                            <i class="icon icon-user"></i>
                            <label class="fs18 grey">{{ __('shop::app.header.title') }}</label>

                            <button type="button" class="close disable-box-shadow" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text fs20" @click="togglePopup">×</span>
                            </button>
                        </div>

                        <!--Body-->
                        <div class="p-2">
                            <span>{{ __('shop::app.header.dropdown-text') }}</span>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer">
                            <div>
                                <a href="{{ route('customer.session.index') }}">
                                    <button
                                        type="button"
                                        class="btn btn-secondary fs14 fw6">

                                        {{ __('shop::app.header.sign-in') }}
                                    </button>
                                </a>
                            </div>

                            <div>
                                <a href="{{ route('customer.register.index') }}">
                                    <button
                                        type="button"
                                        class="btn btn-secondary fs14 fw6">
                                        {{ __('shop::app.header.sign-up') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endguest

                @auth('customer')
                    <div class="modal-content customer-options">
                        <div class="customer-session">
                            <label class="">
                                {{ auth()->guard('customer')->user()->first_name }}
                            </label>
                        </div>

                        <ul type="none">
                            <li>
                                <a href="{{ route('customer.profile.index') }}" class="unset">{{ __('shop::app.header.profile') }}</a>
                            </li>

                            <li>
                                <a href="{{ route('customer.orders.index') }}" class="unset">{{ __('velocity::app.shop.general.orders') }}</a>
                            </li>

                            <li>
                                <a href="{{ route('customer.wishlist.index') }}" class="unset">{{ __('shop::app.header.wishlist') }}</a>
                            </li>

                            @php
                                $showCompare = core()->getConfigData('general.content.shop.compare_option') == "1" ? true : false
                            @endphp
                            
                            @if ($showCompare)
                                <li>
                                    <a href="{{ route('velocity.customer.product.compare') }}" class="unset">{{ __('velocity::app.customer.compare.text') }}</a>
                                </li>
                            @endif

                            <li>
                                <a href="{{ route('customer.session.destroy') }}" class="unset">{{ __('shop::app.header.logout') }}</a>
                            </li>
                        </ul>
                    </div>
                @endauth
            <!--/.Content-->
        </div>
        
    </div>
</script>

@push('scripts')
    <script type="text/javascript">

        Vue.component('login-header', {
            template: '#login-header-template',

            methods: {
                togglePopup: function (event) {
                    let accountModal = this.$el.querySelector('.account-modal');
                    let modal = $('#cart-modal-content')[0];

                    if (modal)
                        modal.classList.add('hide');

                    accountModal.classList.toggle('hide');

                    event.stopPropagation();
                }
            }
        })

    </script>
@endpush


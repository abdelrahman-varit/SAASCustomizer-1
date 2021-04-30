<form data-vv-scope="address-form" class="custom-form">
    <div class="form-container" v-if="!this.new_billing_address">
        <accordian
            :active="true"
            :title="'{{ __('shop::app.checkout.onepage.billing-address') }}'">

            <div class="form-header mb-30" slot="header">
                <h3 class="fw6 display-inbl">
                    {{ __('shop::app.checkout.onepage.billing-address') }}
                </h3>
                <i class="rango-arrow"></i>
            </div>

            <div slot="body">
                <div class="address-container row full-width no-margin">
                    <div
                        :key="index"
                        class="col-lg-12 col-md-12 address-holder pl0"
                        v-for='(addresses, index) in this.allAddress'>
                        <div class="card">
                            <div class="card-body row bg-light">

                                <div class="col-10 ml-4">

                                    <input
                                        type="radio"
                                        v-validate="'required'"
                                        name="billing[address_id]"
                                        :value="addresses.id"
                                        v-model="address.billing.address_id"
                                        @change="validateForm('address-form')"
                                        data-vv-as="&quot;{{ __('shop::app.checkout.onepage.billing-address') }}&quot;" />

                                    <span class="checkmark"></span>
                                    <span class="billing-title-span fs20">Select the following address</span> 
                                </div>
                                 

                                <div class="col-12 mt-3">
                                     
                                    <ul type="none" class="billing-address">
                                        <li class="col-12 mb-2">
                                            <label>Customer Name</label>
                                            <div class="border fs16 p-2 " >@{{ allAddress.first_name }} @{{ allAddress.last_name }}</div>
                                        </li>
                                        <li class="col-12 mb-2">
                                            <label>Address</label>
                                            <div class="border fs16 p-2 " >@{{addresses.address1}}</div>
                                        </li>
                                        <li class="col-12 mb-2">
                                            <label>City</label>
                                            <div class="border fs16 p-2" >@{{addresses.city}}</div>
                                        </li>
                                        <li class="col-12 mb-2">
                                            <label>State</label>
                                            <div class="border fs16 p-2" >@{{addresses.state}}</div>
                                        </li>
                                        <li class="col-12 mb-2">
                                            <label>Postcode</label>
                                            <div class="border fs16 p-2" >@{{addresses.postcode}} </div>
                                        </li>
                                         
                                        <li class="col-12 mb-2">
                                            <label>Country</label>
                                            <div class="border fs16 p-2 " >@{{addresses.country}} </div>
                                        </li>
                                         
                                        <li class="col-12 fs16">
                                            <label>{{ __('shop::app.customer.account.address.index.contact') }}</label>
                                            <div class="border fs16 p-2" >@{{addresses.phone}} </div>
                                        </li>
                                         
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 address-holder ">
                        <div class="card">
                            <div
                                @click="validateFormAfterAction"
                                class="card-body add-address-button btn btn-dark">
                                <div class="cursor-pointer " @click="newBillingAddress()">
                                    <i class="material-icons">
                                        add_circle_outline
                                    </i>
                                    <span>{{ __('shop::app.checkout.onepage.new-address') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div :class="`col-12 mt15 has-error ${errors.has('address-form.billing[address_id]') ? 'has-error' : ''}`">
                    <span
                        class="control-error"
                        v-if="errors.has('address-form.billing[address_id]')">
                        @{{ errors.first('address-form.billing[address_id]') }}
                    </span>
                </div>

                @if ($cart->haveStockableItems())
                    <div class="mt10 mb10" v-if="address.billing.address_id">
                        <span class="checkbox fs16 display-inbl">
                            <input
                                class="ml0"
                                type="checkbox"
                                id="billing[use_for_shipping]"
                                name="billing[use_for_shipping]"
                                @change="validateFormAfterAction"
                                v-model="address.billing.use_for_shipping" />

                            <span class="ml-5">
                                {{ __('shop::app.checkout.onepage.use_for_shipping') }}
                            </span>
                        </span>
                    </div>
                @endif
            </div>
        </accordian>
    </div>

    <div class="form-container" v-else>
        <accordian :title="'{{ __('shop::app.checkout.onepage.billing-address') }}'" :active="true">
            <div class="form-header" slot="header">
                <h3 class="fw6 display-inbl">
                   {{ __('shop::app.checkout.onepage.billing-address') }}
                </h3>

                <i class="rango-arrow"></i>
            </div>


            <div class="col-12 no-padding bg-light p-4" slot="body">
                @auth('customer')
                    @if(count(auth('customer')->user()->addresses))
                        <a
                            class="theme-btn light pull-right text-up-14"
                            @click="backToSavedBillingAddress()">

                            {{ __('shop::app.checkout.onepage.back') }}
                        </a>
                    @endif
                @endauth

                @include('shop::checkout.onepage.customer-new-form', [
                    'billing' => true
                ])
            </div>
        </accordian>
    </div>

    @if ($cart->haveStockableItems())
        <div
            class="form-container"
            v-if="!address.billing.use_for_shipping && !this.new_shipping_address">

            <accordian
                :active="true"
                :title="'{{ __('shop::app.checkout.onepage.shipping-address') }}'">

                <div class="form-header mb-30" slot="header">
                    <h3 class="fw6 display-inbl">
                        {{ __('shop::app.checkout.onepage.shipping-address') }}
                    </h3>
                    <i class="rango-arrow"></i>
                </div>

                <div class="address-container row mb30 remove-padding-margin" slot="body">
                    <div
                        class="col-lg-6 address-holder pl0"
                        v-for='(addresses, index) in this.allAddress'>

                        <div class="card">
                            <div class="card-body row">
                                <div class="col-1">
                                    <input
                                        type="radio"
                                        v-validate="'required'"
                                        :value="addresses.id"
                                        name="shipping[address_id]"
                                        v-model="address.shipping.address_id"
                                        @change="validateForm('address-form')"
                                        data-vv-as="&quot;{{ __('shop::app.checkout.onepage.shipping-address') }}&quot;" />

                                    <span class="checkmark"></span>
                                </div>

                                <div class="col-10">
                                    <h5 class="card-title fw6">
                                        @{{ allAddress.first_name }} @{{ allAddress.last_name }},
                                    </h5>

                                    <ul type="none">
                                        <li>@{{ addresses.address1 }},</li>
                                        <li>@{{ addresses.city }},</li>
                                        <li>@{{ addresses.state }},</li>
                                        <li>@{{ addresses.country }} @{{ addresses.postcode }}</li>
                                        <li>
                                            {{ __('shop::app.customer.account.address.index.contact') }} : @{{ addresses.phone }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 address-holder pl0">
                        <div class="card">
                            <div
                                @click="validateFormAfterAction"
                                class="card-body add-address-button">
                                <div class="cursor-pointer" @click="newShippingAddress()">
                                    <i class="material-icons">
                                        add_circle_outline
                                    </i>
                                    <span>{{ __('shop::app.checkout.onepage.new-address') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div :class="`col-12 mt15 has-error pl0 ${errors.has('address-form.shipping[address_id]') ? 'has-error' : ''}`">
                        <span class="control-error" v-if="errors.has('address-form.shipping[address_id]')">
                            @{{ errors.first('address-form.shipping[address_id]') }}
                        </span>
                    </div>
                </div>
            </accordian>
        </div>

        <div
            class="form-container"
            v-if="!address.billing.use_for_shipping && this.new_shipping_address">

            <accordian
                :active="true"
                :title="'{{ __('shop::app.checkout.onepage.shipping-address') }}'">

                <div class="form-header" slot="header">
                    <h3 class="fw6 display-inbl">
                        {{ __('shop::app.checkout.onepage.shipping-address') }}
                    </h3>
                    <i class="rango-arrow"></i>
                </div>

                <div class="col-12 no-padding bg-light p-4" slot="body">
                    @auth('customer')
                        @if(count(auth('customer')->user()->addresses))
                            <a
                                class="theme-btn light pull-right text-up-14"
                                @click="backToSavedShippingAddress()">

                                {{ __('shop::app.checkout.onepage.back') }}
                            </a>
                        @endif
                    @endauth

                    @include('shop::checkout.onepage.customer-new-form', [
                        'shipping' => true
                    ])
                </div>
            </accordian>
        </div>
    @endif
</form>
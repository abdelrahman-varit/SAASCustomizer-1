@extends('superlandpage_view::superlandpage.layouts.master')

@php
    $channel = company()->getCurrentChannel();
    
    if ( $channel ) {
        $homeSEO = $channel->home_seo;

        if (isset($homeSEO)) {
            $homeSEO = json_decode($channel->home_seo);

            //$metaTitle = $homeSEO->meta_title;
            $metaTitle = "BuyNoir - registration for opening new shop";

            //$metaDescription = $homeSEO->meta_description;
            $metaDescription = "BuyNoir - registration for opening new shop, No coding required. Simply choose the template that matches your style, add your branding and products and start selling your stuff";

            //$metaKeywords = $homeSEO->meta_keywords;
            $metaKeywords = "BuyNoir - registration for opening new shop";
        }
    }
@endphp

@section('page_title')
    {{ isset($metaTitle) ? $metaTitle : "" }}
    
@endsection

@section('head')

    @if (isset($homeSEO))
        @isset($metaTitle)
            <meta name="title" content="{{ $metaTitle }}" />
        @endisset

        @isset($metaDescription)
            <meta name="description" content="{{ $metaDescription }}" />
        @endisset

        @isset($metaKeywords)
            <meta name="keywords" content="{{ $metaKeywords }}" />
        @endisset
    @endif



@endsection

@section('content-wrapper')

    {!! view_render_event('bagisto.saas.companies.home.content.before') !!}

    <div class="container">
        <div class="row">
            <div class="col-12 mt-3 mb-5 text-end">
                <a href="{{ config('app.url') }}"><i class='bx bx-x'></i></a>
            </div>
            <div class="col-12">
                <seller-registration></seller-registration>
            </div>
        </div>
    </div>
 
    @push('scripts')
        <script type="text/x-template" id="seller-registration">
            <div class="company-content" id="buynoir-shop-registration">
                <div class="text-center">
                    <a href="{{ route('buynoir.home.index') }}" class="d-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="130" height="34.126" viewBox="0 3.026 130 34.126" xmlns:v="https://vecta.io/nano"><path d="M9.632 4.091c5.089 0 8.033 2.975 8.033 6.979 0 2.682-1.672 4.886-3.78 5.583 2.326.551 4.58 2.718 4.58 6.098 0 4.261-3.198 7.383-8.069 7.383H0V4.091h9.632zm-.909 10.432c1.999 0 3.308-1.065 3.308-2.828 0-1.69-1.127-2.792-3.38-2.792H5.597v5.62h3.126zm.473 10.874c2.217 0 3.562-1.175 3.562-3.049 0-1.8-1.309-3.049-3.562-3.049H5.597v6.098h3.599zm22.185 2.9c-.945 1.58-3.017 2.241-4.834 2.241-4.398 0-6.869-3.233-6.869-7.126V11.877h5.525v10.359c0 1.763.945 3.159 2.908 3.159 1.854 0 3.017-1.286 3.017-3.122V11.877h5.525v14.987a28.73 28.73 0 0 0 .182 3.269h-5.307c-.074-.33-.147-1.359-.147-1.836zm9.485 8.854l4.107-9.477-7.596-15.795h6.179l4.398 9.771 3.998-9.771h5.852L46.682 37.151h-5.816zm34.214-7.016L64.467 13.017v17.118H58.76V4.091h6.979l9.668 15.832V4.091h5.743v26.044h-6.07zm26.806-9.146c0 5.657-4.18 9.698-9.596 9.698-5.379 0-9.596-4.041-9.596-9.698s4.216-9.661 9.596-9.661c5.416 0 9.596 4.004 9.596 9.661zm-5.524 0c0-3.086-1.963-4.518-4.071-4.518-2.072 0-4.071 1.433-4.071 4.518 0 3.049 1.999 4.555 4.071 4.555 2.108 0 4.071-1.47 4.071-4.555zm9.747-17.963c1.817 0 3.271 1.469 3.271 3.269s-1.454 3.269-3.271 3.269c-1.745 0-3.199-1.469-3.199-3.269s1.454-3.269 3.199-3.269zm-2.726 27.109V11.879h5.525v18.257h-5.525zm19.64-12.746c-.618-.147-1.2-.184-1.745-.184-2.217 0-4.216 1.322-4.216 4.959v7.971h-5.525V11.879h5.343v2.461c.945-2.057 3.235-2.645 4.689-2.645.545 0 1.09.073 1.454.184v5.51z" fill="#0ea1e2"/><path fill="#1964bc" d="M126.992 24.155c1.65 0 3.008 1.357 3.008 3.008s-1.357 2.972-3.008 2.972a2.96 2.96 0 0 1-2.972-2.972c0-1.651 1.321-3.008 2.972-3.008z"/></svg>
                    </a>
                </div>
                
                <div class="form-container col-lg-6 mx-auto">
                    <form class="registration" data-vv-scope="step-one" v-if="step_one" @submit.prevent="validateForm('step-one')">
                        <h4 class="mt-3 mb-5 text-center">Launch your online business now.<br/>Free for 10 days</h4>
                        <div class="form-group mb-3" :class="[errors.has('step-one.email') ? 'has-error' : '']">
                            <input type="text" v-validate="'required|email|max:191'" class="form-control" v-model="email" name="email" data-vv-as="&quot;{{ __('saas::app.tenant.registration.email') }}&quot;" placeholder="Email Address">
                            <span class="text-danger small d-block mt-1" v-show="errors.has('step-one.email')">@{{ errors.first('step-one.email') }}</span>
                        </div>

                        <div class="form-group mb-3" :class="[errors.has('step-one.password') ? 'has-error' : '']">
                            {{-- <label for="password" class="required">{{ __('saas::app.tenant.registration.password') }}</label> --}}

                            <input type="password" name="password" v-validate="'required|min:6'" ref="password" class="form-control" v-model="password" placeholder="Password" data-vv-as="&quot;{{ __('saas::app.tenant.registration.password') }}&quot;">

                            <span class="text-danger small d-block mt-1" v-show="errors.has('step-one.password')">@{{ errors.first('step-one.password') }}</span>
                        </div>

                        <div class="form-group mb-3" :class="[errors.has('step-one.password_confirmation') ? 'has-error' : '']">
                            {{-- <label for="password_confirmation" class="required">{{ __('saas::app.tenant.registration.cpassword') }}</label> --}}

                            <input type="password" v-validate="'required|min:6|confirmed:password'" class="form-control" v-model="password_confirmation" name="password_confirmation" placeholder="Confirm Password" data-vv-as="&quot;{{ __('saas::app.tenant.registration.cpassword') }}&quot;">

                            <span class="text-danger small d-block mt-1" v-show="errors.has('step-one.password_confirmation')">@{{ errors.first('step-one.password_confirmation') }}</span>
                        </div>

                        <!-- @if(company()->getSuperConfigData('general.design.promo-code.promo-enable') && company()->getSuperConfigData('general.design.promo-code.promo-code'))
                        <div class="form-group mb-3" :class="[errors.has('step-one.promo_code') ? 'has-error' : '']">
                            <input type="text"  v-validate="'min:6'" class="form-control" v-model="promo_code" name="promo_code" placeholder="Promo Code" data-vv-as="&quot;{{ __('saas::app.tenant.registration.promo_code') }}&quot;">
                            <span class="text-danger small d-block mt-1" v-show="errors.has('step-one.promo_code')">@{{ errors.first('step-one.promo_code') }}</span>
                        </div>
                        @endif -->
                        <div class="text-end form-group mb-3">
                            
                            <!-- <input type="submit" class="btn btn-lg btn-primary" :disabled="errors.has('password') || errors.has('password_confirmation') || errors.has('email')"  value="Continue"> -->
                            <button class="btn default-btn" :disabled="errors.has('step-one.password') || errors.has('step-one.password_confirmation') || errors.has('step-one.email')">{{ __('saas::app.tenant.registration.continue') }}</button>
                        </div>
                    </form>

                    <form class="registration" @submit.prevent="validateForm('step-two')" data-vv-scope="step-two" v-show="step_two">
                        <div class="step-two">
                            <h4 class="mt-3 mb-5 text-center">Tell us about you</h4>

                            <div class="form-group mb-3" :class="[errors.has('step-two.first_name') ? 'has-error' : '']" >
                                {{-- <label for="first_name" class="required">{{ __('saas::app.tenant.registration.first-name') }}</label> --}}

                                <input type="text" class="form-control" v-model="first_name" name="first_name" placeholder="First Name" v-validate="'required|alpha_spaces'" data-vv-as="&quot;{{ __('saas::app.tenant.registration.first-name') }}&quot;">

                                <span class="text-danger small d-block mt-1" v-show="errors.has('step-two.first_name')">@{{ errors.first('step-two.first_name') }}</span>
                            </div>

                            <div class="form-group mb-3" :class="[errors.has('step-two.last_name') ? 'has-error' : '']">
                                {{-- <label for="last_name">{{ __('saas::app.tenant.registration.last-name') }}</label> --}}

                                <input type="text" class="form-control" name="last_name" v-model="last_name" placeholder="{{ __('saas::app.tenant.registration.last-name') }}" v-validate="'alpha_spaces'" data-vv-as="&quot;{{ __('saas::app.tenant.registration.first-name') }}&quot;">

                                <span class="text-danger small d-block mt-1" v-show="errors.has('step-two.last_name')">@{{ errors.first('step-two.last_name') }}</span>
                            </div>

                            <div class="form-group mb-3" :class="[errors.has('step-two.phone_no') ? 'has-error' : '']">
                                {{-- <label for="phone_no" class="required">{{ __('saas::app.tenant.registration.phone') }}</label> --}}

                                <input type="text" class="form-control" pattern="[-+]?\d*" name="phone_no" v-model="phone_no" placeholder="Phone Number" v-validate="'required|numeric'" data-vv-as="&quot;{{ __('saas::app.tenant.registration.phone') }}&quot;">

                                <span class="text-danger small d-block mt-1" v-show="errors.has('step-two.phone_no')">@{{ errors.first('step-two.phone_no') }}</span>
                            </div>

                            <div class="text-end form-group mb-3">
                                <button class="btn default-btn" :disabled="errors.has('first_name') || errors.has('last_name') || errors.has('step-two.phone_no')">{{ __('saas::app.tenant.registration.next') }}</button>
                            </div>
                        </div>
                    </form>

                    <form class="registration" @submit.prevent="validateForm('step-three')" data-vv-scope="step-three" v-show="step_three">
                        <div class="step-three">
                            <h4 class="mt-3 mb-5 text-center">Last step<br>ok, let's talk about your store</h4>

                            <div class="form-group mb-3" :class="[errors.has('step-three.username') ? 'has-error' : '']">
                                <input type="text" class="form-control" name="username" v-model="username" placeholder="{{ __('saas::app.tenant.registration.username') }}" v-validate="'required|alpha_spaces'" data-vv-as="&quot;{{ __('saas::app.tenant.registration.username') }}&quot;">
                                <span class="text-danger small d-block mt-1" v-show="errors.has('step-three.username')">@{{ errors.first('step-three.username') }}</span>
                            </div>

                            <div class="form-group mb-3" :class="[errors.has('step-three.productcategory') ? 'has-error' : '']">
                                <select class="form-control" name="productcategory" v-model="productcategory" v-validate="'required'" >
                                    <option value="" selected>{{ __('saas::app.tenant.registration.org-name') }}</option>
                                    <option value="Clothing">Clothing</option>
                                    <option value="CBD Products">CBD Products</option>
                                    <option value="Food and Beverage">Food and Beverage</option>
                                    <option value="Health and Beauty">Health and Beauty</option>
                                    <option value="Home Decor">Home Decor</option>
                                    <option value="Jewelry">Jewelry</option>
                                    <option value="Services">Services</option>
                                    <option value="Other Goods">Other Goods</option>
                                    <option value="Others">Others</option>
                                </select>
                                <span class="text-danger small d-block mt-1" v-show="errors.has('step-three.productcategory')">@{{ errors.first('step-three.productcategory') }}</span>
                            </div>

                            <div class="form-group mb-3" :class="[errors.has('step-three.name') ? 'has-error' : '']">
                                <label for="elsebusiness" class="">{{ __('saas::app.tenant.registration.else-business') }}</label>
                                <div class="mt-3 row">
                                    <div class="col-md-4">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" id="elsebusinessStart" name="elsebusiness" v-model="elsebusinessStart" value="START"  v-validate="''" data-vv-as="&quot;{{ __('saas::app.tenant.registration.else-business') }}&quot;"> {{ __('saas::app.tenant.registration.just-start') }}
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" id="elsebusinessMoving" name="elsebusiness" v-model="elsebusinessStart" value="MOVING" v-validate="''" data-vv-as="&quot;{{ __('saas::app.tenant.registration.else-business') }}&quot;"> {{ __('saas::app.tenant.registration.else-moving') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end form-group mb-3">
                                <button class="btn default-btn" :disabled="errors.has('step-three.username') || errors.has('step-three.name') || createdclicked" style="font-size:18px">{{ __('saas::app.tenant.registration.create-store') }}</button>
                            </div>
                        </div>
                    </form>

                    <form class="registration" data-vv-scope="step-four" v-show="step_four" id="formStepFour">
                        <div class="step-three">
                            <h4 class="mt-3 mb-5 text-center">{{ __('saas::app.tenant.registration.congrats-title') }}<br>{{ __('saas::app.tenant.registration.congrats-subtitle') }}</h4>
                            <p class="m-0 text-center">{{ __('saas::app.tenant.registration.congrats-description') }}</p>
                            <div class="text-center my-5" :class="[errors.has('step-three.username') ? 'has-error' : '']">
                                <img src="{{ asset('buynoir/superlandpage/assets/img/congrats.gif') }}" alt="{{ config('app.name') }}" style="height:50vh"/>
                            </div>
                            <div class="text-center row" style="display:none">
                                <div class="col-6">
                                    <a v-bind:href="redirectUrlShop" class="btn default-btn" id="btn-congrts" style="font-size:18px">{{ __('saas::app.tenant.registration.visit-shop') }}</a>
                                </div>
                                <div class="col-6">
                                    <a v-bind:href="redirectUrlAdmin" class="btn default-btn" style="font-size:18px">{{ __('saas::app.tenant.registration.login-admin') }}</a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <ul class="my-5 p-0 list-unstyled step-list registration-ul d-flex justify-content-center gap-3" v-bind:style="step_four?'display:none':''">
                        <li class="registration-step-item" :class="{ active: isOneActive }" v-on:click="stepNav(1)"></li>
                        <li class="registration-step-item" :class="{ active: isTwoActive }" v-on:click="stepNav(2)"></li>
                        <li class="registration-step-item" :class="{ active: isThreeActive }" v-on:click="stepNav(3)"></li>
                    </ul>

                </div>
            </div>
        </script>

        <script>
            
            var vDate = new Date();
            var nDigit = "BuyNoir-"+vDate.getTime();
            var registration = Vue.component('seller-registration', {
                template: '#seller-registration',
                inject: ['$validator'],
                data: () => ({
                    data_seed_url: @json(route('company.create.data')),
                    step_one: true,
                    step_two: false,
                    step_three: false,
                    step_four: false,
                    email: null,
                    password: null,
                    password_confirmation: null,
                    promo_code: null,
                    first_name: null,
                    last_name: null,
                    phone_no: null,
                    name: "",
                    productcategory: "",
                    elsebusinessStart: "START",
                    username: null,
                    createdclicked: false,
                    registrationData: {},
                    result: [],
                    isOneActive: false,
                    isTwoActive: false,
                    isThreeActive: false,
                    redirectUrlShop:"./",
                    redirectUrlAdmin:"./admin"
                }),

                mounted() {
                    this.isOneActive = true;
                },

                methods: {
                    validateForm: function(scope) {
                        var this_this = this;
                        this.$validator.validateAll(scope).then(function (result) {

                            if (result) {
                                if (scope == 'step-one') {
                                    this_this.catchResponseOne();
                                } else if (scope == 'step-two') {
                                    this_this.catchResponseTwo();
                                } else if (scope == 'step-three') {
                                    this_this.catchResponseThree();
                                }
                            }
                        });
                    },

                    stepNav(step) {
                        if (step == 1) {
                            if (this.isThreeActive == true || this.isTwoActive == true){
                                this.step_three = false;
                                this.step_two = false;
                                this.step_one = true;

                                this.isThreeActive = false;
                                this.isTwoActive = false;
                                this.isOneActive = true;
                            }
                        } else if (step == 2) {
                            if (this.isThreeActive == true){
                                this.step_three = false;
                                this.step_one = false;
                                this.step_two = true;

                                this.isThreeActive = false;
                                this.isOneActive = false;
                                this.isTwoActive = true;
                            }
                        }
                    },

                    catchResponseOne () {
                        var o_this = this;

                        axios.post('{{ route('company.validate.step-one') }}', {
                            email: this.email,
                            password: this.password,
                            password_confirmation: this.password_confirmation,
                            promo_code: o_this.promo_code,
                        }).then(function (response) {
                            o_this.step_two = true;
                            o_this.step_one = false;
                            o_this.isOneActive = false;
                            o_this.isTwoActive = true;

                            o_this.errors.clear();
                        }).catch(function (errors) {
                            serverErrors = errors.response.data.errors;

                            o_this.$root.addServerErrors('step-one');
                        });
                    },

                    catchResponseTwo () {
                        this.step_three = true;
                        this.step_two = false;
                        this.isTwoActive = false;
                        this.isThreeActive = true;
                    },

                    catchResponseThree () {
                        this.createdclicked = true;
                        var o_this = this;
                        var storeNameTmp = this.username.split(' ').join(''); 
                        
                        axios.post('{{ route('company.validate.step-three') }}', {
                            username: storeNameTmp,
                            name: storeNameTmp,
                            productcategory: this.productcategory,
                        }).then(function (response) {
                            o_this.errors.clear();
                            o_this.sendDataToServer();
                        }).catch(function (errors) {
                            serverErrors = errors.response.data.errors;
                            o_this.createdclicked = false;
                            o_this.$root.addServerErrors('step-three');
                        });
                    },

                    handleErrorResponse (response, scope) {
                        serverErrors = response.data.errors;
                        this.$root.addServerErrors(scope);
                    },

                    sendDataToServer () {
                        var o_this = this;
                        var usernameTm = this.username.split(' ').join(''); 
                        return axios.post('{{ route('company.create.store') }}', {
                            email: this.email,
                            first_name: this.first_name,
                            last_name: this.last_name,
                            phone_no: this.phone_no,
                            password: this.password,
                            password_confirmation: this.password_confirmation,
                            name: this.username,
                            promo_code: this.promo_code,
                            productcategory: this.productcategory,
                            username: usernameTm,
                            elsebusinessStart: this.elsebusinessStart
                        }).then(function (response) {
                        //   window.location.href = response.data.redirect;
                        const regis = document.getElementById("regisCloseLink");
                        if(regis){
                            regis.style.display="none";
                        } 
                        o_this.step_one   = false;
                        o_this.step_two   = false;
                        o_this.step_three = false;
                        o_this.step_four  = true;
                        

                        //this.redirectUrlShop = response.data.redirectShop;
                        //this.redirectUrlAdmin = response.data.redirectAdmin;
                        setTimeout(function(){
                            console.log("success registration");
                            //this.step_four = false;
                            window.location.href = response.data.redirect;
                        },3000);
                        
                        
                        }).catch(function (errors) {
                            console.log(errors);
                            serverErrors = errors.response.data.errors;

                            o_this.createdclicked = false;

                            for (i in serverErrors) {
                                window.flashMessages = [{'type': 'alert-error', 'message': serverErrors[i]}];
                            }

                            o_this.$root.addFlashMessages();
                            o_this.$root.addServerErrors('step-one');
                            o_this.$root.addServerErrors('step-two');
                            o_this.$root.addServerErrors('step-three');
                        });
                    }
                }
            });

            setTimeout(function(){
                var elseStart = document.getElementById('elsebusinessStart');
                if(elseStart){
                    elseStart.checked=true;
                }
            },1500);
            

        </script>
    @endpush

    {{ view_render_event('bagisto.saas.companies.home.content.after') }}

@endsection
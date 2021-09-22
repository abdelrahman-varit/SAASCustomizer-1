@extends('admin::layouts.master-two')

@php
    $channel = company()->getCurrentChannel();
    
    if ( $channel ) {
        $homeSEO = $channel->home_seo;

        if (isset($homeSEO)) {
            $homeSEO = json_decode($channel->home_seo);

            //$metaTitle = $homeSEO->meta_title;
            $metaTitle = "BuyNoir - Signin Page";

            //$metaDescription = $homeSEO->meta_description;
            $metaDescription = "BuyNoir - Signin Page, No coding required. Simply choose the template that matches your style, add your branding and products and start selling your stuff";

            //$metaKeywords = $homeSEO->meta_keywords;
            $metaKeywords = "BuyNoir - Signin Page";
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
			<div class="col">
				<div class="py-5"></div>
				<buynoir-signin></buynoir-signin>
				<div class="py-5"></div>
			</div>
		</div>
	</div>

    @push('scripts')
        <script type="text/x-template" id="buynoir-signin">
            <div class="p-0 company-content" id="buynoir-shop-registration">
                
                <div class="text-center">
					<a href="{{ route('buynoir.home.index') }}" class="d-inline-block">
						<svg xmlns="http://www.w3.org/2000/svg" width="130" height="34.126" viewBox="0 3.026 130 34.126" xmlns:v="https://vecta.io/nano"><path d="M9.632 4.091c5.089 0 8.033 2.975 8.033 6.979 0 2.682-1.672 4.886-3.78 5.583 2.326.551 4.58 2.718 4.58 6.098 0 4.261-3.198 7.383-8.069 7.383H0V4.091h9.632zm-.909 10.432c1.999 0 3.308-1.065 3.308-2.828 0-1.69-1.127-2.792-3.38-2.792H5.597v5.62h3.126zm.473 10.874c2.217 0 3.562-1.175 3.562-3.049 0-1.8-1.309-3.049-3.562-3.049H5.597v6.098h3.599zm22.185 2.9c-.945 1.58-3.017 2.241-4.834 2.241-4.398 0-6.869-3.233-6.869-7.126V11.877h5.525v10.359c0 1.763.945 3.159 2.908 3.159 1.854 0 3.017-1.286 3.017-3.122V11.877h5.525v14.987a28.73 28.73 0 0 0 .182 3.269h-5.307c-.074-.33-.147-1.359-.147-1.836zm9.485 8.854l4.107-9.477-7.596-15.795h6.179l4.398 9.771 3.998-9.771h5.852L46.682 37.151h-5.816zm34.214-7.016L64.467 13.017v17.118H58.76V4.091h6.979l9.668 15.832V4.091h5.743v26.044h-6.07zm26.806-9.146c0 5.657-4.18 9.698-9.596 9.698-5.379 0-9.596-4.041-9.596-9.698s4.216-9.661 9.596-9.661c5.416 0 9.596 4.004 9.596 9.661zm-5.524 0c0-3.086-1.963-4.518-4.071-4.518-2.072 0-4.071 1.433-4.071 4.518 0 3.049 1.999 4.555 4.071 4.555 2.108 0 4.071-1.47 4.071-4.555zm9.747-17.963c1.817 0 3.271 1.469 3.271 3.269s-1.454 3.269-3.271 3.269c-1.745 0-3.199-1.469-3.199-3.269s1.454-3.269 3.199-3.269zm-2.726 27.109V11.879h5.525v18.257h-5.525zm19.64-12.746c-.618-.147-1.2-.184-1.745-.184-2.217 0-4.216 1.322-4.216 4.959v7.971h-5.525V11.879h5.343v2.461c.945-2.057 3.235-2.645 4.689-2.645.545 0 1.09.073 1.454.184v5.51z" fill="#0ea1e2"/><path fill="#1964bc" d="M126.992 24.155c1.65 0 3.008 1.357 3.008 3.008s-1.357 2.972-3.008 2.972a2.96 2.96 0 0 1-2.972-2.972c0-1.651 1.321-3.008 2.972-3.008z"/></svg>
					</a>
				</div>

                <div class="form-container col-lg-6 mx-auto">
                    <form id="form-step-two" class="p-0 registration" method="POST" action="{{ route('admin.session.store') }}" >
                        @csrf
                        <h4 class="mt-3 mb-5 text-center">Enter your password for shop panel</h4>

                        <div class="form-group mb-3">
                            <input type="hidden" v-validate="'required|email|max:191'" class="form-control" :class="[errors.has('step-two.email') ? 'is-invalid' : '']" value="{{session()->get('email')}}" name="email" required>
                            <input type="hidden" v-validate="'required'" class="form-control" :class="[errors.has('step-two.email') ? 'is-invalid' : '']" value="{{session()->get('company_name')}}" name="company_name" required>
                            <span class="invalid-feedback" v-show="errors.has('step-two.email')">@{{ errors.first('step-two.email') }}</span>
                        </div>

                        <div class="form-group mb-3">
                            <input type="password" name="password" v-validate="'required|min:6'" ref="password" class="form-control" :class="[errors.has('step-two.password') ? 'is-invalid' : '']" v-model="password" placeholder="Password" data-vv-as="&quot;{{ __('saas::app.tenant.registration.password') }}&quot;" required>
                            <span class="invalid-feedback" v-show="errors.has('step-two.password')">@{{ errors.first('step-two.password') }}</span>
                        </div>

                        <div class="form-group mb-3">
                            <a href="{{ route('admin.forget-password.create') }}" class="text-orange"><strong>{{ __('admin::app.users.sessions.forget-password-link-title') }}</strong></a>
                        </div>

                        <div class="text-center text-md-end form-group mb-3">
                            <button class="btn default-btn registration-btn" :disabled="errors.has('first_name') || errors.has('last_name') || errors.has('step-two.phone_no')">{{ __('saas::app.tenant.registration.signin-now') }}</button>
                        </div>
                    </form>
    
                    <ul class="my-5 p-0 list-unstyled step-list registration-ul d-flex justify-content-center gap-3" v-bind:style="step_four?'display:none':''">
                        <li class="registration-step-item" :class="{ active: isOneActive }" v-on:click="stepNav(1)"></li>
                        <li class="registration-step-item" :class="{ active: isTwoActive }" v-on:click="stepNav(2)"></li>
                        <!-- <li class="registration-step-item" :class="{ active: isThreeActive }" v-on:click="stepNav(3)"></li> -->
                    </ul>
    
                    @if (company()->getSuperConfigData('general.content.footer.footer_toggle'))
                        <p class="m-0 text-center">
                            @if (company()->getSuperConfigData('general.content.footer.footer_content'))
                                {{ company()->getSuperConfigData('general.content.footer.footer_content') }}
                            @else
                                {!! trans('admin::app.footer.copy-right') !!}
                            @endif
                        </p>
                    @endif
                </div>

            </div>
        </script>

        <script>
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var vDate = new Date();
            var nDigit = "BuyNoir-"+vDate.getTime();
            var registration = Vue.component('buynoir-signin', {
                template: '#buynoir-signin',
                inject: ['$validator'],
                data: () => ({
                    data_seed_url: @json(route('company.create.data')),
                    step_one: false,
                    step_two: true,
                    step_three: false,
                    step_four: false,
                    email: null,
                    password: null,
                    
                    company_name: null,
                    
                
                    elsebusinessStart: "START",
                    
                    result: [],
                    isOneActive: false,
                    isTwoActive: true,
                    isThreeActive: false,
                    redirectUrlShop:"./",
                    redirectUrlAdmin:"./admin",
                    token   : csrf_token,
                }),

                mounted() {
                    this.isTwoActive = true;
                },
                
                methods: {
                    validateForm: function(scope) {
                        var this_this = this;
                        this.$validator.validateAll(scope).then(function (result) {
                            console.log(result);
                            if (result) {
                                if (scope == 'step-one') {
                                    this_this.catchResponseOne();
                                } else if (scope == 'step-two') {
                                    var form = document.getElementById('form-step-two');
                                    form.method="post";
                                    form.submit();
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

                        axios.post('{{ route('company.signin.step-one') }}', {
                            email: this.email
                        }).then(function (response) {
                            o_this.step_two = true;
                            o_this.step_one = false;
                            o_this.isOneActive = false;
                            o_this.isTwoActive = true;
                            o_this.company_name = response.data.companies[0].domain
                            o_this.errors.clear();
                        //   console.log('success:', response.data)
                        //   console.log('company name:', response.data.companies[0].domain)
                        }).catch(function (errors) {
                        //   console.log('errors: ', errors);
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

                
                    handleErrorResponse (response, scope) {
                        serverErrors = response.data.errors;
                        this.$root.addServerErrors(scope);
                    },

                }
            });


        </script>
    @endpush
    

    {{ view_render_event('bagisto.saas.companies.home.content.after') }}

@endsection



@extends('superlandpage_view::superlandpage.layouts.master')

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
						<img src="{{ asset('vendor/webkul/ui/assets/images/logo.png') }}" alt="{{ config('app.name') }}">
					</a>
				</div>


				<div class="form-container col-lg-6 mx-auto">
					<form class="registration" data-vv-scope="step-one" v-if="step_one" @submit.prevent="validateForm('step-one')">
						<h4 class="mt-3 mb-5 text-orange text-center">Sign into your Shop</h4>
						<div class="form-group mb-3" :class="[errors.has('step-one.email') ? 'has-error' : '']">
							<input type="text" v-validate="'required|email|max:191'" class="form-control" v-model="email" name="email" data-vv-as="&quot;{{ __('saas::app.tenant.registration.email') }}&quot;" placeholder="Email Address">
							<span class="text-danger small d-block mt-1" v-show="errors.has('step-one.email')">@{{ errors.first('step-one.email') }}</span>
						</div>
						<div class="text-center text-md-end form-group mb-3">
								<!-- <input type="submit" class="btn btn-lg btn-primary" :disabled="errors.has('password') || errors.has('password_confirmation') || errors.has('email')"  value="Continue"> -->
								<button class="btn default-btn" :disabled="errors.has('step-one.password') || errors.has('step-one.password_confirmation') || errors.has('step-one.email')">{{ __('saas::app.tenant.registration.signin-next') }}</button>
						</div>
					</form>

					<form id="form-step-two" class="p-0 registration" @submit.prevent="validateForm('step-two')" :action="'//'+company_name+'/admin/login'" data-vv-scope="step-two" v-show="step_two" method="post">
						@csrf
						<div class="step-two">
							<h4 class="mt-3 mb-5 text-orange text-center">Enter your password for shop panel</h4>
							
							<div class="form-group mb-3" :class="[errors.has('step-two.email') ? 'has-error' : '']">
								<input type="hidden" v-validate="'required|email|max:191'" class="form-control" v-model="email" name="email" data-vv-as="&quot;{{ __('saas::app.tenant.registration.email') }}&quot;" placeholder="Email Address" readonly>
								<input type="hidden" v-validate="'required'" class="form-control" v-model="company_name" name="company_name" data-vv-as="&quot;{{ __('saas::app.tenant.registration.email') }}&quot;" placeholder="Email Address" readonly>
								<span class="text-danger small d-block mt-1" v-show="errors.has('step-two.email')">@{{ errors.first('step-two.email') }}</span>
							</div>

							<div class="form-group mb-3" :class="[errors.has('step-two.password') ? 'has-error' : '']">
								<input type="password" name="password" v-validate="'required|min:6'" ref="password" class="form-control" v-model="password" placeholder="Password" data-vv-as="&quot;{{ __('saas::app.tenant.registration.password') }}&quot;">
								<span class="text-danger small d-block mt-1" v-show="errors.has('step-two.password')">@{{ errors.first('step-two.password') }}</span>
							</div>

							<div class="form-group mb-3">
								<a :href="'//'+company_name+'/admin/forget-password'" class="text-orange"><strong>{{ __('admin::app.users.sessions.forget-password-link-title') }}</strong></a>
							</div>
							
							<div class="text-center text-md-end form-group mb-3">
								<button  class="btn default-btn" :disabled="errors.has('first_name') || errors.has('last_name') || errors.has('step-two.phone_no')">{{ __('saas::app.tenant.registration.signin-now') }}</button>
							</div>
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
								step_one: true,
								step_two: false,
								step_three: false,
								step_four: false,
								email: null,
								password: null,
								
								company_name: null,
								
							
								elsebusinessStart: "START",
								
								result: [],
								isOneActive: false,
								isTwoActive: false,
								isThreeActive: false,
								redirectUrlShop:"./",
								redirectUrlAdmin:"./admin",
								token   : csrf_token,
						}),

						mounted() {
								this.isOneActive = true;
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


@section('css')
    <style>
        .step-list.registration-ul li {
            width: 50px;
            height: 5px;
            background-color: #fe4c1c;
        }
        .step-list.registration-ul li.active {
            background-color: #080e32;
        }
    </style>
@endsection




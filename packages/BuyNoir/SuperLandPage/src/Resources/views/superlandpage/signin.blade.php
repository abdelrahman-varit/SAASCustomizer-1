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
 

    <div id="wrapper">
        <div id="content">
            <section class="section_account section-registration">
                <div class="container-fluid">
                     
                      
                     
                  <div class="row ">
                    <div class="col-12 text-right pt-3">
                      <a href={{config('app.url')}} class='btn outline btn-lg' id="regisCloseLink" ><i class='icon cross-icon'></i></a>
                    </div>
                    
                    <div class="col-md-8 col-lg-8 mx-auto">
                          <buynoir-signin></buynoir-signin>

                          @push('scripts')
                              <script type="text/x-template" id="buynoir-signin">
                                  <div class="company-content" id="buynoir-shop-registration">
                                      <div class="form-container" v-bind:style=" step_four ? 'margin-top: -30px;border: none;' : 'border: none;' ">
                                        <div class="head_nav">

                                            <div class="brand-logo">
                                                <a href="{{ route('buynoir.home.index') }}" class="btn btn_logo">
                                                        <img src="{{ asset('vendor/webkul/ui/assets/images/logo.png') }}" alt="{{ config('app.name') }}"/>
                                                </a>
                                            </div>

                                          </div>

                                        <form class="registration" data-vv-scope="step-one" v-if="step_one" @submit.prevent="validateForm('step-one')">
                                        
                                   
                                            <div class="step-navigator">
                                                <div class='registration-subtitle'>Sign into your Shop</div>
                                            </div>


                                            <div class="control-group" :class="[errors.has('step-one.email') ? 'has-error' : '']">
                                                {{-- <label for="email" class="required">{{ __('saas::app.tenant.registration.email') }}</label> --}}

                                                <input type="text" v-validate="'required|email|max:191'" class="control" v-model="email" name="email" data-vv-as="&quot;{{ __('saas::app.tenant.registration.email') }}&quot;" placeholder="Email Address">

                                                <span class="control-error" v-show="errors.has('step-one.email')">@{{ errors.first('step-one.email') }}</span>
                                            </div>


                                            <div class="control-group text-right">
                                                <!-- <input type="submit" class="btn btn-lg btn-primary" :disabled="errors.has('password') || errors.has('password_confirmation') || errors.has('email')"  value="Continue"> -->
                                                <button class="btn btn-lg btn-warning registration-btn" :disabled="errors.has('step-one.password') || errors.has('step-one.password_confirmation') || errors.has('step-one.email')">{{ __('saas::app.tenant.registration.signin-next') }}</button>
                                            </div>
                                        </form>

                                        <form id="form-step-two" class="registration" @submit.prevent="validateForm('step-two')" :action="'//'+company_name+'/admin/login'" data-vv-scope="step-two" v-show="step_two" method="post">
                                            @csrf
                                            <div class="step-two">
                                              
                                                <div class="step-navigator">
                                                    <div class='registration-subtitle'>Enter your password for shop panel</div>
                                                </div>
                                                
                                                
                                                <div class="control-group" :class="[errors.has('step-two.email') ? 'has-error' : '']">

                                                    <input type="hidden" v-validate="'required|email|max:191'" class="control" v-model="email" name="email" data-vv-as="&quot;{{ __('saas::app.tenant.registration.email') }}&quot;" placeholder="Email Address" readonly>
                                                    <input type="hidden" v-validate="'required'" class="control" v-model="company_name" name="company_name" data-vv-as="&quot;{{ __('saas::app.tenant.registration.email') }}&quot;" placeholder="Email Address" readonly>

                                                    <span class="control-error" v-show="errors.has('step-two.email')">@{{ errors.first('step-two.email') }}</span>
                                                </div>

                                                <div class="control-group" :class="[errors.has('step-two.password') ? 'has-error' : '']">

                                                    <input type="password" name="password" v-validate="'required|min:6'" ref="password" class="control" v-model="password" placeholder="Password" data-vv-as="&quot;{{ __('saas::app.tenant.registration.password') }}&quot;">

                                                    <span class="control-error" v-show="errors.has('step-two.password')">@{{ errors.first('step-two.password') }}</span>
                                                </div>

                                                <div class="control-group">
                                                    <a :href="'//'+company_name+'/admin/forget-password'">{{ __('admin::app.users.sessions.forget-password-link-title') }}</a>
                                                </div>
                                                
                                                <div class="control-group text-right">
                                                    <button  class="btn btn-lg btn-warning registration-btn" style="width: auto" :disabled="errors.has('first_name') || errors.has('last_name') || errors.has('step-two.phone_no')">{{ __('saas::app.tenant.registration.signin-now') }}</button>
                                                </div>
                                            </div>
                                        </form>

                                       



                                        <ul class="step-list registration-ul mt-3" v-bind:style="step_four?'display:none':''">
                                            <li class="registration-step-item" :class="{ active: isOneActive }" v-on:click="stepNav(1)"></li>
                                            <li class="registration-step-item" :class="{ active: isTwoActive }" v-on:click="stepNav(2)"></li>
                                            <!-- <li class="registration-step-item" :class="{ active: isThreeActive }" v-on:click="stepNav(3)"></li> -->
                                        </ul>

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
                      
                    </div><!--- end mx-auto ---->
                  </div>
                </div>
              </section>
        </div><!-- end content -->
    </div><!-- end wrapper -->
    

    {{ view_render_event('bagisto.saas.companies.home.content.after') }}











@endsection





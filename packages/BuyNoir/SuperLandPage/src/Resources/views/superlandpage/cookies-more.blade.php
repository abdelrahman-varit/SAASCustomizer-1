@extends('superlandpage_view::superlandpage.layouts.master')

@php
    $channel = company()->getCurrentChannel();
    
    if ( $channel ) {
        $homeSEO = $channel->home_seo;

        if (isset($homeSEO)) {
            $homeSEO = json_decode($channel->home_seo);

             <!-- $metaTitle = $homeSEO->meta_title; -->
             $metaTitle = "BuyNoir - Cookies Policy";

            <!-- $metaDescription = $homeSEO->meta_description; -->
            $metaDescription = "BuyNoir Cookies Policy, No coding required. Simply choose the template that matches your style, add your branding and products and start selling your stuff";

            <!-- $metaKeywords = $homeSEO->meta_keywords; -->
            $metaKeywords = "BuyNoir Cookies Policy";
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
        <div id="content" id="buynoir-homepage">
       
    
          <!-- Stat main -->
          <main data-spy="scroll" data-target="#navbar-example2" data-offset="0">
         
    
            <!-- Start integration__logo -->
            <section class=" hidden mt-5" id="Integrations">
              <div class="container mt-5">
                <div class="row justify-content-center text-center ">
                  <div class="col-md-12 col-lg-8 mt-5">
                    <div class="title_sections mt-5">
                      <div class="before_title">
                        <span class="c-green2">Cookies Policy</span>
                      </div>
                      <p>All Cookies Policies will include the same basic information. An adequate and compliant policy of this kind will inform users of the following:</p>

                      <h2>That cookies are in use on your website</h2>
                      <ul>
                        <li>What cookies are</li>
                        <li>What kind of cookies are in use (by you and/or third parties)</li>
                        <li>How and why you (and/or third parties) are using the cookies</li>
                        <li>How a user can opt out of having cookies placed on her device(s)</li>
                        <li>Most policies on this matter start by letting users know that cookies are in use, and telling them what cookies are. Simple, easy-to-understand language should be used here so that everyone is able to understand what the policy is saying.</li>
                      </ul>
                      <p>Below is an example of the introduction from The Guardian's Cookies Policy. Note how it starts with a short, simple definition of what cookies are:</p>

                     
                                         
                    </div>
                  </div>
                </div>
                
              </div>
            </section>
            <!-- End. integration__logo -->
    
 
     
         
          </main>
        </div>
        <!-- [id] content -->
    
     
      </div>
      <!-- End. wrapper -->
    

    {{ view_render_event('bagisto.saas.companies.home.content.after') }}

  
    
@endsection

 



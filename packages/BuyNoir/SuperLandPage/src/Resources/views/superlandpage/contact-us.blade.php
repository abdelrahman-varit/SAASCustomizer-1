@extends('superlandpage_view::superlandpage.layouts.master')

@php
    $channel = company()->getCurrentChannel();
    
    if ( $channel ) {
        $homeSEO = $channel->home_seo;

        if (isset($homeSEO)) {
            $homeSEO = json_decode($channel->home_seo);

            //$metaTitle = $homeSEO->meta_title;
            $metaTitle = "BuyNoir - Contact Us";

            //$metaDescription = $homeSEO->meta_description;
            $metaDescription = "BuyNoir Contact Us, No coding required. Simply choose the template that matches your style, add your branding and products and start selling your stuff";

            //$metaKeywords = $homeSEO->meta_keywords;
            $metaKeywords = "BuyNoir Contact us";
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
            <section class="hidden mt-5 " id="Integrations">
              <div class="container mt-5">
                <div class="text-center row justify-content-center ">
                  <div class="mt-5 col-md-12 col-lg-8">
                    <div class="mt-5 title_sections">
                      <div class="before_title">
                        <span class="c-green2">Contact us</span>
                      </div>
                      <h2>Got a question about using BuyNoir?</h2>
                      <p>To contact us, email us at: <a href="mailto:team@buynoir.co">team@buynoir.co</a> or text us <a href="tel:+16782233761‬">+1 678-223-3761‬</a></p>
                      <h3><a href="https://buynoir.crunch.help/">More help...</a></h3>                
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

 



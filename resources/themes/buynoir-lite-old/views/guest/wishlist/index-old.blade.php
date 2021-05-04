@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.wishlist.page-title') }}
@endsection

@section('content-wrapper')
    <div class="container bg-light">
        <div class="d-flex row">
            <div class="col-8 offset-2">
                @guest('customer')
                    <wishlist-product></wishlist-product>
                @endguest
            </div>
        </div>
    </div>

    @auth('customer')
        @push('scripts')
            <script>
                window.location = '{{ route('customer.wishlist.index') }}';
            </script>
        @endpush
    @endauth
@endsection

@push('scripts')
    <script type="text/x-template" id="wishlist-product-template">
        <section class="cart-details row no-margin col-12">
            <h1 class="fw6 col-6">
                {{ __('shop::app.customer.account.wishlist.title') }}
            </h1>

            <div class="col-6" v-if="products.length > 0">
                <button
                    class="theme-btn light pull-right"
                    @click="removeProduct('all')">
                    {{ __('shop::app.customer.account.wishlist.deleteall') }}
                </button>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.guest-customer.view.before') !!}

            <div class="row products-collection col-12 ml0">
                <shimmer-component v-if="!isProductListLoaded && !isMobile()"></shimmer-component>

                <template v-else-if="isProductListLoaded && products.length > 0">
                  

                        <div :key="index" v-for="(product, index) in products" class="wishlist-body d-flex row py-5">
                            
                                <div class="col-3">
                                    <a :href="product.slug" :title="product.name">
                                        <img
                                            loading="lazy"
                                            :alt="product.name"
                                            :src="product.image || product.product_image"
                                            :data-src="product.image || product.product_image"
                                            class="img-fluid card-img-top lzy_img wishlist-img"
                                            :onerror="`this.src='/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`" />
                                    </a>
                                </div>
                                <div class="col-5">
                                    <h2>@{{product.name}}</h2>
                                    <p v-html="product.short_description"></p>
                                </div>
                                <div class="col-3">
                                    <div class="col-12 d-flex">
                                        <h2 v-html="parseFloat(product.price).toFixed(2)" class="align-self-center"></h2>
                                    </div>
                                </div>
                                <div class="col-3">
                                <add-to-cart-btn></add-to-cart-btn>
                                   
                                </div>


                                
                            
                        </div>
                    
                </template>


                <span v-else-if="isProductListLoaded">{{ __('customer::app.wishlist.empty') }}</span>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.guest-customer.view.after') !!}
        </section>
    </script>

    <script>
        Vue.component('wishlist-product', {
            template: '#wishlist-product-template',

            data: function () {
                return {
                    'products': [],
                    'isProductListLoaded': false,
                }
            },

            watch: {
                '$root.headerItemsCount': function () {
                    this.getProducts();
                }
            },

            mounted: function () {
                this.getProducts();
            },

            methods: {
                'getProducts': function () {
                    let items = this.getStorageValue('wishlist_product');
                    items = items ? items.join('&') : '';

                    if (items != "") {
                        this.$http
                        .get(`${this.$root.baseUrl}/detailed-products`, {
                            params: { moveToCart: true, items }
                        })
                        .then(response => {
                            this.isProductListLoaded = true;
                            this.products = response.data.products;
                        })
                        .catch(error => {
                            this.isProductListLoaded = true;
                            console.log(this.__('error.something_went_wrong'));
                        });
                    } else {
                        this.products = [];
                        this.isProductListLoaded = true;
                    }
                },

                'removeProduct': function (productId) {
                    let existingItems = this.getStorageValue('wishlist_product');

                    if (productId == "all") {
                        updatedItems = [];
                        this.$set(this, 'products', []);
                    } else {
                        updatedItems = existingItems.filter(item => item != productId);
                        this.$set(this, 'products', this.products.filter(product => product.slug != productId));
                    }

                    this.$root.headerItemsCount++;
                    this.setStorageValue('wishlist_product', updatedItems);

                    window.showAlert(`alert-success`, this.__('shop.general.alert.success'), `${this.__('customer.wishlist.remove-all-success')}`);
                }
            }
        });
    </script>
@endpush
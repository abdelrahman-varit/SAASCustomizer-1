@inject ('velocityHelper', 'Webkul\Velocity\Helpers\Helper')
@inject ('productRatingHelper', 'Webkul\Product\Helpers\Review')
@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

@php
    $direction = core()->getCurrentLocale()->direction;
@endphp

<recently-viewed
    add-class="{{ isset($addClass) ? $addClass . " $direction": '' }}"
    quantity="{{ isset($quantity) ? $quantity : null }}"
    add-class-wrapper="{{ isset($addClassWrapper) ? $addClassWrapper : '' }}">
</recently-viewed>

@push('scripts')
    <script type="text/x-template" id="recently-viewed-template">
        <div :class="`swiper-wrapper ${addClassWrapper}`">
            <div :key="Math.random()" class="swiper-slide" v-for="(product, index) in recentlyViewed">
                <div class="product text-center" v-if="product.urlKey">
                    <div class="product_thumbnail p-3">
                        <img :src="`${product.image}`" alt="Thumbnail">
                        <div class="product_thumbnail_overlay">
                            <a :href="`/${product.urlKey}`" class="btn btn-light btn-sm text-dark" title="Quick View"><i class="fas fa-eye"></i></a>
                        </div>
                    </div>
                    <h4 class="product_title mt-3 mb-2"><a :href="`/${product.urlKey}`" class="stretched-link text-reset text-decoration-none">@{{ product.name }}</a></h4>
                    <p class="product_price text-primary m-0" v-html="product.priceHTML"></p>
                    <star-ratings v-if="product.rating > 0" push-class="display-inbl" :ratings="product.rating"></star-ratings>
                    <span class="text-danger" v-if="!recentlyViewed ||(recentlyViewed && Object.keys(recentlyViewed).length == 0)" v-text="'{{ __('velocity::app.products.not-available') }}'"></span>
                </div>
            </div>
        </div>
    </script>

    <script type="text/javascript">
        (() => {
            Vue.component('recently-viewed', {
                template: '#recently-viewed-template',
                props: ['quantity', 'addClass', 'addClassWrapper'],
                baseUrl:"{{url()->to('/')}}",

                data: function () {
                    return {
                        recentlyViewed: (() => {
                            let storedRecentlyViewed = window.localStorage.recentlyViewed;
                            if (storedRecentlyViewed) {
                                var slugs = JSON.parse(storedRecentlyViewed);
                                var updatedSlugs = {};

                                slugs = slugs.reverse();

                                slugs.forEach(slug => {
                                    updatedSlugs[slug] = {};
                                });

                                return updatedSlugs;
                            }
                        })(),
                    }
                },

                created: function () {
                    for (slug in this.recentlyViewed) {
                      
                        if (slug) {
                            this.$http(`/product-details/${slug}`)
                            .then(response => {
                                if (response.data.status) {
                                    this.$set(this.recentlyViewed, response.data.details.urlKey, response.data.details);
                                } else {
                                    delete this.recentlyViewed[response.data.slug];
                                    this.$set(this, 'recentlyViewed', this.recentlyViewed);

                                    this.$forceUpdate();
                                }
                            })
                            .catch(error => {})
                        }
                    }
                },
            })
        })()
    </script>
@endpush

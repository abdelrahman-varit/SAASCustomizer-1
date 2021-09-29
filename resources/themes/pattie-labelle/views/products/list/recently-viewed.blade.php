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
        <div :class="`${addClass} recently-viewed`" class="swiper-container products-grid recently-viewed-products">

            <div :class="`recetly-viewed-products-wrapper ${addClassWrapper}`" class="swiper-wrapper">
                <div
                    :key="Math.random()"
                    class="swiper-slide"
                    v-for="(product, index) in recentlyViewed">
                    <div class="product-card">
                        <div class="product-image">
                            <a :href="`/${product.urlKey}`">
                                <img :src="`${product.image}`" />
                            </a>
                        </div>

                        <div class="product-information text-center" v-if="product.urlKey">
                            <a :href="`/${product.urlKey}`">
                                <div class="product-name">@{{ product.name }}</div>
                                <div v-html="product.priceHTML"></div>
                                <star-ratings v-if="product.rating > 0"
                                    push-class="display-inbl"
                                    :ratings="product.rating">
                                </star-ratings>
                            </a>
                        </div>
                    </div>
                </div>

                <span
                    class="fs16"
                    v-if="!recentlyViewed ||(recentlyViewed && Object.keys(recentlyViewed).length == 0)"
                    v-text="'{{ __('velocity::app.products.not-available') }}'">
                </span>
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

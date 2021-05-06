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
        <div :class="`${addClass} recently-viewed`" style="margin-left:auto;">




            <div :class="`recetly-viewed-products-wrapper ${addClassWrapper}`" style="display:inline-flex;gap:20px">
                <div
                    :key="Math.random()"
                    class=" product-card"
                    v-for="(product, index) in recentlyViewed">

                    <div class="col-4 product-image-container mr15 product-image">
                        <a :href="`/${product.urlKey}`" class="unset">
                            <div class="product-image" :style="`background-image: url(${product.image})`"></div>
                            <img :src="`${product.image}`" />
                        </a>
                    </div>

                    <div class="col-8 no-padding card-body align-vertical-top product-information text-center" v-if="product.urlKey">
                        <a :href="`/${product.urlKey}`" class="unset no-padding">
                            <div class="product-name ">
                                <span class="fs16 text-nowrap">@{{ product.name }}</span>
                            </div>

                            <div
                                v-html="product.priceHTML"
                                class="fs18 card-current-price fw6 text-danger">
                            </div>

                            <star-ratings v-if="product.rating > 0"
                                push-class="display-inbl"
                                :ratings="product.rating">
                            </star-ratings>
                        </a>
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

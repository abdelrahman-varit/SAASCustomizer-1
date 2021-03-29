<template>
    <div class="col-12 lg-card-container list-card product-card row" v-if="list">
        <div class="product-image">
            <a :title="product.name" :href="`${baseUrl}/${product.slug}`">
                <img
                    :src="product.image || product.product_image"
                    :onerror="`this.src='${this.$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`" />

                <product-quick-view-btn :quick-view-details="product" v-if="!isMobile()"></product-quick-view-btn>
            </a>
        </div>

        <div class="product-information">
            <div>
                <div class="product-name">
                    <a :href="`${baseUrl}/${product.slug}`" :title="product.name" class="unset">
                        <span class="fs16">{{ product.name }}</span>
                    </a>
                </div>

                <div class="sticker new" v-if="product.new">
                    {{ product.new }}
                </div>

                <div class="product-price" v-html="product.priceHTML"></div>

                <div class="product-rating" v-if="product.totalReviews && product.totalReviews > 0">
                    <star-ratings :ratings="product.avgRating"></star-ratings>
                    <span>{{ __('products.reviews-count', {'totalReviews': product.totalReviews}) }}</span>
                </div>

                <div class="product-rating" v-else>
                    <span class="fs14" v-text="product.firstReviewText"></span>
                </div>

                <!-- <vnode-injector :nodes="getDynamicHTML(product.addToCartHtml)"></vnode-injector> -->
            </div>
        </div>
    </div>

    <div class="card grid-card product-card-new " v-else>

            <div class="col-12 swiper-slide swiper-slide-duplicate swiper-slide-active swiper-slide-duplicate-next" data-swiper-slide-index="0" role="group" aria-label="1 / 3" >
                <div class="product_slide">
                    <div class="product_thumb">
                       
                        <a :href="`${baseUrl}/${product.slug}`" :title="product.name">
                            <img
                                loading="lazy"
                                :alt="product.name"
                                :src="product.image || product.product_image"
                                :data-src="product.image || product.product_image"
                                class="img-fluid card-img-top lzy_img"
                                :onerror="`this.src='${this.$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`" />
                                <!-- :src="`${$root.baseUrl}/vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png`" /> -->

                            <!-- <product-quick-view-btn :quick-view-details="product"></product-quick-view-btn> -->
                        </a>

                        <div class="sticker new" v-if="product.new">
                            {{ product.new }}
                        </div>

                        <span class="badge bg-dark badge-sale">Sale</span>
                        
                        <vnode-injector :nodes="getDynamicHTML(product.addToCartHtml)"></vnode-injector>
                    </div>



                    <div class="product-information">
                        <div>
                            <div class="product-name">
                                <a :href="`${baseUrl}/${product.slug}`" :title="product.name" class="unset">
                                    <span class="fs16">{{ product.name }}</span>
                                </a>
                            </div>

 

                            <div class="product-price mb-2" v-html="product.priceHTML"></div>

                        <!-- <div class="product-rating" v-if="product.totalReviews && product.totalReviews > 0">
                                <star-ratings :ratings="product.avgRating"></star-ratings>
                                <span>{{ __('products.reviews-count', {'totalReviews': product.totalReviews}) }}</span>
                            </div> -->

                        <!-- <div class="product-rating" v-else>
                                <span class="fs14" v-text="product.firstReviewText"></span>
                            </div> -->

                            <!-- <vnode-injector :nodes="getDynamicHTML(product.addToCartHtml)"></vnode-injector> -->
                        </div>
                    </div>
                </div>
                
                </div>
            </div><!-- end swiper-slide -->

        

     
    </div>
</template>

<script type="text/javascript">
    export default {
        props: [
            'list',
            'product',
        ],

        data: function () {
            return {
                'addToCart': 0,
                'addToCartHtml': '',
            }
        },

        methods: {
            'isMobile': function () {
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
</script>
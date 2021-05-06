<template>
    <div :class="`dropdown ${cartItems.length > 0 ? '' : 'disable-active'}`">
        <cart-btn :item-count="cartItems.length"></cart-btn>

        <div
            id="cart-modal-content"
            v-if="cartItems.length > 0"
            class="modal-content sensitive-modal cart-modal-content hide">

            <!--Body-->
            <div class="mini-cart-container">
                <div class="row small-card-container" :key="index" v-for="(item, index) in cartItems" >
                    <div class="d-flex row" >
                        <div class="col-3 product-image-container mr15">
                            <a class="unset" :href="`${$root.baseUrl}/${item.url_key}`">
                                <div
                                    class="product-image"
                                    :style="`background-image: url(${item.images.medium_image_url});`">
                                </div>
                            </a>
                        </div>
                        <div class="col-8 no-padding card-body align-vertical-top">
                            <div class="no-padding">
                                <div class="fs16 text-nowrap fw6 mini-cart-product-name" v-html="item.name"></div>

                                <div class="fs18 card-current-price ">
                                    <div class="display-inbl">
                                        <small class="fw5">{{ __('checkout.qty') }}: </small>
                                        <input type="text" disabled :value="item.quantity" class="ml5 outline" />
                                    </div>
                                    <div class="display-inbl">
                                        <span class="card-total-price fw5 ml-3"> {{ item.base_total }}</span>
                                        <input type="text"  class="ml5 bg-white" style="border:0px" readonly />
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <a @click="removeProduct(item.id)" class="align-self-center">
                                <span class="rango-close align-self-center" style="margin:35px"></span>
                            </a>
                        </div>
                    </div><!-- end d-flex row -->
                </div>
            </div>

            <!--Footer-->
            <div class="modal-footer">
                <h2 class="col text-left no-padding">
                    {{ subtotalText }}
                </h2>

                <h2 class="col text-right  no-padding">
                    {{ cartInformation.base_sub_total }}
                </h2>
            </div>

            <div class="modal-footer">
                <div class="col text-right no-padding">
                    <a class="col text-left fs16 link-color remove-decoration btn btn-secondary" :href="viewCart">{{ cartText }}</a>
                </div>
                <div class="col text-right no-padding">
                    
                    <div class="col-8 d-flex pull-right">
                        <i class="material-icons" style="margin-top:5px">add_shopping_cart</i>
                        <a :href="checkoutUrl">
                            <button
                                type="button"
                                class="btn btn-secondary fs16 fw6">
                                
                                {{ checkoutText }}
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'cartText',
            'viewCart',
            'checkoutUrl',
            'checkoutText',
            'subtotalText',
        ],

        data: function () {
            return {
                cartItems: [],
                cartInformation: [],
            }
        },

        mounted: function () {
            this.getMiniCartDetails();
        },

        watch: {
            '$root.miniCartKey': function () {
                this.getMiniCartDetails();
            }
        },

        methods: {
            getMiniCartDetails: function () {
                this.$http.get(`${this.$root.baseUrl}/mini-cart`)
                .then(response => {
                    if (response.data.status) {
                        this.cartItems = response.data.mini_cart.cart_items;
                        this.cartInformation = response.data.mini_cart.cart_details;
                    }
                })
                .catch(exception => {
                    console.log(this.__('error.something_went_wrong'));
                });
            },

            removeProduct: function (productId) {
                this.$http.delete(`${this.$root.baseUrl}/cart/remove/${productId}`)
                .then(response => {
                    this.cartItems = this.cartItems.filter(item => item.id != productId);

                    window.showAlert(`alert-${response.data.status}`, response.data.label, response.data.message);
                })
                .catch(exception => {
                    console.log(this.__('error.something_went_wrong'));
                });
            }
        }
    }
</script>

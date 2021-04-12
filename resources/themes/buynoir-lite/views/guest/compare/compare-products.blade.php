@php
    $attributeRepository = app('\Webkul\Attribute\Repositories\AttributeFamilyRepository');
    $comparableAttributes = $attributeRepository->getComparableAttributesBelongsToFamily();

    $locale = request()->get('locale') ?: app()->getLocale();
    
    $attributeOptionTranslations = DB::table('attribute_option_translations')->where('locale', $locale)->get()->toJson();
@endphp

@push('css')
    <style>
        .btn-add-to-cart {
            max-width: 130px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
@endpush

@push('scripts')
    <script type="text/x-template" id="compare-product-template">
        <section class="cart-details row no-margin col-12">
            <div class="container">
                <div class="col-12 ">
                    <div class="d-flex">
                        <h1 class="fw6 col-6">
                            {{ __('velocity::app.customer.compare.compare_similar_items') }}
                        </h1>

                        <div class="col-6" v-if="products.length > 0">
                            <button
                                class="theme-btn light pull-right"
                                @click="removeProductCompare('all')">
                                {{ __('shop::app.customer.account.wishlist.deleteall') }}
                            </button>
                        </div>
                    </div>
                    {!! view_render_event('bagisto.shop.customers.account.compare.view.before') !!}

                    <div class="d-flex compare-container">
                        <table class="compare-products table table-bordered">
                            <shimmer-component v-if="!isProductListLoaded && !isMobile()"></shimmer-component>

                            <template v-else-if="isProductListLoaded && products.length > 0">
                                @php
                                    $comparableAttributes = $comparableAttributes->toArray();
                                
                                    array_splice($comparableAttributes, 0, 0, [[
                                        'code' => 'product_image',
                                        'admin_name' => __('velocity::app.customer.compare.product_image'),
                                    ]]);

                                    array_splice($comparableAttributes, 2, 0, [[
                                        'code' => 'addToCartHtml',
                                        'admin_name' => __('velocity::app.customer.compare.actions'),
                                    ]]);
                                    
                                    $description = $comparableAttributes[3];
                                    $price = $comparableAttributes[4];
                                    $comparableAttributes[3]=$price;
                                    $comparableAttributes[4]=$description;
                                    
                                @endphp

                                @foreach ($comparableAttributes as $attribute)

                                   
                                    <tr>
                                        <td class="border bg-light">
                                            <span class="fs20">{{ isset($attribute['name']) ? $attribute['name'] : $attribute['admin_name'] }}</span>
                                        </td>

                                        <td :key="`title-${index}`" v-for="(product, index) in products" class="border">
                                            @switch ($attribute['code'])
                                            

                                                @case('product_image')
                                                    <a :href="`${$root.baseUrl}/${product.url_key}`" class="unset">
                                                        <img
                                                            class="image-wrapper"
                                                            :src="product['{{ $attribute['code'] }}']"
                                                            onload="window.updateHeight ? window.updateHeight() : ''"
                                                            :onerror="`this.src='${$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`" />
                                                    </a>
                                                    @break

                                                @case('name')
                                                    <a :href="`${$root.baseUrl}/${product.url_key}`" class="unset remove-decoration active-hover">
                                                        <h1 class="fw6 fs18" v-text="product['{{ $attribute['code'] }}']"></h1>
                                                    </a>
                                                    @break

                                                @case('price')
                                                    <span v-html="product['priceHTML']" style="margin:0px auto"></span>
                                                    @break

                                                @case('addToCartHtml')
                                                    <div class="action">

                                                        <div v-html="product.defaultAddToCart"></div>

                                                        <i
                                                            class="material-icons cross fs16"
                                                            @click="removeProductCompare(product.id)">

                                                            close
                                                        </i>
                                                    </div>
                                                    @break

                                                @case('color')
                                                    <span v-html="product.color_label" class="fs16"></span>
                                                    @break

                                                @case('size')
                                                    <span v-html="product.size_label" class="fs16"></span>
                                                    @break

                                                @case('description')
                                                    <div v-html="product.description" title="@{{product.description}}" class="compare-product-description"></div>
                                                    @break

                                                @case('brand')
                                                 
                                                    <div title="@{{product.brand}}" class="compare-product-brand">{{ $attribute['code'] }}</div>
                                                    @break

                                                @default
                                                    @switch ($attribute['type'])
                                                        @case('boolean')
                                                            <span
                                                                v-text="product.product['{{ $attribute['code'] }}']
                                                                        ? '{{ __('velocity::app.shop.general.yes') }}'
                                                                        : '{{ __('velocity::app.shop.general.no') }}'"
                                                            ></span>
                                                            @break;

                                                        @case('checkbox')
                                                            <span v-if="product.product['{{ $attribute['code'] }}']" v-html="getAttributeOptions(product['{{ $attribute['code'] }}'] ? product : product.product['{{ $attribute['code'] }}'] ? product.product : null, '{{ $attribute['code'] }}', 'multiple')" class="fs16"></span>
                                                            <span v-else class="fs16">__</span>
                                                            @break;

                                                        @case('select')
                                                            <span v-if="product.product['{{ $attribute['code'] }}']" v-html="getAttributeOptions(product['{{ $attribute['code'] }}'] ? product : product.product['{{ $attribute['code'] }}'] ? product.product : null, '{{ $attribute['code'] }}', 'single')" class="fs16"></span>
                                                            <span v-else class="fs16">__</span>
                                                            @break;

                                                        @case ('file')
                                                        @case ('image')
                                                            <a :href="`${$root.baseUrl}/${product.url_key}`" class="unset">
                                                                <img
                                                                    class="image-wrapper"
                                                                    onload="window.updateHeight ? window.updateHeight() : ''"
                                                                    :src="'storage/' + product.product['{{ $attribute['code'] }}']"
                                                                    :onerror="`this.src='${$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`" />
                                                            </a>
                                                            @break;

                                                        @default
                                                            <span v-html="product['{{ $attribute['code'] }}'] ? product['{{ $attribute['code'] }}'] : product.product['{{ $attribute['code'] }}'] ? product.product['{{ $attribute['code'] }}'] : '__'" class="fs16"></span>
                                                            @break;
                                                    @endswitch

                                                    @break

                                            @endswitch
                                        </td>
                                    </tr>
                                @endforeach
                            </template>

                            <span v-else-if="isProductListLoaded && products.length == 0" class="col-12">
                                @{{ __('customer.compare.empty-text') }}
                            </span>
                        </table>
                    </div>
                    {!! view_render_event('bagisto.shop.customers.account.compare.view.after') !!}
                </div>
            </div>
        </section>
    </script>

    <script>
        Vue.component('compare-product', {
            template: '#compare-product-template',

            data: function () {
                return {
                    'products': [],
                    'isProductListLoaded': false,
                    'attributeOptions': JSON.parse(@json($attributeOptionTranslations)),
                    'isCustomer': '{{ auth()->guard('customer')->user() ? "true" : "false" }}' == "true",
                }
            },

            mounted: function () {
                this.getComparedProducts();
            },

            methods: {
                'getComparedProducts': function () {
                    let items = '';
                    let url = `${this.$root.baseUrl}/${this.isCustomer ? 'comparison' : 'detailed-products'}`;

                    let data = {
                        params: {'data': true}
                    }

                    if (! this.isCustomer) {
                        items = this.getStorageValue('compared_product');
                        items = items ? items.join('&') : '';

                        data = {
                            params: {
                                items
                            }
                        };
                    }

                    if (this.isCustomer || (! this.isCustomer && items != "")) {
                        this.$http.get(url, data)
                        .then(response => {
                            this.isProductListLoaded = true;

                            if (response.data.products.length > 3) {
                                $('.compare-products').css('overflow-x', 'scroll');
                            }

                            this.products = response.data.products;
                        })
                        .catch(error => {
                            this.isProductListLoaded = true;
                            console.log(this.__('error.something_went_wrong'));
                        });
                    } else {
                        this.isProductListLoaded = true;
                    }

                },

                'removeProductCompare': function (productId) {
                    if (this.isCustomer) {
                        this.$http.delete(`${this.$root.baseUrl}/comparison?productId=${productId}`)
                        .then(response => {
                            if (productId == 'all') {
                                this.$set(this, 'products', this.products.filter(product => false));
                            } else {
                                this.$set(this, 'products', this.products.filter(product => product.id != productId));
                            }

                            window.showAlert(`alert-${response.data.status}`, response.data.label, response.data.message);
                        })
                        .catch(error => {
                            console.log(this.__('error.something_went_wrong'));
                        });
                    } else {
                        let existingItems = this.getStorageValue('compared_product');

                        if (productId == "all") {
                            updatedItems = [];
                            this.$set(this, 'products', []);

                            window.showAlert(
                                `alert-success`,
                                this.__('shop.general.alert.success'),
                                `${this.__('customer.compare.removed-all')}`
                            );
                        } else {
                            updatedItems = existingItems.filter(item => item != productId);
                            this.$set(this, 'products', this.products.filter(product => product.id != productId));

                            window.showAlert(
                                `alert-success`,
                                this.__('shop.general.alert.success'),
                                `${this.__('customer.compare.removed')}`
                            );
                        }

                        this.setStorageValue('compared_product', updatedItems);
                    }

                    this.$root.headerItemsCount++;
                },

                'getAttributeOptions': function (productDetails, attributeValues, type) {
                    var attributeOptions = '__';

                    if (productDetails && attributeValues) {
                        var attributeItems;

                        if (type == "multiple") {
                            attributeItems = productDetails[attributeValues].split(',');
                        } else if (type == "single") {
                            attributeItems = productDetails[attributeValues];
                        }

                        attributeOptions = this.attributeOptions.filter(option => {
                            if (type == "multiple") {
                                if (attributeItems.indexOf(option.attribute_option_id.toString()) > -1) {
                                    return true;
                                }
                            } else if (type == "single") {
                                if (attributeItems == option.attribute_option_id.toString()) {
                                    return true;
                                }
                            }

                            return false;
                        });

                        attributeOptions = attributeOptions.map(option => {
                            return option.label;
                        });

                        attributeOptions = attributeOptions.join(', ');
                    }

                    return attributeOptions;
                }
            }
        });
    </script>
@endpush
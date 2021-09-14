<compare-component product-id="{{ $productId }}" :productId="{{ $productId }}"></compare-component>

@push('scripts')

    <script type="text/x-template" id="compare-component-template">
        <a
            class="btn p-0 text-start shadow-none border-0 text-dark"
            title="{{  __('shop::app.customer.compare.add-tooltip') }}"
            @click="addProductToCompare"
            style="width: 150px">
            <svg width="45" height="45" class="border me-2" style="padding: 13px" enable-background="new 0 0 21.138 21.138" version="1.1" viewBox="0 0 21.138 21.138" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m21.138 3.42c-1.988 1.166-3.868 2.268-5.84 3.426v-2.135c-1.116-0.236-1.177-0.201-1.543 0.787-1.581 4.269-3.171 8.535-4.732 12.812-0.173 0.474-0.411 0.619-0.89 0.594-0.736-0.038-1.476-0.01-2.259-0.01v2.245c-1.99-1.16-3.879-2.26-5.874-3.421 1.968-1.156 3.856-2.265 5.837-3.428v2.133c1.097 0.236 1.15 0.21 1.505-0.745 1.592-4.286 3.188-8.571 4.764-12.863 0.159-0.432 0.36-0.612 0.839-0.584 0.755 0.046 1.515 0.012 2.317 0.012v-2.243c1.989 1.157 3.878 2.258 5.876 3.42z"></path><path d="m15.267 21.137v-2.243c-0.836 0-1.632-0.018-2.427 7e-3 -0.373 0.012-0.548-0.111-0.672-0.471-0.374-1.083-0.798-2.149-1.189-3.227-0.062-0.172-0.119-0.392-0.064-0.55 0.376-1.081 0.783-2.151 1.231-3.361 0.21 0.547 0.375 0.966 0.531 1.389 0.366 0.983 0.726 1.969 1.092 2.953 0.356 0.957 0.358 0.957 1.482 0.836v-2.2c1.997 1.169 3.887 2.276 5.883 3.445-1.967 1.147-3.854 2.248-5.867 3.422z"></path><path d="m5.819 2.243c0.912 0 1.711 0.015 2.509-6e-3 0.342-9e-3 0.522 0.093 0.641 0.433 0.386 1.101 0.814 2.187 1.212 3.284 0.055 0.152 0.087 0.352 0.036 0.498-0.381 1.08-0.786 2.152-1.233 3.361-0.321-0.856-0.598-1.587-0.871-2.32-0.251-0.674-0.497-1.35-0.746-2.025-0.353-0.953-0.353-0.953-1.505-0.779v2.171c-1.99-1.168-3.879-2.275-5.86-3.437 1.971-1.15 3.849-2.247 5.818-3.397-1e-3 0.763-1e-3 1.447-1e-3 2.217z"></path></svg>
            {{  __('shop::app.customer.compare.text') }}            
        </a>
    </script>

    <script>
        Vue.component('compare-component', {
            props: ['productId'],

            template: '#compare-component-template',

            data: function () {                
                return {
                    'baseUrl': "{{ url()->to('/') }}",
                    'customer': '{{ auth()->guard('customer')->user() ? "true" : "false" }}' == "true",
                }
            },

            methods: {
                'addProductToCompare': function () {
                    // if (this.customer == "true" || this.customer == true) {
                    //     this.$http.put(
                    //         `${this.baseUrl}/comparison`, {
                    //             productId: this.productId,
                    //         }
                    //     ).then(response => {
                    //         window.flashMessages = [{
                    //             'type': `alert-${response.data.status}`,
                    //             'message': response.data.message
                    //         }];
                            
                    //         this.$root.addFlashMessages()
                    //     }).catch(error => {
                    //         window.flashMessages = [{
                    //             'type': `alert-danger`,
                    //             'message': "{{ __('shop::app.common.error') }}"
                    //         }];

                    //         this.$root.addFlashMessages()
                    //     });
                    // } else {
                        let updatedItems = [this.productId];
                        let existingItems = this.getStorageValue('compared_product');

                        console.log('compare product/compare-btn',existingItems);

                        if(existingItems && existingItems.length>3){
							 window.flashMessages = [{
                                    'type': `alert-warning`,
                                    'message': "{{ __('shop::app.customer.compare.maximum_added') }}"
                                }];

                                this.$root.addFlashMessages()
						}else{
                          
            
                            if (existingItems) {
                                if (existingItems.indexOf(this.productId) == -1) {
                                    updatedItems = existingItems.concat(updatedItems);

                                    this.setStorageValue('compared_product', updatedItems);

                                    window.flashMessages = [{
                                        'type': `alert-success`,
                                        'message': "{{ __('shop::app.customer.compare.added') }}"
                                    }];

                                    this.$root.addFlashMessages()
                                } else {
                                    window.flashMessages = [{
                                        'type': `alert-success`,
                                        'message': "{{ __('shop::app.customer.compare.already_added') }}"
                                    }];

                                    this.$root.addFlashMessages()
                                }
                            } else {
                                this.setStorageValue('compared_product', updatedItems);

                                window.flashMessages = [{
                                    'type': `alert-success`,
                                    'message': "{{ __('shop::app.customer.compare.added') }}"
                                }];

                                    this.$root.addFlashMessages()
                            }
                        }
                    // }

                    this.updateCompareCount();
                },

                'getStorageValue': function (key) {
                    let value = window.localStorage.getItem(key);

                    if (value) {
                        value = JSON.parse(value);
                    }

                    return value;
                },

                'setStorageValue': function (key, value) {
                    window.localStorage.setItem(key, JSON.stringify(value));

                    return true;
                },

                'updateCompareCount': function () {
                    // if (this.customer == "true" || this.customer == true) {
                    //     this.$http.get(`${this.baseUrl}/items-count`)
                    //     .then(response => {
                    //         $('#compare-items-count').html(response.data.compareProductsCount);
                    //     })
                    //     .catch(exception => {
                    //         window.flashMessages = [{
                    //             'type': `alert-error`,
                    //             'message': "{{ __('shop::app.common.error') }}"
                    //         }];
                            
                    //         this.$root.addFlashMessages();
                    //     });
                    // } else {
                    //     let comparedItems = JSON.parse(localStorage.getItem('compared_product'));
                    //     comparedItemsCount = comparedItems ? comparedItems.length : 0;

                    //     $('#compare-items-count').html(comparedItemsCount);
                    // }

                    let comparedItems = JSON.parse(localStorage.getItem('compared_product'));
                    let comparedItemsCount = comparedItems ? comparedItems.length : 0;
                    $('#compare-items-count').html(comparedItemsCount);
                    //console.log('count of product/compare-btn: ',this.getStorageValue('compared_product') );
                    // this.getStorageValue('compared_product');
                } //end function updateCompareCount
            }
        });
    </script>
@endpush
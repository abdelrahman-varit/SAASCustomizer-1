@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
@inject ('wishListHelper', 'Webkul\Customer\Helpers\Wishlist')

<?php $images = $productImageHelper->getGalleryImages($product); ?>

{!! view_render_event('bagisto.shop.products.view.gallery.before', ['product' => $product]) !!}

<!-- Product Gallery Start -->
<product-gallery></product-gallery>
<!-- Product Gallery End -->

{!! view_render_event('bagisto.shop.products.view.gallery.after', ['product' => $product]) !!}

@push('scripts')

    <script type="text/x-template" id="product-gallery-template">
        <div class="xzoom-container d-block">
            <div class="xzoom-image-wrapper border d-flex justify-content-center align-items-center">
                <img class="xzoom" :src="currentLargeImageUrl" :xoriginal="currentOriginalImageUrl">
            </div>
            <div class="swiper-container xzoom-thumbs-container mt-3">
                <div class="swiper-wrapper xzoom-thumbs m-0">
                    <a
                        class="swiper-slide"
                        :href="thumb.small_image_url"
                        v-for='(thumb, index) in thumbs'>
                        <img
                            class="xzoom-gallery"
                            :src="thumb.small_image_url"
                            :xpreview="thumb.small_image_url">
                    </a>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </script>

    <script>
        var galleryImages = @json($images);

        Vue.component('product-gallery', {

            template: '#product-gallery-template',

            data: function() {
                return {
                    images: galleryImages,

                    thumbs: [],

                    currentLargeImageUrl: '',

                    currentOriginalImageUrl: '',

                    counter: {
                        up: 0,
                        down: 0,
                    },

                    is_move: {
                        up: true,
                        down: true,
                    }
                }
            },

            watch: {
                'images': function(newVal, oldVal) {
                    this.changeImage(this.images[0])

                    this.prepareThumbs()
                }
            },

            created: function() {
                this.changeImage(this.images[0])

                this.prepareThumbs()
            },

            methods: {
                prepareThumbs: function() {
                    var this_this = this;

                    this_this.thumbs = [];

                    this.images.forEach(function(image) {
                        this_this.thumbs.push(image);
                    });
                },

                changeImage: function(image) {
                    this.currentLargeImageUrl = image.large_image_url;

                    this.currentOriginalImageUrl = image.original_image_url;
                },

                moveThumbs: function(direction) {
                    let len = this.thumbs.length;

                    if (direction === "top") {
                        const moveThumb = this.thumbs.splice(len - 1, 1);

                        this.thumbs = [moveThumb[0]].concat((this.thumbs));

                        this.counter.up = this.counter.up+1;

                        this.counter.down = this.counter.down-1;

                    } else {
                        const moveThumb = this.thumbs.splice(0, 1);

                        this.thumbs = [].concat((this.thumbs), [moveThumb[0]]);

                        this.counter.down = this.counter.down+1;

                        this.counter.up = this.counter.up-1;
                    }

                    if ((len-4) == this.counter.down) {
                        this.is_move.down = false;
                    } else {
                        this.is_move.down = true;
                    }

                    if ((len-4) == this.counter.up) {
                        this.is_move.up = false;
                    } else {
                        this.is_move.up = true;
                    }
                },
            }
        });

    </script>

    <script>
        $(document).ready(function() {

            var wishlist = " <?php echo $wishListHelper->getWishlistProduct($product);  ?> ";

            $(document).mousemove(function(event) {
                if ($('.add-to-wishlist').length && wishlist != 1) {
                    if (event.pageX > $('.add-to-wishlist').offset().left && event.pageX < $('.add-to-wishlist').offset().left+32 && event.pageY > $('.add-to-wishlist').offset().top && event.pageY < $('.add-to-wishlist').offset().top+32) {

                        $(".zoomContainer").addClass("show-wishlist");

                    } else {
                        $(".zoomContainer").removeClass("show-wishlist");
                    }
                };
            });
        })
    </script>

@endpush
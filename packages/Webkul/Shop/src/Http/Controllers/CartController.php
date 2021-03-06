<?php

namespace Webkul\Shop\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Webkul\Customer\Repositories\WishlistRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Checkout\Contracts\Cart as CartModel;
use Illuminate\Support\Facades\Event;
use Webkul\Product\Helpers\ProductImage;
use Cart;

class CartController extends Controller
{
    /**
     * WishlistRepository Repository object
     *
     * @var \Webkul\Customer\Repositories\WishlistRepository
     */
    protected $wishlistRepository;

    /**
     * ProductRepository object
     *
     * @var \Webkul\Product\Repositories\ProductRepository
     */
    protected $productRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Customer\Repositories\CartItemRepository  $wishlistRepository
     * @param  \Webkul\Product\Repositories\ProductRepository  $productRepository
     * @return void
     */
    public function __construct(
        WishlistRepository $wishlistRepository,
        ProductRepository $productRepository
    )
    {
        $this->middleware('customer')->only(['moveToWishlist']);

        $this->wishlistRepository = $wishlistRepository;

        $this->productRepository = $productRepository;

        parent::__construct();
    }

    /**
     * Method to populate the cart page which will be populated before the checkout process.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        Cart::collectTotals();

        return view($this->_config['view'])->with('cart', Cart::getCart());
    }

    /**
     * Function for guests user to add the product in the cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        try {
            //dd(request()->all());
            $result = Cart::addProduct($id, request()->all());
            if ($this->onFailureAddingToCart($result)) {
                $cart_list = cart()->getCart();
                foreach($cart_list->items as $item){
                    $images = $item->product->getTypeInstance()->getBaseImage($item);
                }

                if(request()->get('is_compare')){
                    $this->compareProductsRepository->deleteWhere([
                        'product_flat_id' => $id,
                        'customer_id'     => auth()->guard('customer')->user()->id
                    ]);
                    return redirect()->url('/comparison');
                }

                return response()->json([
                    'data'=>$cart_list,
                    'cart_list'=>$cart_list,
                ]);
                return redirect()->back();
            }

            if ($result instanceof CartModel) {
                session()->flash('success', __('shop::app.checkout.cart.item.success'));

                if ($customer = auth()->guard('customer')->user()) {
                    $this->wishlistRepository->deleteWhere(['product_id' => $id, 'customer_id' => $customer->id]);
                }

                if (request()->get('is_buy_now')) {
                    Event::dispatch('shop.item.buy-now', $id);

                    return redirect()->route('shop.checkout.onepage.index');
                }

                
                if(request()->get('is_ajax')){
                    $cart_list = cart()->getCart();
                    foreach($cart_list->items as $item){
                        $images = $item->product->getTypeInstance()->getBaseImage($item);
                    }

                    if(request()->get('is_compare')){
                        return redirect()->url('/comparison');
                    }

                    return response()->json([
                        'data'=>$cart_list,
                        'cart_list'=>$cart_list,
                    ]);
                }
            }
        } catch(\Exception $e) {
            session()->flash('warning', __($e->getMessage()));

            $product = $this->productRepository->find($id);

            Log::error('Shop CartController: ' . $e->getMessage(),
                ['product_id' => $id, 'cart_id' => cart()->getCart() ?? 0]);

                if(request()->get('is_ajax')){
                    $cart_list = cart()->getCart();
                    if(!empty($cart_list)){
                        foreach($cart_list->items as $item){
                            $images = $item->product->getTypeInstance()->getBaseImage($item);
                        }
                    }

                    return response()->json([
                        'status'=>'error',
                        'data'=>$cart_list,
                        'message'=> $e->getMessage()
                    ]);
                }

            return redirect()->route('shop.productOrCategory.index', $product->url_key);
        }
        if(request()->get('is_ajax')){
            return response()->json([
                'data'=>cart()->getCart() 
            ]);
        }

        return redirect()->back();
    }

    /**
     * Removes the item from the cart if it exists
     *
     * @param  int  $itemId
     * @return \Illuminate\Http\Response
     */
    public function remove($itemId)
    {
        $result = Cart::removeItem($itemId);

        if ($result) {
            session()->flash('success', trans('shop::app.checkout.cart.item.success-remove'));
        }

           
        if(request()->get('is_ajax')){
            $cart_list = cart()->getCart();
            if(!empty($cart_list)){
                foreach($cart_list->items as $item){
                    $images = $item->product->getTypeInstance()->getBaseImage($item);
                }
            }

            if(!empty($cart_list->base_grand_total)){
                $cart_list->base_grand_total = core()->currency($cart_list->base_grand_total);
                $cart_list->base_sub_total = core()->currency($cart_list->base_sub_total);
            }
                          
            return response()->json([
                'status'=>'success',
                'data'=>$cart_list,
                'cart_list'=>$cart_list,
            ]);
        }

        if(request()->get('is_compare')){
            return redirect()->url('/comparison');
        }else{
            return redirect()->back();
        }

    }

    /**
     * Updates the quantity of the items present in the cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateBeforeCheckout()
    {
        try {
            $is_ajax = request()->get('is_ajax');
            if($is_ajax){
                $product_id = request()->get('product');
                $qty = request()->get('qty');
                $data = [
                    "qty"=>[
                        $product_id => $qty
                    ]
                ];
                $result = Cart::updateItems($data);
                $cart_data = Cart::getCart();
                $cart_data->base_grand_total = core()->currency($cart_data->base_grand_total);
                $cart_data->base_sub_total = core()->currency($cart_data->base_sub_total);
                return response()->json([
                    'status'=>'success',
                    'data'=>$cart_data
                ]);
            }else{
                $result = Cart::updateItems(request()->all());
                
            }
            
            
            if ($result) {
                session()->flash('success', trans('shop::app.checkout.cart.quantity.success'));
            }
        } catch(\Exception $e) {
            //dd($e->getMessage());
            session()->flash('error', trans($e->getMessage()));
        }

        return redirect()->back();
    }

    /**
     * Function to move a already added product to wishlist will run only on customer authentication.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function moveToWishlist($id)
    {
        $result = Cart::moveToWishlist($id);

        if ($result) {
            session()->flash('success', trans('shop::app.checkout.cart.move-to-wishlist-success'));
        } else {
            session()->flash('warning', trans('shop::app.checkout.cart.move-to-wishlist-error'));
        }

        return redirect()->back();
    }

    /**
     * Apply coupon to the cart
     *
     * @return \Illuminate\Http\Response
    */
    public function applyCoupon()
    {
        $couponCode = request()->get('code');
        
        try {
            if (strlen($couponCode)) {
                Cart::setCouponCode($couponCode)->collectTotals();
              
                if (Cart::getCart()->coupon_code == $couponCode) {
                    return response()->json([
                        'success' => true,
                        'message' => trans('shop::app.checkout.total.success-coupon'),
                    ]);
                }
            }

            return response()->json([
                'success' => false,
                'message' => trans('shop::app.checkout.total.invalid-coupon'),
            ]);
        } catch (\Exception $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => trans('shop::app.checkout.total.coupon-apply-issue'),
            ]);
        }
    }

    /**
     * Apply coupon to the cart
     *
     * @return \Illuminate\Http\Response
    */
    public function removeCoupon()
    {
        Cart::removeCouponCode()->collectTotals();

        return response()->json([
            'success' => true,
            'message' => trans('shop::app.checkout.total.remove-coupon'),
        ]);
    }

    /**
     * Returns true, if result of adding product to cart
     * is an array and contains a key "warning" or "info"
     *
     * @param  array  $result
     *
     * @return boolean
     */
    private function onFailureAddingToCart($result): bool
    {
        if (is_array($result) && isset($result['warning'])) {
            session()->flash('warning', $result['warning']);
            return true;
        }

        if (is_array($result) && isset($result['info'])) {
            session()->flash('info', $result['info']);
            return true;
        }

        return false;
    }
}

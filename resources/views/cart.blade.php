@extends('layouts.main')
@section('content')
    <div class="tf-page-title">
        <div class="container-full">
            <div class="heading text-center">Shopping Cart</div>
        </div>
    </div>
    {{-- <section class="cart_product">

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="cart_main">
                    <div class="cart_table">
                        <table>
                            <tr class="cart_headings">
                                <th>
                                    <h5>Product</h5>
                                </th>
                                <th>
                                    <h5>Variation</h5>
                                </th>
                                <th>
                                    <h5>Price</h5>
                                </th>
                                <th>
                                    <h5>Quantity</h5>
                                </th>
                                <th>
                                    <h5>Subtotal</h5>
                                </th>
                            </tr>
                            @if (Session::has('cart') && !empty(Session::get('cart')))
                            @php
                                $cart = Session::get('cart');
                              
                                $total = 0;
                            @endphp
                             @foreach ($cart as $k => $val)
                             @php
                                 if ($k == 'order_id') {
                                     continue;
                                 }
                                 $product = App\Models\Products::where('id', $val['product_id'])->first();
                                 if(isset($val['variaion_id']) && $val['variaion_id'] != null){
                                 $variation = $product->variations->where('id', $val['variaion_id'])->first();
                                 }
                                 
                                 $total += $val['sub_total'];
                             @endphp
                            <tr class="cart_data" data-rowid="{{ $val['cart_id'] }}">
                                <td class="cart_img">
                                    @if (isset($val['custom']) && $val['custom'] == 1)
                                    <div class="cart_pro_img">
                                        <a href="{{route('remove-cart',$val['cart_id'])}}" class="cart-delete" data-rowid="{{ $val['cart_id'] }}"><i class='bx bxs-trash'></i> Remove Item</a>
                                        <img src="{{ $val['image'] }}" alt="">
                                        <h5>Customized Product</h5>
                                    </div>
                                    @else
                                    
                                    <div class="cart_pro_img">
                                        <a href="{{route('remove-cart',$val['cart_id'])}}" class="cart-delete" data-rowid="{{ $val['cart_id'] }}"><i class='bx bxs-trash'></i> Remove Item</a>
                                        <img src="{{ asset($variation['img_path']) }}" alt="">
                                        <h5>{{ $product['title'] }}</h5>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if (isset($val['variaion_id']) && $val['variaion_id'] != null)
                                    <p>Size: <b>{{ $variation->variationBelongsToSize->name }}</b></p>
                                    <p>Color: <b>{{ $variation->variationBelongsToColor->name }}</b></p>
                                    @endif
                                </td>
                                <td>
                                    <p>${{ (isset($val['custom']) && $val['custom'] == 1) ? $val['price'] : $variation->our_price }}  </p>
                                </td>
                                <td>
                                    <div class="cart-icons cart-quantity-inputs">
                                            <button class="changeqty minuss"><i class="bx bx-minus"></i></button>
                                            <input type="text" class="count count-input" id="" value="{{ $val['quantity'] }}" data-price="{{ $val['price']+$product['damage_wavier_tax'] }}" data-cart_id="{{ $val['cart_id'] }}">
                                            <button class="changeqty pluss"><i class="bx bx-plus "></i></button>
                                        </div>
                                </td>
                                <td>
                                    <p>${{ $val['sub_total'] }}</p>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4">
                                    <div class="section-content text-center py-5">
                                        <div class="subHeading">There are currently no items present in the shopping cart.</div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                        </table>
                    </div>

                    <div class="shoping">
                        <div class="shop_btn">
                            <a href="{{route('products')}}" class="themebtn2"><img src="{{asset('assets/images/arrow.png')}}" alt=""> Go Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cart_box">
                    <div class="box_heading">
                        <h3>Cart Totals</h3>
                    </div>
                    <div class="price">
                        <h5>Subtotal</h5>
                        <p>${{ isset($total) ? $total : 0 }}</p>
                    </div>
                    <div class="price">
                        <h5>Shipping</h5>
                            <p>${{$config['SHIPPINGPRICE']}}</p>
                           {{-- <p>{{($total < 200) ? '$'.$config['SHIPPINGPRICE'] : 'Free Delivery' }}</p> --}}

    {{-- </div>
                    <p>Flat rate.
                        shipping options will be updated during checkout.</p>
                    <div class="price">
                        <h5>Total</h5>
                        <p>${{ isset($total) ? $total + $config['SHIPPINGPRICE'] : 0 }}</p> --}}

    {{-- @if ($total < 200)
                        <p>${{ isset($total) ? $total + $config['SHIPPINGPRICE'] : 0 }}</p>
                        @else
                        <p>${{  $total }}</p>
                        @endif --}}
    {{-- </div>

                    <div class="cart_btn">
                        <a href="{{route('checkout')}}" class="btn btn__alt">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}


    <section class="flat-spacing-11">
        <div class="container">
            <!-- <div class="tf-page-cart text-center mt_140 mb_200">
                <h5 class="mb_24">Your cart is empty</h5>
                <p class="mb_24">You may check out all the available products and buy some in the shop</p>
                <a href="shop-default.html" class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn">Return to shop<i class="icon icon-arrow1-top-left"></i></a>
            </div> -->
            <div class="tf-cart-countdown">
                <div class="title-left">
                    <svg class="d-inline-block" xmlns="http://www.w3.org/2000/svg" width="16" height="24"
                        viewBox="0 0 16 24" fill="rgb(219 18 21)">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10.0899 24C11.3119 22.1928 11.4245 20.2409 10.4277 18.1443C10.1505 19.2691 9.64344 19.9518 8.90645 20.1924C9.59084 18.2379 9.01896 16.1263 7.19079 13.8576C7.15133 16.2007 6.58824 17.9076 5.50148 18.9782C4.00436 20.4517 4.02197 22.1146 5.55428 23.9669C-0.806588 20.5819 -1.70399 16.0418 2.86196 10.347C3.14516 11.7228 3.83141 12.5674 4.92082 12.8809C3.73335 7.84186 4.98274 3.54821 8.66895 0C8.6916 7.87426 11.1062 8.57414 14.1592 12.089C17.4554 16.3071 15.5184 21.1748 10.0899 24Z">
                        </path>
                    </svg>
                    <p>These products are limited, checkout within </p>
                </div>
                <div class="js-countdown timer-count" data-timer="600" data-labels="d:,h:,m:,s"></div>
            </div>
            <div class="tf-page-cart-wrap">
                <div class="tf-page-cart-item">
                    <form>
                        <table class="tf-table-page-cart">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Variation</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                @if (Session::has('cart') && !empty(Session::get('cart')))
                                    @php
                                        $cart = Session::get('cart');

                                        $total = 0;
                                    @endphp
                                    @foreach ($cart as $k => $val)
                                        @php
                                            if ($k == 'order_id') {
                                                continue;
                                            }
                                            $product = App\Models\Products::where('id', $val['product_id'])->first();
                                            if (isset($val['variaion_id']) && $val['variaion_id'] != null) {
                                                $variation = $product->variations
                                                    ->where('id', $val['variaion_id'])
                                                    ->first();
                                            }

                                            $total += $val['sub_total'];
                                        @endphp
                            </thead>
                            <tbody>
                                <tr class="tf-cart-item file-delete" data-rowid="{{ $val['cart_id'] }}">
                                    <td class="tf-cart-item_product">
                                        @if(isset($val['custom']) && $val['custom'] == 1)
                                        <a href="product-detail.html" class="img-box">
                                            <img src="{{ $val['image'] }}" alt="img-product">
                                        </a>
                                        <div class="cart-info">
                                            <a href="product-detail.html" class="cart-title link">Customized Product</a>
                                            {{-- <div class="cart-meta-variant">White / M</div> --}}
                                            <a href="{{route('remove-cart',$val['cart_id'])}}" class="cart-delete" data-rowid="{{ $val['cart_id'] }}"><i class='bx bxs-trash'></i> Remove Item</a>
                                        </div>
                                        @else
                                        
                                        <a href="product-detail.html" class="img-box">
                                            <img src="{{ asset($variation['img_path']) }}" alt="img-product">
                                        </a>
                                        <div class="cart-info">
                                            <a href="product-detail.html" class="cart-title link">{{ $product['title'] }}</a>
                                            {{-- <div class="cart-meta-variant">White / M</div> --}}
                                            <a href="{{route('remove-cart',$val['cart_id'])}}" class="cart-delete" data-rowid="{{ $val['cart_id'] }}"><i class='bx bxs-trash'></i> Remove Item</a>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="tf-cart-item_price" cart-data-title="Price">
                                        @if(isset($val['variaion_id']) && $val['variaion_id'] != null)
                                        <div class="cart-price">{{ $variation->variationBelongsToSize->name }} / {{ $variation->variationBelongsToColor->name }}</div>
                                        @endif
                                    </td>
                                    <td class="tf-cart-item_price" cart-data-title="Price">
                                        <div class="cart-price">USD {{ (isset($val['custom']) && $val['custom'] == 1) ? $val['price'] : $variation->our_price }}</div>
                                    </td>


                                    <td class="tf-cart-item_quantity" cart-data-title="Quantity">
                                        <div class="cart-quantity cart-quantity-inputs">
                                            <div class="wg-quantity">
                                                <span class="btn-quantity changeqty minuss">
                                                    <svg class="d-inline-block" width="9" height="1"
                                                        viewBox="0 0 9 1" fill="currentColor">
                                                        <path
                                                            d="M9 1H5.14286H3.85714H0V1.50201e-05H3.85714L5.14286 0L9 1.50201e-05V1Z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <input type="text" name="number" class="count count-input" id="" value="{{ $val['quantity'] }}" data-price="{{ $val['price']+$product['damage_wavier_tax'] }}" data-cart_id="{{ $val['cart_id'] }}">
                                                <span class="btn-quantity changeqty pluss">
                                                    <svg class="d-inline-block" width="9" height="9"
                                                        viewBox="0 0 9 9" fill="currentColor">
                                                        <path
                                                            d="M9 5.14286H5.14286V9H3.85714V5.14286H0V3.85714H3.85714V0H5.14286V3.85714H9V5.14286Z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </td>


                                    <td class="tf-cart-item_total" cart-data-title="Total">
                                        <div class="cart-total">USD {{ $val['sub_total'] }}</div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4">
                                        <div class="section-content text-center py-5">
                                            <div class="subHeading">There are currently no items present in the shopping cart.</div>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="tf-page-cart-note">
                            <label for="cart-note">Add Order Note</label>
                            <textarea name="note" id="cart-note" placeholder="How can we help you?"></textarea>
                        </div>
                    </form>
                </div>
                <div class="tf-page-cart-footer">
                    <div class="tf-cart-footer-inner">
                        <div class="tf-free-shipping-bar">
                            <div class="tf-progress-bar">
                                <span style="width: 50%;">
                                    <div class="progress-car">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="14"
                                            viewBox="0 0 21 14" fill="currentColor">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0 0.875C0 0.391751 0.391751 0 0.875 0H13.5625C14.0457 0 14.4375 0.391751 14.4375 0.875V3.0625H17.3125C17.5867 3.0625 17.845 3.19101 18.0104 3.40969L20.8229 7.12844C20.9378 7.2804 21 7.46572 21 7.65625V11.375C21 11.8582 20.6082 12.25 20.125 12.25H17.7881C17.4278 13.2695 16.4554 14 15.3125 14C14.1696 14 13.1972 13.2695 12.8369 12.25H7.72563C7.36527 13.2695 6.39293 14 5.25 14C4.10706 14 3.13473 13.2695 2.77437 12.25H0.875C0.391751 12.25 0 11.8582 0 11.375V0.875ZM2.77437 10.5C3.13473 9.48047 4.10706 8.75 5.25 8.75C6.39293 8.75 7.36527 9.48046 7.72563 10.5H12.6875V1.75H1.75V10.5H2.77437ZM14.4375 8.89937V4.8125H16.8772L19.25 7.94987V10.5H17.7881C17.4278 9.48046 16.4554 8.75 15.3125 8.75C15.0057 8.75 14.7112 8.80264 14.4375 8.89937ZM5.25 10.5C4.76676 10.5 4.375 10.8918 4.375 11.375C4.375 11.8582 4.76676 12.25 5.25 12.25C5.73323 12.25 6.125 11.8582 6.125 11.375C6.125 10.8918 5.73323 10.5 5.25 10.5ZM15.3125 10.5C14.8293 10.5 14.4375 10.8918 14.4375 11.375C14.4375 11.8582 14.8293 12.25 15.3125 12.25C15.7957 12.25 16.1875 11.8582 16.1875 11.375C16.1875 10.8918 15.7957 10.5 15.3125 10.5Z">
                                            </path>
                                        </svg>
                                    </div>
                                </span>
                            </div>
                            <div class="tf-progress-msg">
                                Buy <span class="price fw-6">USD 2999</span> more to enjoy <span class="fw-6">Free
                                    Shipping</span>
                            </div>
                        </div>
                        <div class="tf-page-cart-checkout">
                            <div class="shipping-calculator">
                                <summary
                                    class="accordion-shipping-header d-flex justify-content-between align-items-center collapsed"
                                    data-bs-target="#shipping" data-bs-toggle="collapse" aria-controls="shipping">
                                    <h3 class="shipping-calculator-title">Estimate Shipping</h3>
                                    <span class="shipping-calculator_accordion-icon"></span>
                                </summary>
                            </div>
                            <div class="tf-cart-totals-discounts">
                                <h3>Subtotal</h3>
                                <span class="total-value">USD {{ isset($total) ? $total : 0 }}</span>
                            </div>
                            <div class="tf-cart-totals-discounts">
                                <h3>Shipping</h3>
                                @php
    $total = $total ?? 0;  // Default to 0 if $total is not defined
@endphp
                                {{-- <span class="total-value">USD {{$config['SHIPPINGPRICE']}}</span> --}}
                                <span class="total-value">
    {{ $total < 2999 ? 'USD ' . $config['SHIPPINGPRICE'] : 'Free Delivery' }}
</span>

                            </div>
                            <div class="tf-cart-totals-discounts">
                                <h3>Total</h3>
                                @if($total < 2999)
                                <span class="total-value">USD {{ isset($total) ? $total + $config['SHIPPINGPRICE'] : 0 }}</span>
                                @else
                                <span class="total-value">USD {{  $total }}</span>
                                @endif 
                            </div>
                            
                            <div class="cart-checkbox">
                                <input type="checkbox" class="tf-check" id="check-agree">
                                <label for="check-agree" class="fw-4">
                                    I agree with the <a href="terms-conditions.html">terms and conditions</a>
                                </label>
                            </div>
                            <div class="cart-checkout-btn">
                                <a href="{{route('checkout')}}"
                                    class="tf-btn w-100 btn-fill animate-hover-btn radius-3 justify-content-center">
                                    <span>Check out</span>
                                </a>
                            </div>
                            <div class="tf-page-cart_imgtrust">
                                <p class="text-center fw-6">Guarantee Safe Checkout</p>
                                <div class="cart-list-social">
                                    <div class="payment-item">
                                        <svg viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img"
                                            width="38" height="24" aria-labelledby="pi-visa">
                                            <title id="pi-visa">Visa</title>
                                            <path opacity=".07"
                                                d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z">
                                            </path>
                                            <path fill="#fff"
                                                d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32">
                                            </path>
                                            <path
                                                d="M28.3 10.1H28c-.4 1-.7 1.5-1 3h1.9c-.3-1.5-.3-2.2-.6-3zm2.9 5.9h-1.7c-.1 0-.1 0-.2-.1l-.2-.9-.1-.2h-2.4c-.1 0-.2 0-.2.2l-.3.9c0 .1-.1.1-.1.1h-2.1l.2-.5L27 8.7c0-.5.3-.7.8-.7h1.5c.1 0 .2 0 .2.2l1.4 6.5c.1.4.2.7.2 1.1.1.1.1.1.1.2zm-13.4-.3l.4-1.8c.1 0 .2.1.2.1.7.3 1.4.5 2.1.4.2 0 .5-.1.7-.2.5-.2.5-.7.1-1.1-.2-.2-.5-.3-.8-.5-.4-.2-.8-.4-1.1-.7-1.2-1-.8-2.4-.1-3.1.6-.4.9-.8 1.7-.8 1.2 0 2.5 0 3.1.2h.1c-.1.6-.2 1.1-.4 1.7-.5-.2-1-.4-1.5-.4-.3 0-.6 0-.9.1-.2 0-.3.1-.4.2-.2.2-.2.5 0 .7l.5.4c.4.2.8.4 1.1.6.5.3 1 .8 1.1 1.4.2.9-.1 1.7-.9 2.3-.5.4-.7.6-1.4.6-1.4 0-2.5.1-3.4-.2-.1.2-.1.2-.2.1zm-3.5.3c.1-.7.1-.7.2-1 .5-2.2 1-4.5 1.4-6.7.1-.2.1-.3.3-.3H18c-.2 1.2-.4 2.1-.7 3.2-.3 1.5-.6 3-1 4.5 0 .2-.1.2-.3.2M5 8.2c0-.1.2-.2.3-.2h3.4c.5 0 .9.3 1 .8l.9 4.4c0 .1 0 .1.1.2 0-.1.1-.1.1-.1l2.1-5.1c-.1-.1 0-.2.1-.2h2.1c0 .1 0 .1-.1.2l-3.1 7.3c-.1.2-.1.3-.2.4-.1.1-.3 0-.5 0H9.7c-.1 0-.2 0-.2-.2L7.9 9.5c-.2-.2-.5-.5-.9-.6-.6-.3-1.7-.5-1.9-.5L5 8.2z"
                                                fill="#142688"></path>
                                        </svg>
                                    </div>
                                    <div class="payment-item">
                                        <svg viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" width="38"
                                            height="24" role="img" aria-labelledby="pi-paypal">
                                            <title id="pi-paypal">PayPal</title>
                                            <path opacity=".07"
                                                d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z">
                                            </path>
                                            <path fill="#fff"
                                                d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32">
                                            </path>
                                            <path fill="#003087"
                                                d="M23.9 8.3c.2-1 0-1.7-.6-2.3-.6-.7-1.7-1-3.1-1h-4.1c-.3 0-.5.2-.6.5L14 15.6c0 .2.1.4.3.4H17l.4-3.4 1.8-2.2 4.7-2.1z">
                                            </path>
                                            <path fill="#3086C8"
                                                d="M23.9 8.3l-.2.2c-.5 2.8-2.2 3.8-4.6 3.8H18c-.3 0-.5.2-.6.5l-.6 3.9-.2 1c0 .2.1.4.3.4H19c.3 0 .5-.2.5-.4v-.1l.4-2.4v-.1c0-.2.3-.4.5-.4h.3c2.1 0 3.7-.8 4.1-3.2.2-1 .1-1.8-.4-2.4-.1-.5-.3-.7-.5-.8z">
                                            </path>
                                            <path fill="#012169"
                                                d="M23.3 8.1c-.1-.1-.2-.1-.3-.1-.1 0-.2 0-.3-.1-.3-.1-.7-.1-1.1-.1h-3c-.1 0-.2 0-.2.1-.2.1-.3.2-.3.4l-.7 4.4v.1c0-.3.3-.5.6-.5h1.3c2.5 0 4.1-1 4.6-3.8v-.2c-.1-.1-.3-.2-.5-.2h-.1z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="payment-item">
                                        <svg viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img"
                                            width="38" height="24" aria-labelledby="pi-master">
                                            <title id="pi-master">Mastercard</title>
                                            <path opacity=".07"
                                                d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z">
                                            </path>
                                            <path fill="#fff"
                                                d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32">
                                            </path>
                                            <circle fill="#EB001B" cx="15" cy="12" r="7"></circle>
                                            <circle fill="#F79E1B" cx="23" cy="12" r="7"></circle>
                                            <path fill="#FF5F00"
                                                d="M22 12c0-2.4-1.2-4.5-3-5.7-1.8 1.3-3 3.4-3 5.7s1.2 4.5 3 5.7c1.8-1.2 3-3.3 3-5.7z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="payment-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" role="img"
                                            aria-labelledby="pi-american_express" viewBox="0 0 38 24" width="38"
                                            height="24">
                                            <title id="pi-american_express">American Express</title>
                                            <path fill="#000"
                                                d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3Z"
                                                opacity=".07"></path>
                                            <path fill="#006FCF"
                                                d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32Z">
                                            </path>
                                            <path fill="#FFF"
                                                d="M22.012 19.936v-8.421L37 11.528v2.326l-1.732 1.852L37 17.573v2.375h-2.766l-1.47-1.622-1.46 1.628-9.292-.02Z">
                                            </path>
                                            <path fill="#006FCF"
                                                d="M23.013 19.012v-6.57h5.572v1.513h-3.768v1.028h3.678v1.488h-3.678v1.01h3.768v1.531h-5.572Z">
                                            </path>
                                            <path fill="#006FCF"
                                                d="m28.557 19.012 3.083-3.289-3.083-3.282h2.386l1.884 2.083 1.89-2.082H37v.051l-3.017 3.23L37 18.92v.093h-2.307l-1.917-2.103-1.898 2.104h-2.321Z">
                                            </path>
                                            <path fill="#FFF"
                                                d="M22.71 4.04h3.614l1.269 2.881V4.04h4.46l.77 2.159.771-2.159H37v8.421H19l3.71-8.421Z">
                                            </path>
                                            <path fill="#006FCF"
                                                d="m23.395 4.955-2.916 6.566h2l.55-1.315h2.98l.55 1.315h2.05l-2.904-6.566h-2.31Zm.25 3.777.875-2.09.873 2.09h-1.748Z">
                                            </path>
                                            <path fill="#006FCF"
                                                d="M28.581 11.52V4.953l2.811.01L32.84 9l1.456-4.046H37v6.565l-1.74.016v-4.51l-1.644 4.494h-1.59L30.35 7.01v4.51h-1.768Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="payment-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 38 24"
                                            width="38" height="24" aria-labelledby="pi-amazon">
                                            <title id="pi-amazon">Amazon</title>
                                            <path
                                                d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"
                                                fill="#000" fill-rule="nonzero" opacity=".07"></path>
                                            <path
                                                d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"
                                                fill="#FFF" fill-rule="nonzero"></path>
                                            <path
                                                d="M25.26 16.23c-1.697 1.48-4.157 2.27-6.275 2.27-2.97 0-5.644-1.3-7.666-3.463-.16-.17-.018-.402.173-.27 2.183 1.504 4.882 2.408 7.67 2.408 1.88 0 3.95-.46 5.85-1.416.288-.145.53.222.248.47v.001zm.706-.957c-.216-.328-1.434-.155-1.98-.078-.167.024-.193-.148-.043-.27.97-.81 2.562-.576 2.748-.305.187.272-.047 2.16-.96 3.063-.14.138-.272.064-.21-.12.205-.604.664-1.96.446-2.29h-.001z"
                                                fill="#F90" fill-rule="nonzero"></path>
                                            <path
                                                d="M21.814 15.291c-.574-.498-.676-.73-.993-1.205-.947 1.012-1.618 1.315-2.85 1.315-1.453 0-2.587-.938-2.587-2.818 0-1.467.762-2.467 1.844-2.955.94-.433 2.25-.51 3.25-.628v-.235c0-.43.033-.94-.208-1.31-.212-.333-.616-.47-.97-.47-.66 0-1.25.353-1.392 1.085-.03.163-.144.323-.3.33l-1.677-.187c-.14-.033-.296-.153-.257-.38.386-2.125 2.223-2.766 3.867-2.766.84 0 1.94.234 2.604.9.842.82.762 1.918.762 3.11v2.818c0 .847.335 1.22.65 1.676.113.164.138.36-.003.482-.353.308-.98.88-1.326 1.2a.367.367 0 0 1-.414.038zm-1.659-2.533c.34-.626.323-1.214.323-1.918v-.392c-1.25 0-2.57.28-2.57 1.82 0 .782.386 1.31 1.05 1.31.487 0 .922-.312 1.197-.82z"
                                                fill="#221F1F"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {



            $(".changeqty").click(function() {
                var count_input = $(this).closest('.cart-quantity-inputs').find(".count-input");
                var qty = $(count_input).val()
                var rowid = $(count_input).data('cart_id')
                var price = $(count_input).data('price')
                // console.log(qty + " " + rowid + " " + " "+price)

                if ($(this).hasClass('minuss')) {
                    if (qty > 1) {
                        $(count_input).val(--qty)
                        var total = (price * qty).toFixed(2);
                        // $(this).closest('.cart_data').find('.cart-row-subtotal').text("$" + total)
                        // $(".trash > h5").text("$" + total)
                    }
                } else if ($(this).hasClass('pluss')) {
                    $(count_input).val(++qty)
                    var total = (price * qty).toFixed(2);
                    // $(this).closest('.cart_data').find('.cart-row-subtotal').text("$" + total)
                    // $(".trash > h5").text("$" + total)
                }

                var token = $('meta[name="csrf-token"]').attr("content");
                var url = '{{ url('update-cart') }}';
                $.ajax({
                    url: url,
                    type: 'post',
                    data: {
                        rowid: rowid,
                        qty: qty,
                        price: price,
                        _token: token
                    },
                    success: function(response) {
                        if (response.status == 1) {

                            $.toast({
                                heading: 'Success!',
                                position: 'bottom-right',
                                text: 'Quantity Updated',
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 2000,
                                stack: 6
                            });
                            location.reload();

                        } else if (response.status == 2) {
                            $.toast({
                                heading: 'Erorr!',
                                position: 'bottom-right',
                                text: 'Quantity Not Available in Stock',
                                loaderBg: '#fd1d1d',
                                icon: 'error',
                                hideAfter: 2000,
                                stack: 6
                            });
                        }
                        // setInterval(() => {
                        //     location.reload();
                        // }, 2000);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });


            })

            $('.cart-delete').click(function() {
                var id = $(this).data('id');
                var token = $('meta[name="csrf-token"]').attr("content");
                var url = '{{ url('remove-cart') }}';
                $.ajax({
                    url: url,
                    type: 'post',
                    data: {
                        rowid: id,
                        _token: token
                    },
                    success: function() {
                        $.toast({
                            heading: 'Success!',
                            position: 'bottom-right',
                            text: 'Item removed!',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3000,
                            stack: 6
                        });
                        setInterval(() => {
                            location.reload();
                        }, 2000);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });


        })()
    </script>
@endsection

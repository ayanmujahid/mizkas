@extends('layouts.main')
@section('content')
<section class="tf-slideshow slideshow-effect slider-effect-fade position-relative">
    <div dir="ltr" class="swiper tf-sw-effect">
        <div class="swiper-wrapper">
            <div class="swiper-slide" lazy="true">
                <div class="slider-effect wrap-slider">
                    <div class="content-left bg-white">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="box-content">
                                        <h1 class="heading fade-item fade-item-1">Crafted in the<br> Spirit of Tradition</h1>
                                        <p class="desc fade-item fade-item-2">Every fabric tells a story.</p>
                                        <a href="{{ route('products') }}" class="fade-item fade-item-3 tf-btn btn-light-icon animate-hover-btn btn-xl radius-3"><span>Shop collection</span><i class="icon icon-arrow-right"></i></a>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="img-slider">
                        <img class="lazyload" data-src="{{asset('assets/images/banners/mizkas-01.png')}}" alt="fashion-slideshow" src="{{asset('assets/images/banners/mizkas-01.png')}}" alt="fashion-slideshow">
                    </div>
                </div>
            </div>
            <div class="swiper-slide" lazy="true">
                <div class="slider-effect wrap-slider">
                    <div class="content-left bg-white">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="box-content">
                                        <h1 class="heading fade-item fade-item-1">A Symphony of<br> Silk and Soul</h1>
                                        <p class="desc fade-item fade-item-2">Where tradition meets timeless beauty.</p>
                                        <a href="{{ route('products') }}" class="fade-item fade-item-3 tf-btn btn-light-icon animate-hover-btn btn-xl radius-3"><span>Shop collection</span><i class="icon icon-arrow-right"></i></a>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="img-slider">
                        <img class="lazyload" data-src="{{asset('assets/images/banners/mizkas-03.png')}}" src="{{asset('assets/images/banners/mizkas-03.png')}}" alt="fashion-slideshow">
                    </div>
                </div>
            </div>
            <div class="swiper-slide" lazy="true">
                <div class="slider-effect wrap-slider">
                    <div class="content-left bg-white">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="box-content">
                                        <h1 class="heading fade-item fade-item-1">Winter<br> Collection</h1>
                                        <p class="desc fade-item fade-item-2">Embrace the chill with our cozy winter collection, where warmth meets style!</p>
                                        <a href="{{ route('products') }}" class="fade-item fade-item-3 tf-btn btn-light-icon animate-hover-btn btn-xl radius-3"><span>Shop collection</span><i class="icon icon-arrow-right"></i></a>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="img-slider">
                        <img class="lazyload" data-src="{{asset('assets/images/banners/mizkas-02.png')}}" src="{{asset('assets/images/banners/mizkas-02.png')}}" alt="fashion-slideshow">
                    </div>
                </div>
            </div>
          
           
        </div>
    </div>
    <div class="wrap-pagination">
        <div class="container">
            <div class="sw-dots line-pagination sw-pagination-slider"></div>
        </div>
    </div>
</section>
<!-- /Slider -->
<!-- Collection -->
<section class="flat-spacing-12 bg_grey-3">
    <div class="container">
        <div class="flat-title flex-row justify-content-between align-items-center px-0 wow fadeInUp" data-wow-delay="0s">
            <h3 class="title">Collections</h3>
            <a href="{{ route('products') }}" class="tf-btn btn-line">View all Products<i class="icon icon-arrow1-top-left"></i></a>
        </div>
        <div class="hover-sw-nav hover-sw-2">
            
            <div dir="ltr" class="swiper tf-sw-collection" data-preview="6" data-tablet="3" data-mobile="2" data-space-lg="50" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                <div class="swiper-wrapper">
                    @foreach ($categories as $category)
                    <div class="swiper-slide" lazy="true">
                        <div class="collection-item-circle hover-img">
                            <a href="{{ route('products', $category->slug) }}" class="collection-image img-style">
                                <img class="lazyload" data-src="{{asset($category->img_path)}}" src="{{asset($category->img_path)}}" alt="collection-img">
                            </a>
                            <div class="collection-content text-center">
                                <a href="{{ route('products', $category->slug) }}" class="link title fw-5">{{ $category->title }}</a>
                                <div class="count">{{ $category->products_count }} items</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="swiper-slide" lazy="true">
                        <div class="collection-item-circle hover-img">
                            <a href="shop-collection-sub.html" class="collection-image img-style">
                                <img class="lazyload" data-src="{{asset('assets/images/collections/collection-circle-2.jpg')}}" src="{{asset('assets/images/collections/collection-circle-2.jpg')}}" alt="collection-img">  
                            </a>
                            <div class="collection-content text-center">
                                <a href="shop-collection-sub.html" class="link title fw-5">Men’s</a>
                                <div class="count">9 items</div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" lazy="true">
                        <div class="collection-item-circle hover-img">
                            <a href="shop-collection-sub.html" class="collection-image img-style">
                                <img class="lazyload" data-src="{{asset('assets/images/collections/collection-circle-3.jpg')}}" src="{{asset('assets/images/collections/collection-circle-3.jpg')}}" alt="collection-img">   
                            </a>
                            <div class="collection-content text-center">
                                <a href="shop-collection-sub.html" class="link title fw-5">Jewelry</a>
                                <div class="count">31 items</div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" lazy="true">
                        <div class="collection-item-circle hover-img">
                            <a href="shop-collection-sub.html" class="collection-image img-style">
                                <img class="lazyload" data-src="{{asset('assets/images/collections/collection-circle-4.jpg')}}" src="{{asset('assets/images/collections/collection-circle-4.jpg')}}" alt="collection-img">    
                            </a>
                            <div class="collection-content text-center">
                                <a href="shop-collection-sub.html" class="link title fw-5">Sneakers</a>
                                <div class="count">21 items </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" lazy="true">
                        <div class="collection-item-circle hover-img">
                            <a href="shop-collection-sub.html" class="collection-image img-style">
                                <img class="lazyload" data-src="{{asset('assets/images/collections/collection-circle-5.jpg')}}" src="{{asset('assets/images/collections/collection-circle-5.jpg')}}" alt="collection-img">      
                            </a>
                            <div class="collection-content text-center">
                                <a href="shop-collection-sub.html" class="link title fw-5">Bags</a>
                                <div class="count">5 items </div>
                            </div>
                        </div> 
                    </div>
                    <div class="swiper-slide" lazy="true">
                        <div class="collection-item-circle hover-img">
                            <a href="shop-collection-sub.html" class="collection-image img-style">
                                <img class="lazyload" data-src="{{asset('assets/images/collections/collection-circle-6.jpg')}}" src="{{asset('assets/images/collections/collection-circle-6.jpg')}}" alt="collection-img">   
                            </a>
                            <div class="collection-content text-center">
                                <a href="shop-collection-sub.html" class="link title fw-5">Glasses</a>
                                <div class="count">14 items</div>
                            </div>
                        </div> 
                    </div>
                    <div class="swiper-slide" lazy="true">
                        <div class="collection-item-circle hover-img">
                            <a href="shop-collection-sub.html" class="collection-image img-style">
                                <img class="lazyload" data-src="{{asset('assets/images/collections/collection-circle-7.jpg')}}" src="{{asset('assets/images/collections/collection-circle-7.jpg')}}" alt="collection-img">    
                            </a>
                            <div class="collection-content text-center">
                                <a href="shop-collection-sub.html" class="link title fw-5">New arrivals</a>
                                <div class="count">31 items </div>
                            </div>
                        </div> 
                    </div> --}}
                </div>
            </div>
            
            <div class="sw-dots style-2 sw-pagination-collection justify-content-center"></div>
            <div class="nav-sw nav-next-slider nav-next-collection"><span class="icon icon-arrow-left"></span></div>
            <div class="nav-sw nav-prev-slider nav-prev-collection"><span class="icon icon-arrow-right"></span></div>
        </div>
    </div>
</section>
<!-- /Collection -->
<!-- Sale Product -->
<section class="flat-spacing-17">
    <div class="container">
        <div class="flat-animate-tab">
            <ul class="widget-tab-3 d-flex justify-content-center wow fadeInUp" data-wow-delay="0s" role="tablist">
                <li class="nav-tab-item" role="presentation">   
                    <a href="#bestSeller" class="active" data-bs-toggle="tab">Best seller</a>
                </li>
                {{-- <li class="nav-tab-item" role="presentation">
                    <a href="#newArrivals"  data-bs-toggle="tab">New arrivals</a>
                </li> --}}
                {{-- <li class="nav-tab-item" role="presentation">
                    <a href="#onSale" data-bs-toggle="tab">On Sale</a>
                </li> --}}
            </ul>
            <div class="tab-content">
                <div class="tab-pane active show" id="bestSeller" role="tabpanel">
                    <div class="grid-layout loadmore-item" data-grid="grid-4">
                        <!-- card product 1 -->
                        @foreach ($products as $product)
                        @if ($product->is_featured == 1)
                        
                        <div class="card-product fl-item">
                            <div class="card-product-wrapper">
                                <a href="{{ route('product-detail', $product->slug) }}" class="product-img">
                                    <img class="lazyload img-product" data-src="{{asset($product->img_path)}}" src="{{asset($product->img_path)}}" alt="image-product">
                                    <img class="lazyload img-hover" data-src="{{asset($product->img_path)}}" src="{{asset($product->img_path)}}" alt="image-product">
                                </a>
                                <div class="list-product-btn">
                                    {{-- <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                        <span class="icon icon-bag"></span>
                                        <span class="tooltip">Quick Add</span>
                                    </a>--}}
                                    <a href="javascript:void(0);" data-id="{{ $product->id }}" class="box-icon bg_white wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Add to Wishlist</span>
                                        <span class="icon icon-delete"></span>
                                    </a> 
                                    {{-- <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">Add to Compare</span>
                                        <span class="icon icon-check"></span>
                                    </a> --}}
                                    <a href="{{ route('product-detail', $product->slug) }}" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                        <span class="icon icon-view"></span>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="size-list">
                                    <span>S</span>
                                    <span>M</span>
                                    <span>L</span>
                                    <span>XL</span>
                                </div>
                            </div>
                            <div class="card-product-info">
                                <a href="{{ route('product-detail', $product->slug) }}" class="title link">{{$product->title}}</a>
                                <span class="price" style="font-size: 20px;">PKR {{$product->price}}</span>
                                <span class="price" style="text-decoration: line-through;">PKR {{$product->old_price}}</span>
                                {{-- <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active">
                                        <span class="tooltip">Orange</span>
                                        <span class="swatch-value bg_orange-3"></span>
                                        <img class="lazyload" data-src="{{asset('assets/images/products/orange-1.jpg')}}" src="{{asset('assets/images/products/orange-1.jpg')}}" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="tooltip">Black</span>
                                        <span class="swatch-value bg_dark"></span>
                                        <img class="lazyload" data-src="{{asset('assets/images/products/black-1.jpg')}}" src="{{asset('assets/images/products/black-1.jpg')}}" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="tooltip">White</span>
                                        <span class="swatch-value bg_white"></span>
                                        <img class="lazyload" data-src="{{asset('assets/images/products/white-1.jpg')}}" src="{{asset('assets/images/products/white-1.jpg')}}" alt="image-product">
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                        @endif
                        @endforeach
                        
                    </div>
                    <div class="tf-pagination-wrap view-more-button text-center">
                        <button class="tf-btn-loading tf-loading-default style-2 btn-loadmore "><span class="text">Load more</span></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- /Sale Product -->
<!-- Banner Collection -->
<section>
    <div class="container-full">
        <div dir="ltr" class="swiper tf-sw-recent" data-preview="3" data-tablet="3" data-mobile="1.3" data-space-lg="30" data-space-md="15" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
            <div class="swiper-wrapper">
                <div class="swiper-slide" lazy="true">
                    <div class="collection-item-v4 hover-img">
                        <div class="collection-inner">
                            <a href="https://mizkasapparel.store/products/new-collection" class="collection-image img-style">
                                <img class="lazyload" data-src="{{asset('assets/images/banners/banner1.png')}}" src="{{asset('assets/images/banners/sales-banner-01.png')}}" alt="collection-img">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" lazy="true">
                    <div class="collection-item-v4 hover-img">
                        <div class="collection-inner">
                            <a href="https://mizkasapparel.store/products/new-collection" class="collection-image img-style">
                                <img class="lazyload" data-src="{{asset('assets/images/banners/sales-banner-01.png')}}" src="{{asset('assets/images/banners/banner-winter.png')}}" alt="collection-img">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" lazy="true">
                    <div class="collection-item-v4 hover-img">
                        <div class="collection-inner">
                            <a href="https://mizkasapparel.store/products/new-collection" class="collection-image img-style">
                                <img class="lazyload" data-src="{{asset('assets/images/banners/banner3.png')}}" src="{{asset('assets/images/banners/banner-new.png')}}" alt="collection-img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Banner Collection -->
<!-- Testimonial Section -->
<section class="flat-spacing-12 bg_grey-3">
    <div class="container">
        <div class="flat-title flex-row justify-content-between align-items-center px-0 wow fadeInUp" data-wow-delay="0s">
            <h3 class="title">What Our Customers Say</h3>
        </div>

        <div class="hover-sw-nav hover-sw-2">
            <div dir="ltr" 
                class="swiper tf-sw-testimonial" 
                data-preview="3" 
                data-tablet="2" 
                data-mobile="1" 
                data-space-lg="40" 
                data-space-md="20" 
                data-space="15" 
                data-loop="true" 
                data-auto-play="true">

                <div class="swiper-wrapper">

                    <!-- Testimonial 1 -->
                    <div class="swiper-slide" lazy="true">
                        <div class="testimonial-item p-4 bg-white radius-3 shadow-sm">
                            <h6 class="fw-6 mb-1">Ayesha Khan</h6>
                            <small class="text-muted d-block mb-3">Verified Customer</small>
                            <p class="testimonial-text">
                                “Amazing quality and beautiful designs! The customized product exceeded all my expectations.”
                            </p>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="swiper-slide" lazy="true">
                        <div class="testimonial-item p-4 bg-white radius-3 shadow-sm">
                            <h6 class="fw-6 mb-1">Muhammad Ali</h6>
                            <small class="text-muted d-block mb-3">Verified Customer</small>
                            <p class="testimonial-text">
                                “Fast shipping and great service. The winter collection is super comfortable and stylish!”
                            </p>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="swiper-slide" lazy="true">
                        <div class="testimonial-item p-4 bg-white radius-3 shadow-sm">
                            <h6 class="fw-6 mb-1">Sarah Ahmed</h6>
                            <small class="text-muted d-block mb-3">Verified Customer</small>
                            <p class="testimonial-text">
                                “Absolutely love the designs! This is now my favorite place to shop.”
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="sw-dots style-2 sw-pagination-testimonial justify-content-center mt-3"></div>
            <div class="nav-sw nav-next-slider nav-next-testimonial"><span class="icon icon-arrow-left"></span></div>
            <div class="nav-sw nav-prev-slider nav-prev-testimonial"><span class="icon icon-arrow-right"></span></div>
        </div>
    </div>
</section>
<!-- /Testimonial Section -->

<!-- Icon box -->
<section class="flat-spacing-1 flat-iconbox">
    <div class="container">
        <div class="wrap-carousel wrap-mobile wow fadeInUp" data-wow-delay="0s">
            <div dir="ltr" class="swiper tf-sw-mobile" data-preview="1" data-space="15">
                <div class="swiper-wrapper wrap-iconbox">
                    <div class="swiper-slide">
                        <div class="tf-icon-box style-row">
                            <div class="icon">
                                <i class="icon-shipping"></i>
                            </div>
                            <div class="content">
                                <div class="title fw-4">Free Shipping</div>
                                <p>Free shipping over order PKR5999</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tf-icon-box style-row">
                            <div class="icon">
                                <i class="icon-payment fs-22"></i>
                            </div>
                            <div class="content">
                                <div class="title fw-4">Flexible Payment</div>
                                <p>Pay with Multiple Credit Cards</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tf-icon-box style-row">
                            <div class="icon">
                                <i class="icon-return fs-20"></i>
                            </div>
                            <div class="content">
                                <div class="title fw-4">7 Day Returns</div>
                                <p>Terms & Conditions Applied</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tf-icon-box style-row">
                            <div class="icon">
                                <i class="icon-suport"></i>
                            </div>
                            <div class="content">
                                <div class="title fw-4">Premium Support</div>
                                <p>Outstanding premium support</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="sw-dots style-2 sw-pagination-mb justify-content-center"></div>
        </div>
    </div>
</section>
<!-- /Icon box -->
<!-- Location -->
<section>
    <div class="container">
        <div class="flat-location">
            <div class="banner-map">
                <img class="lazyload" data-src="{{asset('assets/images/country/map-1.jpg')}}" src="{{asset('assets/images/country/map-1.jpg')}}" alt="map">
            </div>
            <div class="content">
                <h3 class="heading wow fadeInUp" data-wow-delay="0s">Toronto Store</h3>
                <p class="subtext wow fadeInUp" data-wow-delay="0s">
                    301 Front St W Toronto, Canada
                    <br>
                    support@ecomus.com
                    <br>
                    (08) 8942 1299
                </p>
                <p class="subtext wow fadeInUp" data-wow-delay="0s">
                    Mon - Fri, 8:30am - 10:30pm
                    <br>
                    Saturday, 8:30am - 10:30pm
                    <br>
                    Sunday Closed
                </p>
                <a href="https://maps.app.goo.gl/RKWwwsLvWKtvTHNq8" target="_self" class="tf-btn btn-line collection-other-link fw-6 wow fadeInUp" data-wow-delay="0s">Get Directions<i class="icon icon-arrow1-top-left"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- /Location -->

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
            /*in page js here*/
        })()
    </script>
    <script>
        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headeUSD {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // Click event for adding/removing from wishlist
        $(".wishlist").click(function (e) {
            e.preventDefault();
            
            let $this = $(this);
            let productid = $this.data("id");
            let isAdded = $this.hasClass("added");  // Check if product is already in the wishlist
            
            // Determine the correct route and message
            let url = isAdded ? "{{ route('remove.from.wishlist') }}" : "{{ route('add.to.wishlist') }}";
            let successMessage = isAdded ? "Product Removed from Wishlist" : "Product Added to Wishlist";
            
            // AJAX request for add/remove wishlist
            $.ajax({
                type: "post",
                url: url,
                data: { productid: productid },
                dataType: "json",
                
                success: function (msg) {
                    if (msg.status === 1) {
                        // Toggle 'added' class and update icon/text
                        $this.toggleClass("added");
                        $this.find(".tooltip").text(isAdded ? "Add to Wishlist" : "Remove from Wishlist");
    
                        // Update wishlist count dynamically
                        updateWishlistCount();
    
                        // Display success message
                        $.toast({
                            heading: 'Success!',
                            position: 'bottom-right',
                            text: successMessage,
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 2000,
                            stack: 6
                        });
                    }
                },
                beforeSend: function () {
                    // Optionally show a loader or change button state before sending request
                }
            });
        });
    
        // Function to update wishlist count
        function updateWishlistCount() {
            $.ajax({
                type: "get",
                url: "{{ route('wishlist.count') }}",  // Define a route to get the wishlist count
                success: function (response) {
                    // Update the count-box element with the new count
                    $(".count-box").text(response.count);
                }
            });
        }
    </script>
    
@endsection

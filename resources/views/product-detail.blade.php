@extends('layouts.main')
@section('content')

<section class="product-detail_section">
    <div class="container">
        <div class="row ">
            <div class="col-md-6">
                <div class="swiper mySwiperMain">
                    <div class="swiper-wrapper">

                        <!-- Main Image -->
                        <div class="swiper-slide">
                            <div class="img-magnifier-container">
                                <img src="{{ asset($product->img_path) }}" class="img-fluid rounded zoomable" alt="Main Image">
                            </div>
                        </div>


                        <!-- Other Product Images -->
                        @foreach ($product_other_imgs as $image)
                        <div class="swiper-slide">
                            <div class="img-magnifier-container">
                                <img src="{{ asset($image->img_path) }}" class="img-fluid rounded zoomable" alt="Product Image">
                            </div>
                        </div>
                        @endforeach

                        <!-- Variation Images -->
                        @foreach ($variations as $variation)
                        <div class="swiper-slide">
                            <div class="img-magnifier-container">
                                <img src="{{ asset($variation->img_path) }}" class="img-fluid rounded zoomable" alt="Variation Image">
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <!-- Pagination (visible only on mobile) -->
                    <div class="swiper-pagination d-md-none"></div>
                </div>

                <!-- Thumbnail Slider (hidden on mobile) -->
                <div class="swiper mySwiperThumbs mt-3  d-md-block">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <img src="{{ asset($product->img_path) }}" class="thumb" alt="">
                        </div>

                        @foreach ($product_other_imgs as $image)
                        <div class="swiper-slide">
                            <img src="{{ asset($image->img_path) }}" class="thumb" alt="">
                        </div>
                        @endforeach

                        @foreach ($variations as $variation)
                        <div class="swiper-slide">
                            <img src="{{ asset($variation->img_path) }}" class="thumb" alt="">
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-cont">
                    <div class="detail_top">
                        <a href="{{route('welcome')}}">Home/</a>
                        <a href="{{route('products')}}">Products/</a>
                        <p>{{ $product->title }}</p>
                    </div>
                    <div class="detail_heading">
                        <h3 class="title3">{{ $product->title }}</h3>
                    </div>
                    <ul class="detail_list">
                        <li>100% satisfaction guarantee</li>
                        <li>In stock</li>
                        <li>Shipping 4 to 5 business days</li>
                    </ul>
                    <div class="sizesSelectorMain ">
                        <!-- <p>Size : <span class="size-selector"></span></p> -->
                        <ul class="sizes">
                            @foreach($sizes as $size)

                            <li style="

    height: 23px;
    /* background-color:green; */
    width: 24px;
    text-align: center;
    border: black solid 1px;
    border-radius: 4px;
    
    "><a href="javascript:;" class="size-btn 
                                    " data-id="{{$size->id}}" data-value="{{$size->symbol}}">{{$size->symbol}}</a></li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="sizesMain colorsSelectorMain d-none">
                        <p>Select Color : <span class="color-selector"></span></p>
                        <ul class="color">
                            @foreach($colors as $color)
                            @php
                            $variations = App\Models\Variation::where('color_id', $color->id)->where('product_id', $product->id)->get();

                            @endphp
                            <li style="background-color: {{$color->code}};" class="
                                    color-button-item
                                    @foreach($variations as $variation) 
                                    available-size-{{$variation->size_id}}
                                    @endforeach" data-id="{{$color->id}}" data-value="{{$color->name}}"><a href="javascript:;" class="color-btn"></a></li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="product-price">
                        <h3 class="title7">
                            <span id="product-price-holder">Price PKR {{$product->price}}</span>
                        </h3>
                        <span id="product-price-holder" style="font-size: 15px;text-decoration: line-through;margin-top: 0px;">Old Price PKR {{$product->old_price}}</span> </h3>
                        <hr style="background: #808080;">
                    </div>
                    <div class="detail_btns">
                        <form action="{{ route('save-cart') }}" method="POST">
                            @csrf
                            <div class="product-quantity">
                                <h3 class="title5">Quantity:</h3>
                                <div class="cart-icons cart-quantity-inputs">
                                    <button type="button" class="changeqty minuss"><i class="bx bx-minus"></i></button>
                                    <input type="text" class="count count-input" id="" value="1" min="1" name="qty">
                                    <button type="button" class="changeqty pluss"><i class="bx bx-plus "></i></button>
                                </div>
                            </div>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" id="cart-price" name="price" value="{{ $product->price }}">

                            <input type="hidden" name="variation_id" value="">
                            <button type="submit" class="add to cart btn w-100">Add to Cart</button>
                        </form>
                        {{-- <a href="{{ route('cart') }}" class="btn">Add to Cart |
                        USD{{ $product->price }}</a> --}}
                        <form method="post" action="{{route('customizer')}}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="variation_id" value="" required>
                            <input type="hidden" id="customizer-price" name="price" value="{{$config['CUSTOMPRODUCTPRICE']}}">
                            @if($is_customized_category)
                            <button class="btn w-100 my-2" id="customizerr-btn" disabled>Customizer</button>
                            @endif


                        </form>

                        <!--<a href="#" class="btn">Customize!</a>-->
                        <!--<div class="shipping"> FREE SHIPPING ON ORDERS OVER $200</div>-->
                    </div>

                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="detail_accord">
                    <h3 class="title4">Description</h3>
                    {!! $product->long_desc !!}
                    <!--<ul class="detail_of_Product">-->
                    <!--                    <li>4.2 oz./yd² (US) 7 oz./L yd (CA), 100% Airlume combed and ring-spun-->
                    <!--                        cotton, 32 singles</li>-->
                    <!--                    <li>Ash is 99/1 Airlume combed and ring-spun cotton/polyester</li>-->
                    <!--                    <li>Pre-shrunk</li>-->
                    <!--                    <li>Retail fit</li>-->
                    <!--                    <li>Unisex sizing</li>-->
                    <!--                    <li>Cover stitched collar and sleeves</li>-->
                    <!--                    <li>Shoulder-to-shoulder taping</li>-->
                    <!--                    <li>Side seams</li>-->
                    <!--                    <li>Tear away label</li>-->
                    <!--                </ul>-->
                </div>
            </div>
            <section class="contact">
                <div class="container">
                    <div class="row">
                        <div class="Review">
                            @if (!$reviews->isEmpty())
                            <h3 class="py-2">Review Highlights</h3>
                            @foreach ($reviews as $review)
                            <div class="review-card">
                                <ul>
                                    <li>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i
                                            class="{{ $i <= $review->rating ? 'bx bxs-star fill-star' : 'bx bx-star' }}"></i>
                                            @endfor
                                            </i>
                                    </li>
                                    <span>({{ $review->rating }})</span>
                                </ul>
                                <p>{{ $review->message }}</p>
                            </div>
                            @endforeach
                            @else
                            <h3 class="py-5">No Review Available</h3>
                            @endif


                        </div>
                        <form action="{{ route('add-review') }}" class="contact__formm" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="tab_opened" value="show active">
                            <div class="contact__mainCon">
                                <h2 class="py-3">Add A Review</h2>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="contact_feild">
                                        <input type="text" placeholder="Enter your full name" name="full_name"
                                            value="{{ old('full_name') }}">
                                        @if ($errors->has('full_name'))
                                        <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact_feild">
                                        <input type="email" placeholder="Enter your Email" name="email"
                                            value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="contact_feild">
                                        <textarea rows="6" placeholder="Leave a comment...." name="message">{{ old('message') }}</textarea>
                                        @if ($errors->has('message'))
                                        <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="section-content">
                                        <div class="contact__mainCon">
                                            <h2>Your Rating</h2>
                                        </div>
                                        <div class="working-rating">
                                            <input type="radio" id="star5" name="rating" value="5"
                                                {{ old('rating') == '5' ? 'checked' : '' }}>
                                            <label class="star" for="star5" title="Awesome"></label>
                                            <input type="radio" id="star4" name="rating" value="4"
                                                {{ old('rating') == '4' ? 'checked' : '' }}>
                                            <label class="star" for="star4" title="Great"></label>
                                            <input type="radio" id="star3" name="rating" value="3"
                                                {{ old('rating') == '3' ? 'checked' : '' }}>
                                            <label class="star" for="star3" title="Very good"></label>
                                            <input type="radio" id="star2" name="rating" value="2"
                                                {{ old('rating') == '2' ? 'checked' : '' }}>
                                            <label class="star" for="star2" title="Good"></label>
                                            <input type="radio" id="star1" name="rating" value="1"
                                                {{ old('rating') == '1' ? 'checked' : '' }}>
                                            <label class="star" for="star1" title="Bad"></label>
                                        </div>
                                        @if ($errors->has('rating'))
                                        <span class="text-danger">{{ $errors->first('rating') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="contact-form__fields">
                                        <button class="btn">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </section>
            <div class="col-md-12">
                <div class="faqs">
                    <div class="faqs_head">
                        <h3>FAQs</h3>
                        <div class="faq_btn">
                            <a href="#" class="btn">Know more</a>
                        </div>
                    </div>
                    <div class="faq_accord">
                        @foreach ($faqs as $faq)
                        <div class="accordion" id="accordionExample">


                            <div class="card">

                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class=" btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapsefour"
                                            aria-expanded="true"
                                            aria-controls="collapsefour">{{ $faq->question }}</button>
                                    </h2>
                                </div>

                                <div id="collapsefour" class="collapse " aria-labelledby="headingfour"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="faq_con">
                                            <p>
                                                {!! $faq->answer !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if($relatedProduct->count())
<div class="rp-wrapper">
    <h3 class="rp-heading">You may also like</h3>

    <div class="row">
        @foreach($relatedProduct as $item)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="rp-card">
                    <a href="{{ route('product-detail', $item->slug) }}" class="rp-link">
                        <div class="rp-image-box">
                            <img src="{{ asset($item->img_path) }}" alt="{{ $item->name }}">
                        </div>

                        <div class="rp-content">
                            <h5 class="rp-title">{{ $item->name }}</h5>
                            <span class="rp-price">${{ number_format($item->price, 2) }}</span>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif


<!-- Footer -->
@endsection
@section('css')
<style type="text/css">
    /*in page css here*/
    img.w-100.back-image {
        display: none;
    }

    li.color-button-item.available-size-410.available-size-409.available-size-408.available-size-407.active {
        border: 2px solid red;
    }

    button#add-to-cart-btn {
        border: 1px solid;
        color: white;
        background: black;
    }

    /* Style for the default state of the li */
    .sizes li {
        height: 23px;
        width: 24px;
        text-align: center;
        border: black solid 1px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    /* Style for the active state of the li */
    .sizes li.active {
        background-color: green;
        /* Change background when active */
        color: white;
        /* Change text color */
    }

    /* Optional: style for the a tag inside li */
    .sizes a.size-btn {
        display: inline-block;
        width: 100%;
        height: 100%;
        line-height: 23px;
        /* Make the text vertically centered */
        text-decoration: none;
        color: black;
        /* Default text color */
    }

    /* Optional: active state for the a tag itself */
    .sizes li.active a {
        color: white;
        /* Make the active text white */
    }

    input.count.count-input {
        width: 22%;
        margin: 14px;
        /* padding: 9px; */
        text-align: center;
    }

    .img-magnifier-container {
        position: relative;
    }

    .img-magnifier-glass {
        position: absolute;
        border: 3px solid #000;
        border-radius: 50%;
        cursor: none;
        /* size of magnifier */
        width: 120px;
        height: 120px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.4);
    }
</style>
<style>
/* ===== Related Products (Premium) ===== */
.rp-wrapper {
    margin-top: 80px;
}

.rp-heading {
    font-size: 22px;
    font-weight: 500;
    letter-spacing: 0.3px;
    margin-bottom: 35px;
    color: #111;
}

/* Card */
.rp-card {
    background: #ffffff;
    border-radius: 18px;
    overflow: hidden;
    transition: transform 0.35s ease, box-shadow 0.35s ease;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
    height: 100%;
}

.rp-link {
    display: block;
    text-decoration: none;
    color: inherit;
}

/* Image */
.rp-image-box {
    position: relative;
    background: #f7f7f7;
    overflow: hidden;
}

.rp-image-box img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

/* Content */
.rp-content {
    padding: 18px 16px 22px;
    text-align: center;
}

.rp-title {
    font-size: 15px;
    font-weight: 400;
    color: #222;
    margin-bottom: 8px;
    line-height: 1.5;
}

/* Price */
.rp-price {
    font-size: 15px;
    font-weight: 500;
    color: #000;
}

/* Hover — subtle & premium */
.rp-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.10);
}

.rp-card:hover .rp-image-box img {
    transform: scale(1.06);
}
button.add.to.cart.btn.w-100 {
    border: 1px solid;
    color: white;
    background: #000;
}

button.add.to.cart.btn.w-100:hover {
    background: #fff;
    color: #000;
}

/* Mobile */
@media (max-width: 768px) {
    .rp-image-box img {
        height: 220px;
    }

    .rp-heading {
        font-size: 20px;
    }
}

</style>

@endsection
@section('js')
<script type="text/javascript">
    $('.size-btn').click(function() {
        $('.size-btn').not(this).removeClass('active');
        var sizeId = $(this).attr('data-id');
        $(this).addClass('active');



        var colorId = $('.color-button-item.active').attr('data-id');
        var productId = $('input[name="product_id"]').val();


        $('.colorsSelectorMain').removeClass('d-none');
        $('.color-button-item').parent().hide();
        $('.color-button-item').removeClass('active');
        $('.color-button-item.available-size-' + sizeId).parent().show();


        $('#add-to-cart-btn').prop('disabled', true);
        $('.product-simple-images').show();
        $('.varation-images').hide();

        if (colorId !== undefined) {
            // Call the function to fetch price and variation ID
            // fetchPriceAndVariation(sizeId, colorId, productId);
        }


    });


    $('.color-button-item').click(function() {
        $('.color-button-item').not(this).removeClass('active');
        var colorId = $(this).attr('data-id');
        $(this).addClass('active');


        var sizeId = $('.size-btn.active').attr('data-id');
        var productId = $('input[name="product_id"]').val();

        //   $('.sizesSelectorMain').removeClass('d-none');
        //   $('.size-btn').parent().hide();
        //   $('.size-btn').removeClass('active');
        //   $('.size-btn.available-color-'+colorId).parent().show();



        if (sizeId !== undefined) {
            // Call the function to fetch price and variation ID
            fetchPriceAndVariation(sizeId, colorId, productId);
        }
    });









    function fetchPriceAndVariation(sizeId, colorId, productId) {
        // Make AJAX request
        $.ajax({
            url: '{{route("check-product-variation")}}', // Replace 'your_endpoint_url' with the actual endpoint URL
            method: 'POST', // or 'GET', depending on your server setup
            data: {
                size_id: sizeId,
                color_id: colorId,
                product_id: productId
            },
            beforeSend: function(xhr) {
                // Set CSRF token in request headers
                xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
            },
            success: function(response) {
                if (response.status == 1) {
                    if (response.price !== undefined && response.variation_id !== undefined) {
                        $('#product-price-holder').text('Price: RS ' + response.price);
                        $('input[name="variation_id"]').val(response.variation_id);
                        $('#cart-price').val(response.price);
                        $('#customizer-price').val(response.price);
                        $('.varation-images .front-image').attr('src', response.front_image);
                        $('.varation-images .back-image').attr('src', response.back_image);

                        // $('.variation-item-'+response.variation_id).click();


                        if (response.stock_available) {
                            $('#add-to-cart-btn').prop('disabled', false);
                            $('#customizerr-btn').prop('disabled', false);
                            $('.product-simple-images').hide();
                            $('.varation-images').show();

                        } else {
                            $.toast({
                                heading: 'Error!',
                                position: 'bottom-right',
                                text: 'Stock Not Available',
                                loaderBg: '#ff6849',
                                icon: 'error',
                                hideAfter: 2000,
                                stack: 6
                            });
                            $('#add-to-cart-btn').prop('disabled', true);
                            $('#customizerr-btn').prop('disabled', true);
                            $('.product-simple-images').show();
                            $('.varation-images').hide();
                        }
                    } else {
                        // Handle unexpected response format
                        console.error('Unexpected response format');
                        $.toast({
                            heading: 'Error!',
                            position: 'bottom-right',
                            text: 'There is some sort of problem Please try again in some time',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 2000,
                            stack: 6
                        });
                        $('#add-to-cart-btn').prop('disabled', true);
                        $('#customizerr-btn').prop('disabled', true);
                        $('.product-simple-images').show();
                        $('.varation-images').hide();
                    }
                } else {
                    $.toast({
                        heading: 'Error!',
                        position: 'bottom-right',
                        text: response.error,
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 2000,
                        stack: 6
                    });
                    $('#add-to-cart-btn').prop('disabled', true);
                    $('#customizerr-btn').prop('disabled', true);
                    $('.product-simple-images').show();
                    $('.varation-images').hide();
                }

            },
            error: function(xhr, status, error) {
                // Handle error case
                console.error(xhr.responseText);
            }
        });
    }

    $('.changeqty.minuss').click(function() {
        var currnetValue = $('.count-input').val();
        if (currnetValue <= 0) {
            $.toast({
                heading: 'Error!',
                position: 'bottom-right',
                text: 'Wrong Quantity',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 2000,
                stack: 6
            });
        } else {
            $('.count-input').val(currnetValue - 1);
        }
    });

    $('.changeqty.pluss').click(function() {
        var currnetValue = Number($('.count-input').val());
        // console.log(currnetValue++1);
        $('.count-input').val(currnetValue + 1);

    });


    (() => {
        /*in page js here*/
    })()
</script>
<script>
    $(document).ready(function() {
        // Handle click event on <li> elements
        $(".sizes li").click(function() {
            // Remove 'active' class from all <li> elements
            $(".sizes li").removeClass("active");

            // Add 'active' class to the clicked <li> element
            $(this).addClass("active");
        });
    });
</script>
<script>
    /* ------------ Magnifier Utility ------------- */
    function createMagnifierForImage(imgEl, options = {}) {
        const zoom = options.zoom || 2;
        const glassSize = options.size || 140;

        // remove existing glass on this image (if any)
        const existing = imgEl.parentElement.querySelector('.img-magnifier-glass');
        if (existing) existing.remove();

        // create glass
        const glass = document.createElement('div');
        glass.className = 'img-magnifier-glass';
        glass.style.width = glass.style.height = glassSize + 'px';
        imgEl.parentElement.appendChild(glass);

        // helper to set background size based on natural image size and zoom
        function updateBackground() {
            const naturalW = imgEl.naturalWidth || imgEl.width;
            const naturalH = imgEl.naturalHeight || imgEl.height;
            const bgW = naturalW * zoom;
            const bgH = naturalH * zoom;
            glass.style.backgroundImage = `url("${imgEl.src}")`;
            glass.style.backgroundSize = `${bgW}px ${bgH}px`;
        }

        // get cursor pos relative to image
        function getPos(e) {
            const rect = imgEl.getBoundingClientRect();
            const pageX = (e.touches ? e.touches[0].pageX : e.pageX);
            const pageY = (e.touches ? e.touches[0].pageY : e.pageY);
            const x = pageX - rect.left - window.pageXOffset;
            const y = pageY - rect.top - window.pageYOffset;
            // clamp
            return {
                x: Math.max(0, Math.min(imgEl.width, x)),
                y: Math.max(0, Math.min(imgEl.height, y)),
                rect
            };
        }

        function move(e) {
            e.preventDefault();
            const pos = getPos(e);
            const w = glass.offsetWidth / 2;
            const h = glass.offsetHeight / 2;

            // center glass
            let left = pos.x - w;
            let top = pos.y - h;

            // clamp glass to image area
            left = Math.max(0, Math.min(imgEl.width - glass.offsetWidth, left));
            top = Math.max(0, Math.min(imgEl.height - glass.offsetHeight, top));

            glass.style.left = left + 'px';
            glass.style.top = top + 'px';

            // compute background position based on natural image size and zoom
            const naturalW = imgEl.naturalWidth || imgEl.width;
            const naturalH = imgEl.naturalHeight || imgEl.height;
            const ratioX = naturalW / imgEl.width;
            const ratioY = naturalH / imgEl.height;

            const bgX = (pos.x * ratioX * zoom) - w;
            const bgY = (pos.y * ratioY * zoom) - h;
            glass.style.backgroundPosition = `-${bgX}px -${bgY}px`;
        }

        function show() {
            updateBackground();
            glass.style.display = 'block';
        }

        function hide() {
            glass.style.display = 'none';
        }

        // event listeners
        const moveHandler = move;
        const enterHandler = show;
        const leaveHandler = hide;

        imgEl.addEventListener('mousemove', moveHandler);
        imgEl.addEventListener('mouseenter', enterHandler);
        imgEl.addEventListener('mouseleave', leaveHandler);

        // for glass itself (so pointer inside glass still moves)
        glass.addEventListener('mousemove', moveHandler);
        glass.addEventListener('touchmove', moveHandler);

        // touch support: show on touchstart
        imgEl.addEventListener('touchstart', function(e) {
            show();
            moveHandler(e);
        }, {
            passive: false
        });
        imgEl.addEventListener('touchend', hide);

        // update on resize (responsive images)
        const resizeObserver = new ResizeObserver(() => {
            updateBackground();
        });
        resizeObserver.observe(imgEl);

        // return a destroy function to clean up when slide changes
        return function destroy() {
            imgEl.removeEventListener('mousemove', moveHandler);
            imgEl.removeEventListener('mouseenter', enterHandler);
            imgEl.removeEventListener('mouseleave', leaveHandler);
            imgEl.removeEventListener('touchstart', moveHandler);
            imgEl.removeEventListener('touchend', hide);
            glass.remove();
            resizeObserver.disconnect();
        };
    }

    /* ------------- Swiper init + attach magnifier ------------- */
    document.addEventListener('DOMContentLoaded', function() {
        // init thumbs first
        const thumbsSwiper = new Swiper('.mySwiperThumbs', {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });

        // main swiper
        const mainSwiper = new Swiper('.mySwiperMain', {
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            thumbs: {
                swiper: thumbsSwiper
            },
            grabCursor: true,
        });

        let activeDestroyFn = null;

        // function to attach magnifier to active slide's zoomable image
        function attachToActive() {
            // cleanup previous
            if (typeof activeDestroyFn === 'function') {
                try {
                    activeDestroyFn();
                } catch (e) {
                    /* ignore */
                }
                activeDestroyFn = null;
            }

            const activeSlide = mainSwiper.slides[mainSwiper.activeIndex];
            if (!activeSlide) return;
            const img = activeSlide.querySelector('img.zoomable');
            if (!img) return;

            // ensure image is loaded
            if (!img.complete) {
                img.addEventListener('load', function onLoad() {
                    img.removeEventListener('load', onLoad);
                    activeDestroyFn = createMagnifierForImage(img, {
                        zoom: 2,
                        size: 140
                    });
                });
            } else {
                activeDestroyFn = createMagnifierForImage(img, {
                    zoom: 2,
                    size: 140
                });
            }
        }

        // attach initially after a short delay
        setTimeout(attachToActive, 150);

        // attach after transition ends (works with mouse drag or touch swipe)
        mainSwiper.on('slideChangeTransitionEnd', function() {
            attachToActive();
        });

        // temporarily disable magnifier while dragging/swiping
        mainSwiper.on('touchStart', function() {
            const glass = document.querySelector('.img-magnifier-glass');
            if (glass) glass.style.display = 'none';
        });

        // re-enable magnifier after dragging/swiping finishes
        mainSwiper.on('touchEnd', function() {
            setTimeout(attachToActive, 150);
        });

        // reattach when thumbnail clicked
        document.querySelectorAll('.mySwiperThumbs .swiper-slide img').forEach(function(t) {
            t.addEventListener('click', function() {
                setTimeout(attachToActive, 50);
            });
        });

        // optional: reattach on window resize
        window.addEventListener('resize', function() {
            setTimeout(attachToActive, 100);
        });
    });
</script>



@endsection
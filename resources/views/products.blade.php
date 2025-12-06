@extends('layouts.main')
@section('content')
<div class="tf-page-title">
    <div class="container-full">
        <div class="row">
            <div class="col-12">
                <div class="heading text-center">New Arrival</div>
                <p class="text-center text-2 text_black-2 mt_5">Shop through our latest selection of Fashion</p> 
            </div>
        </div>
    </div>
</div>
<!-- /page-title -->
<section class="flat-spacing-1">
    <div class="container">
        <div class="tf-shop-control grid-3 align-items-center">
            <div class="tf-control-filter">
                <!-- <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="tf-btn-filter"><span class="icon icon-filter"></span><span class="text">Filter</span></a> -->
            </div>
            <ul class="tf-control-layout d-flex justify-content-center">
                <li class="tf-view-layout-switch sw-layout-2" data-value-grid="grid-2">
                    <div class="item"><span class="icon icon-grid-2"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-3 active" data-value-grid="grid-3">
                    <div class="item"><span class="icon icon-grid-3"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-4" data-value-grid="grid-4">
                    <div class="item"><span class="icon icon-grid-4"></span></div>
                </li>
                
            </ul>
            <div class="tf-control-sorting d-flex justify-content-end">
                <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                    <div class="btn-select">
                        <span class="text-sort-value">Featured</span>
                        <span class="icon icon-arrow-down"></span>
                    </div>
                    <div class="dropdown-menu">
                        <div class="select-item" onclick="applySort('featured')">
                            <span class="text-value-item">Featured</span>
                        </div>
                        <div class="select-item" onclick="applySort('best-selling')">
                            <span class="text-value-item">Best selling</span>
                        </div>
                        <div class="select-item" onclick="applySort('alphabetical-asc')">
                            <span class="text-value-item">Alphabetically, A-Z</span>
                        </div>
                        <div class="select-item" onclick="applySort('alphabetical-desc')">
                            <span class="text-value-item">Alphabetically, Z-A</span>
                        </div>
                        <div class="select-item" onclick="applySort('price-asc')">
                            <span class="text-value-item">Price, low to high</span>
                        </div>
                        <div class="select-item" onclick="applySort('price-desc')">
                            <span class="text-value-item">Price, high to low</span>
                        </div>
                        <div class="select-item" onclick="applySort('date-asc')">
                            <span class="text-value-item">Date, old to new</span>
                        </div>
                        <div class="select-item" onclick="applySort('date-desc')">
                            <span class="text-value-item">Date, new to old</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tf-row-flex">
            <aside class="tf-shop-sidebar wrap-sidebar-mobile">
                <div class="widget-facet wd-categories">
                    <div class="facet-title" data-bs-target="#categories" data-bs-toggle="collapse" aria-expanded="true" aria-controls="categories">
                        <span>Product categories</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="categories" class="collapse show">
                        <ul class="list-categoris current-scrollbar mb_36">
                            <li class="cate-item {{ is_null($slug) ? 'current' : '' }}"><a href="{{route('products')}}"><span>All</span>&nbsp;<span>({{ $totalProducts }})</span></a></li>
                            @foreach ($categories as $category)
                            <li class="cate-item {{ $slug === $category->slug ? 'current' : '' }}"><a href="{{ route('products', $category->slug) }}"><span>{{ $category->title }}</span>&nbsp;<span>({{ $category->products_count }})</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#follow" data-bs-toggle="collapse" aria-expanded="true" aria-controls="follow">
                        <span>Follow us</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="follow" class="collapse show">
                        <ul class="tf-social-icon d-flex gap-10">
                            <li><a href="#" class="box-icon w_34 round bg_line social-facebook"><i class="icon fs-14 icon-fb"></i></a></li>
                            <li><a href="#" class="box-icon w_34 round bg_line social-twiter"><i class="icon fs-12 icon-Icon-x"></i></a></li>
                            <li><a href="#" class="box-icon w_34 round bg_line social-instagram"><i class="icon fs-14 icon-instagram"></i></a></li>
                            <li><a href="#" class="box-icon w_34 round bg_line social-tiktok"><i class="icon fs-14 icon-tiktok"></i></a></li>
                            <li><a href="#" class="box-icon w_34 round bg_line social-pinterest"><i class="icon fs-14 icon-pinterest-1"></i></a></li>
                        </ul>
                    </div>
                </div>
            </aside>
            <div class="tf-shop-content">
                <div class="grid-layout wrapper-shop" data-grid="grid-3">
                    <!-- card product 1 -->
                    @if (!empty($products) && (is_array($products) ? !empty($products) : !$products->isEmpty()))
                    @else
                    <div class="sectionContent text-center">
                        <div class="about_con">
                            <h3>No Products found</h3>
                        </div>
                    </div>
                @endif
                @foreach ($products as $product)
                    <div class="card-product">
                        <div class="card-product-wrapper">
                            <a href="{{ route('product-detail', $product->slug) }}" class="product-img">
                                <img class="lazyload img-product" data-src="{{asset($product->img_path)}}" src="{{asset($product->img_path)}}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{asset($product->img_path)}}" src="{{asset($product->img_path)}}" alt="image-product">
                            </a>
                            <div class="list-product-btn absolute-2">
                               
                                <a href="javascript:void(0);" data-id="{{ $product->id }}" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                
                                <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="{{ route('product-detail', $product->slug) }}" class="title link">{{ $product->title }}</a>
                            <span class="price" style="font-size:20px;">Rs: {{ $product->price }}</span>
                            <span class="price" style="text-decoration: line-through;">Rs: {{ $product->old_price }}</span>
                           
                        </div>
                    </div>
                    @endforeach
                   
                </div>
                <!-- pagination -->
                {{-- <ul class="tf-pagination-wrap tf-pagination-list">
                    <li class="active">
                        <a href="#" class="pagination-link">1</a>
                    </li>
                    <li>
                        <a href="#" class="pagination-link animate-hover-btn">2</a>
                    </li>
                    <li>
                        <a href="#" class="pagination-link animate-hover-btn">3</a>
                    </li>
                    <li>
                        <a href="#" class="pagination-link animate-hover-btn">4</a>
                    </li>
                    <li>
                        <a href="#" class="pagination-link animate-hover-btn">
                            <span class="icon icon-arrow-right"></span>
                        </a>
                    </li>
                </ul> --}}
            </div>
        </div>
        
    </div>
</section>
<div class="btn-sidebar-style2">
    <button data-bs-toggle="offcanvas" data-bs-target="#sidebarmobile" aria-controls="offcanvas"><i class="icon icon-sidebar-2"></i></button>
</div>
    <!-- Footer -->
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var categoryRadios = document.getElementsByName('category');

        categoryRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                window.location.href = this.nextElementSibling.querySelector('a').href;
            });
        });
    });
</script>
<script>
//     $( ".whishbtn" ).click(function(e) {
    
//     @if(Auth::check())
    
//     var productid = $(this).data("id");
//     // console.log(id);
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

    
//     $.ajax({
        

//         type: "post",

//         url: "{{route('add.to.wishlist')}}",

//         data: {productid: productid },
//         dataType: "json",


//         success: function (msg) {
           
//             if(msg.status == 1)
//             {
                
        
//                 $.toast({
//     				heading: 'Success!',
//     				position: 'bottom-right',
//     				text:  "Product Added to Wishlist",
//     				loaderBg: '#ff6849',
//     				icon: 'success',
//     				hideAfter: 2000,
//     				stack: 6
//     			});
//                 setInterval(() => {
                        
//                         location.reload();
//                     }, 2050);
//             }

//             if(msg.status == 2)
//             {
                
        
//                 $.toast({
//     				heading: 'Success!',
//     				position: 'bottom-right',
//     				text:  msg.msg,
//     				loaderBg: '#ff6849',
//     				icon: 'success',
//     				hideAfter: 2000,
//     				stack: 6
//     			});
//                 setInterval(() => {
                        
//                         location.reload();
//                     }, 2050);
                     
    

//             }
          
                                            
//             },
//             beforeSend: function () {
                
//             }
//         });

//    @else
   
//    console.log("sss");
  
//             $.toast({
//                         heading: 'error!',
//                         position: 'top-right',
//                         text:  "You need to login first!",
//                         loaderBg: '#ff6849',
//                         icon: 'error',
//                         hideAfter: 2500,
//                         stack: 6
//                     });
    
                 
//                     setInterval(() => {
                        
//                         window.location = "{{route('login')}}";
//                     }, 1000);
   

// @endif



// });
</script>
<script>
    // Setup CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
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

    <script type="text/javascript">
        (() => {
            /*in page js here*/
        })()
    </script>
    <script>
        function applySort(sortOption) {
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('sort', sortOption);
            window.location.href = currentUrl.toString();
        }
        </script>
@endsection


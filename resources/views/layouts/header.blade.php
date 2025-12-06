
{{-- <body>
    <header class="header">
        <div class="top_bar">
            <div class="container">
                <div class="top_main">
                    <!--<form action="" class="top_form">-->
                    <!--    <select name="" id="">-->
                    <!--        <option value="1">English</option>-->
                    <!--        <option value="2">English</option>-->
                    <!--        <option value="3">English</option>-->
                    <!--    </select>-->
                    <!--    <select name="" id="">-->
                    <!--        <option value="1">USD</option>-->
                    <!--        <option value="2">USD</option>-->
                    <!--        <option value="3">USD</option>-->
                    <!--    </select>-->
                    <!--</form>-->
                    <a href="telto:{{$config['COMPANYPHONE']}}" class="call">
                        <p>Call Us: </p>{{$config['COMPANYPHONE']}}
                    </a>
                </div>
            </div>
        </div>
        <div class="main__header">
            <div class="container">
                <div class="header_main">
                    <a href="{{route('welcome')}}" class="logo"><img src="{{asset($logo->img_path)}}" alt='' class='img__contain'></a>
                    <form action="{{route('products')}}" class="header_form">
                        <input type="text" name="search" placeholder="Search here..." value="{{isset($_GET['search']) ? $_GET['search'] : ''}}">
                        <button type="submit"><i class='bx bx-search'></i></button>
                    </form>
                    <!--<a href="{{route('contact')}}" class="support"><i class='bx bx-headphone'></i>-->
                    <!--    <p>1900 - 888-->
                    <!--        <span>24/7 Support Centre</span>-->
                    <!--    </p>-->
                    <!--</a>-->
                    <ul class="header_left">
                        <li><a href="{{route('wishlist')}}"><i class='bx bx-heart'></i>
                                <p>Wishlist</p>
                            </a></li>
                        <li><a href="{{route('cart')}}"><i class='bx bx-cart'></i>
                                <p>Cart</p>
                            </a></li>
                            @if (Auth::check())
                            <li><a href="{{route('dashboard.index')}}"><i class='bx bx bxs-dashboard'></i>
                                <p>Dashboard</p>
                            </a></li>
                            <li><a href="{{route('logout')}}"><i class='bx bx bx-log-out'></i>
                            </a></li>
                           @else
                        <li><a href="{{route('login')}}"><i class='bx bxs-user'></i>
                                <p>Account</p>
                            </a></li>
                            @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="header_bottom">
            <div class="container">
                <div class="main_bott">
                    <ul class="nav_bar">
                        <li><a href="{{ route('products') }}">All</a></li>
                        @foreach ($categories as $category)
                        <a href="{{ route('products', $category->slug) }}">
                        <li><a href="{{ route('products', $category->slug) }}">{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                    <ul class="social_icon">
                        <li><a href="{{$config['FACEBOOK']}}"><i class='bx bxl-facebook'></i></a></li>
                        <li><a href="{{$config['INSTAGRAM']}}"><i class='bx bxl-instagram-alt'></i></a></li>
                        <li><a href="{{$config['TWITTER']}}"><i class='bx bxl-twitter'></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
     --}}




     <body class="preload-wrapper">
        <!-- RTL -->
        <a href="javascript:void(0);" id="toggle-rtl" class="tf-btn animate-hover-btn btn-fill">RTL</a>
        <!-- /RTL  -->
        <!-- preload -->
        <div class="preload preload-container">
            <div class="preload-logo">
                <div class="spinner"></div>
            </div>
        </div>
        <!-- /preload -->
        <div id="wrapper">
            <!-- Announcement Bar -->
            <div class="announcement-bar bg_dark">
                <div class="wrap-announcement-bar">
                    <div class="box-sw-announcement-bar speed-1">
                        <div class="announcement-bar-item">
                            <p>FREE SHIPPING ALL OVER PAKISTAN OVER RS 5000/-</p>
                        </div>
                        <div class="announcement-bar-item">
                            <p>7 Days Return Exchange Policy</p>
                        </div>
                        <div class="announcement-bar-item">
                            <p>LIMITED TIME OFFER: FASHION SALE YOU CAN'T RESIST</p>
                        </div> 
                        <div class="announcement-bar-item">
                            <p>FREE SHIPPING ALL OVER PAKISTAN OVER RS 5000/-</p>
                        </div>
                        <div class="announcement-bar-item">
                            <p>7 Days Return Exchange Policy</p>
                        </div>
                        <div class="announcement-bar-item">
                            <p>LIMITED TIME OFFER: FASHION SALE YOU CAN'T RESIST</p>
                        </div> 
                        <div class="announcement-bar-item">
                            <p>FREE SHIPPING ALL OVER PAKISTAN OVER RS 5000/-</p>
                        </div>
                        <div class="announcement-bar-item">
                            <p>7 Days Return Exchange Policy</p>
                        </div>
                        <div class="announcement-bar-item">
                            <p>LIMITED TIME OFFER: FASHION SALE YOU CAN'T RESIST</p>
                        </div> 
                        <div class="announcement-bar-item">
                            <p>FREE SHIPPING ALL OVER PAKISTAN OVER RS 5000/-</p>
                        </div>
                        <div class="announcement-bar-item">
                            <p>7 Days Return Exchange Policy</p>
                        </div>
                        <div class="announcement-bar-item">
                            <p>LIMITED TIME OFFER: FASHION SALE YOU CAN'T RESIST</p>
                        </div> 
                        <div class="announcement-bar-item">
                            <p>FREE SHIPPING ALL OVER PAKISTAN OVER RS 5000/-</p>
                        </div>
                        <div class="announcement-bar-item">
                            <p>7 Days Return Exchange Policy</p>
                        </div>
                        <div class="announcement-bar-item">
                            <p>LIMITED TIME OFFER: FASHION SALE YOU CAN'T RESIST</p>
                        </div>   
                    </div>
                </div>
                <span class="icon-close close-announcement-bar"></span>
                
            </div>   
            <!-- /Announcement Bar -->
            <!-- Header -->
            <header id="header" class="header-default header-style-2">
                <div class="main-header line">
                    <div class="container-full px_15 lg-px_40">
                        <div class="row wrapper-header align-items-center">
                            <div class="col-xl-5 tf-md-hidden">
                                <div class="tf-cur">
                                    <div class="tf-currencies">
                                        <select class="image-select center style-default type-currencies">
                                            <option data-thumbnail="images/country/fr.svg">EUR <span>€ | France</span></option>
                                            <option data-thumbnail="images/country/de.svg">EUR <span>€ | Germany</span></option>
                                            <option selected data-thumbnail="images/country/us.svg">USD <span>$ | United States</span></option>
                                            <option data-thumbnail="images/country/vn.svg">VND <span>₫ | Vietnam</span></option>
                                        </select>
                                    </div>
                                    <div class="tf-languages">
                                        <select class="image-select center style-default type-languages">
                                            <option>English</option>
                                            <option>العربية</option>
                                            <option>简体中文</option>
                                            <option>اردو</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-3 tf-lg-hidden">
                                <a href="#mobileMenu" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" fill="none">
                                        <path d="M2.00056 2.28571H16.8577C17.1608 2.28571 17.4515 2.16531 17.6658 1.95098C17.8802 1.73665 18.0006 1.44596 18.0006 1.14286C18.0006 0.839753 17.8802 0.549063 17.6658 0.334735C17.4515 0.120408 17.1608 0 16.8577 0H2.00056C1.69745 0 1.40676 0.120408 1.19244 0.334735C0.978109 0.549063 0.857702 0.839753 0.857702 1.14286C0.857702 1.44596 0.978109 1.73665 1.19244 1.95098C1.40676 2.16531 1.69745 2.28571 2.00056 2.28571ZM0.857702 8C0.857702 7.6969 0.978109 7.40621 1.19244 7.19188C1.40676 6.97755 1.69745 6.85714 2.00056 6.85714H22.572C22.8751 6.85714 23.1658 6.97755 23.3801 7.19188C23.5944 7.40621 23.7148 7.6969 23.7148 8C23.7148 8.30311 23.5944 8.59379 23.3801 8.80812C23.1658 9.02245 22.8751 9.14286 22.572 9.14286H2.00056C1.69745 9.14286 1.40676 9.02245 1.19244 8.80812C0.978109 8.59379 0.857702 8.30311 0.857702 8ZM0.857702 14.8571C0.857702 14.554 0.978109 14.2633 1.19244 14.049C1.40676 13.8347 1.69745 13.7143 2.00056 13.7143H12.2863C12.5894 13.7143 12.8801 13.8347 13.0944 14.049C13.3087 14.2633 13.4291 14.554 13.4291 14.8571C13.4291 15.1602 13.3087 15.4509 13.0944 15.6653C12.8801 15.8796 12.5894 16 12.2863 16H2.00056C1.69745 16 1.40676 15.8796 1.19244 15.6653C0.978109 15.4509 0.857702 15.1602 0.857702 14.8571Z" fill="currentColor"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-xl-2 col-md-4 col-6 text-center">
                                <a href="{{route('welcome')}}" class="logo-header">
                                    <img src="{{asset($logo->img_path)}}" alt="logo" class="logo">
                                </a>
                            </div>
                            
                        <!--    @if (Auth::check())-->
                        <!--    <li><a href="{{route('dashboard.index')}}"><i class='bx bx bxs-dashboard'></i>-->
                        <!--        <p>Dashboard</p>-->
                        <!--    </a></li>-->
                        <!--    <li><a href="{{route('logout')}}"><i class='bx bx bx-log-out'></i>-->
                        <!--    </a></li>-->
                        <!--   @else-->
                        <!--<li><a href="{{route('login')}}"><i class='bx bxs-user'></i>-->
                        <!--        <p>Account</p>-->
                        <!--    </a></li>-->
                        <!--    @endif-->
                            
                            
                            
                            
                            
                            
                            <div class="col-xl-5 col-md-4 col-3">
                                <ul class="nav-icon d-flex justify-content-end align-items-center gap-20">
                                    <li class="nav-search"><a href="#canvasSearch" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="nav-icon-item"><i class="icon icon-search"></i></a></li>
                                     @if (Auth::check())
                                     
                                    <li class="nav-account"><a href="{{route('dashboard.index')}}" class="nav-icon-item"><i class="icon icon-account"></i></a></li>
                                    <li class="nav-account"><a href="{{route('logout')}}" class="nav-icon-item"><i class="icon icon-logout"></i></a></li>
                                    @else
                                    <li class="nav-account"><a href="#login" data-bs-toggle="modal" class="nav-icon-item"><i class="icon icon-account"></i></a></li>
                                     @endif
                                    
                                    
                                    @php
                                    $wishlistCount = App\Models\Wishlist::where('user_id', Auth::id())->count();
                                @endphp


                                    <li class="nav-wishlist"><a href="{{route('wishlist')}}" class="nav-icon-item"><i class="icon icon-heart"></i><span class="count-box">{{ $wishlistCount }}</span></a></li>
                                    @php
                                    $cartCount = 0;
                                    if (Session::has('cart') && !empty(Session::get('cart'))) {
                                        foreach (Session::get('cart') as $key => $value) {
                                            // Exclude 'order_id' key from the count
                                            if ($key != 'order_id') {
                                                $cartCount++;
                                            }
                                        }
                                    }
                                @endphp
                                
                                    <!--{{-- <li class="nav-cart"><a href="{{route('cart')}}" data-bs-toggle="modal" class="nav-icon-item"><i class="icon icon-bag"></i>@if ($cartCount > 0)<span class="count-box">{{ $cartCount }}</span>@endif</a></li> --}}-->
                                    <li class="nav-cart"><a href="{{route('cart')}}"  class="nav-icon-item"><i class="icon icon-bag"></i>@if ($cartCount > 0)<span class="count-box">{{ $cartCount }}</span>@endif</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom line tf-md-hidden">
                    <div class="container-full px_15 lg-px_40">
                        <div class="wrapper-header d-flex justify-content-center align-items-center">
                            <nav class="box-navigation text-center">
                                <ul class="box-nav-ul d-flex align-items-center justify-content-center gap-30">
                                    <li class="menu-item">
                                        <a href="{{route('welcome')}}" class="item-link">Home</i></a>
                                        
                                    </li>
                                    <li class="menu-item position-relative">
                                        <a href="#" class="item-link">Shop<i class="icon icon-arrow-down"></i></a>
                                        <div class="sub-menu submenu-default">
                                            <ul class="menu-list">
                                                <li>
                                                    <a href="{{ route('products') }}" class="menu-link-text link text_black-2">All Products</a>
                                                </li>
                                                @foreach ($categories as $category)
                                                <li>
                                                    
                                                    <a href="{{ route('products', $category->slug) }}" class="menu-link-text link text_black-2">{{ $category->title }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('faq')}}" class="item-link">FAQ's</i></a>
                                        
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('contact')}}" class="item-link">Contact Us</i></a>
                                        
                                    </li>


                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                
            </header>
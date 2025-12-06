<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Customizer | Prestwick Print</title>
    
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link href="{{asset('assets/css/overall.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/fonts/stylesheet.css')}}">
    
    <link href="{{ asset('dash/css/jquery.toast.css') }}" rel="stylesheet">
    
    
<link rel="stylesheet" href="{{asset('fpd/css/FancyProductDesigner-all.min.css')}}">
<style type="text/css">
    a{
   color:#000 !important; 
}
a:hover{
  color:#000 !important;
}
a .bp5-icon, a .bp5-icon-standard, a .bp5-icon-large{
  color:inherit;
}
a code{
  color:inherit;
}

</style>


</head>
<input type="hidden" name="" id="web_base_url" value="{{url('/')}}">
<body>
    
    <header class="header">
        <div class="top_bar">
            <div class="container">
                <div class="top_main">
                    <form action="" class="top_form">
                        <select name="" id="">
                            <option value="1">English</option>
                            <option value="2">English</option>
                            <option value="3">English</option>
                        </select>
                        <select name="" id="">
                            <option value="1">USD</option>
                            <option value="2">USD</option>
                            <option value="3">USD</option>
                        </select>
                    </form>
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
                    <a href="{{route('contact')}}" class="support"><i class='bx bx-headphone'></i>
                        <p>1900 - 888
                            <span>24/7 Support Centre</span>
                        </p>
                    </a>
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
        
        
        
        
<div class="configurator">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div id="fpd"></div>
                    <div class="text-center">
                      <button id="proceed-cart" class="btn mt-4" type="button">Proceed to cart</button>
                    </div>
                </div>
                  <input type="hidden" id="category_id" name="category_id" value="{{$category_id}}">
                  <input type="hidden" id="sub_category_id" name="sub_category_id" value="{{$sub_category_id}}">
                  <input type="hidden" id="product_id" name="product_id" value="{{$product_id}}">
                  {{--<input type="hidden" id="variation_id" name="variation_id" value="{{$variation_id}}">--}}
                  <input type="hidden" id="price" name="price" value="{{$price}}">
            </div>
        </div>
    </div>
</div>

    <footer class="footer">
    <div class="container">
        <div class="footer_main">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="footer_items">
                                <a href="{{route('welcome')}}" class="footer_logo">
                                    <img src="{{asset($logo->img_path)}}" alt="">
                                </a>
                                <p class="footer_para">Lorem Ipsum is simply dummy text ofLorem Ipsum is simply dummy text of the printing and typesetting industry. theLorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                                <div class="social_icons">
                                    <ul>
                                        <li><a href="{{$config['FACEBOOK']}}"><i class='bx bxl-facebook'></i></a></li>
                                        <li><a href="{{$config['INSTAGRAM']}}"><i class='bx bxl-instagram'></i></a></li>
                                        <li><a href="{{$config['TWITTER']}}"><i class='bx bxl-twitter'></i></li>
                                        <li><a href="{{$config['YOUTUBE']}}"><i class='bx bxl-youtube'></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="footer_items">
                                        <h3 class="footer_title">Quick Links</h3>
                                        <div class="footer_links">
                                            <ul>
                                                <li><a href="{{route('welcome')}}">Home</a></li>
                                                <li><a href="{{route('about')}}">about us</a></li>
                                                <li><a href="{{route('products')}}">Promotional product</a></li>
                                                <li><a href="{{route('products')}}">headwear</a></li>
                                                <li><a href="{{route('products')}}">Clothing</a></li>
                                                <li><a href="{{route('contact')}}">contact us </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="footer_items">
                                        <h3 class="footer_title">Useful Links</h3>
                                        <div class="footer_links">
                                            <ul>
                                                <li><a href="{{route('welcome')}}">Home</a></li>
                                                <li><a href="{{route('about')}}">about us</a></li>
                                                <li><a href="{{route('products')}}">Promotional product</a></li>
                                                <li><a href="{{route('products')}}">headwear</a></li>
                                                <li><a href="{{route('products')}}">Clothing</a></li>
                                                <li><a href="{{route('contact')}}">contact us </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer_items">
                                <h3 class="footer_title">Newsletter</h3>
                                <p class="footer_para">Subscribe Our Newsletter</p>
                                <form action="{{route('newsletter_submit')}}" class="footer_form" method="POST">
                                    @csrf
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email">
                                    <button type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copywrite">
        <div class="container">
            <div class="copywrite_items">
                <p class="copywrite_para">Copyright© 2024 .prestwickprint..com All rights reserved</p>
                <!--<div class="footer_image">-->
                <!--    <a href="javascript:;"> <img src="images/copywrite_image.png" alt=""></a>-->
                <!--</div>-->
            </div>
        </div>
    </div>
</footer>
<div id="preloader" style="display:none;">
    <div class="loading">
        <span>Loading...</span>
    </div>
</div>


<script src="https://demo-designprojects.com/demo/adiktiv/public/js/all.min.js"></script>
<script src="https://demo-designprojects.com/demo/adiktiv/public/js/custom.js"></script>
<script src="https://demo-designprojects.com/demo/prestwick-prints/public/dash/js/jquery.toast.js"></script>
<!--<script src="{{asset('fpd/js/fabric-3.0.0.min.js')}}"></script>-->
<!--<script src="{{asset('fpd/js/FancyProductDesigner-all.min.js')}}"></script>-->
<!--<script src="https://demo-designprojects.com/demo/adiktiv/public/js/app.js"></script>-->


<script src="https://demo-designprojects.com/demo/adiktiv/public/fpd/js/fabric-3.0.0.min.js"></script>
<script src="https://demo-designprojects.com/demo/adiktiv/public/fpd/js/FancyProductDesigner-all.min.js"></script>
<script src="https://demo-designprojects.com/demo/adiktiv/public/js/app.js"></script>

<script type="text/javascript">
(()=>{
    
        var Loader = function () {

            return {
        
                show: function () {
                    jQuery("#preloader").show();
                },
        
                hide: function () {
                    jQuery("#preloader").hide();
                }
            };
        
        }();

    var fpd = document.getElementById("fpd");
    var path = null;
    @if($category_id == 27 && $sub_category_id == 1)
    path = "{{asset('lang/Men-T-Shirts.json')}}";
    @elseif($category_id == 27 && $sub_category_id == 55)
    path = "{{asset('lang/Men-Shirts.json')}}";
    @elseif($category_id == 27 && $sub_category_id == 58)
    path = "{{asset('lang/Men-Hoodies.json')}}";
    @elseif($category_id == 20 && $sub_category_id == 34)
    path = "{{asset('lang/Men-Caps.json')}}";
    @elseif($category_id == 28 && $sub_category_id == 1)
    path = "{{asset('lang/Women-T-Shirts.json')}}";
    @elseif($category_id == 28 && $sub_category_id == 55)
    path = "{{asset('lang/Women-Shirts.json')}}";
    @elseif($category_id == 28 && $sub_category_id == 58)
    path = "{{asset('lang/Women-Hoodies.json')}}";
    @elseif($category_id == 28 && $sub_category_id == 39)
    path = "{{asset('lang/Women-Caps.json')}}";
    @else
    path = "{{asset('lang/Men-T-Shirts.json')}}";
    @endif

  var options = {
    productsJSON: path, //see JSON folder for products sorted in categories
    designsJSON: "{{asset('lang/designs.json')}}", //see JSON folder for designs sorted in categories
    stageWidth: "100%",
    editorMode: true,
    smartGuides: true,
    uiTheme: "doyle",
    fonts: [
      { name: "Helvetica" },
      { name: "Times New Roman" },
      // { name: "Pacifico", url: "Enter_URL_To_Pacifico_TTF" },
      { name: "Arial" },
      { name: "Lobster", url: "google" },
    ],
    customTextParameters: {
      colors: false,
      removable: true,
      resizable: true,
      draggable: true,
      rotatable: true,
      autoCenter: true,
      boundingBox: "Base",
      curvable: true,
    },
    customImageParameters: {
      draggable: true,
      removable: true,
      resizable: true,
      rotatable: true,
      colors: "#000",
      autoCenter: true,
       maxH: 1500,
      maxW: 1500,
      boundingBox: "Base",
    },
    imageParameters:{
      advancedEditing : true,
      resizeToH: 300,
      resizeToW: 350,
    },
    actions: {
      top: [  "snap", "preview-lightbox"],
      right: ["magnify-glass", "zoom", "reset-product", "qr-code", "ruler"],
      bottom: ["undo", "redo"],
      left: ["manage-layers",  "save", "load"],
    },
  };
  var designer = new FancyProductDesigner(fpd, options);



  $('#proceed-cart').click(function(e) {
    e.preventDefault();
    Loader.show();
    // console.log(designer.actions.downloadFile());
    var category_id = $('#category_id').val();
    var sub_category_id = $('#sub_category_id').val();
    var product_id = $('#product_id').val();
    var variation_id = $('#variation_id').val();
    var price = $('#price').val();
    
    // var dataURL= null;
    designer.getProductDataURL(function(dataURL){
      // dataURL = dataURL;

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
    			type:'POST',
    			url:'{{route('save-cart-ajax')}}',
    			data:{img_path:dataURL, product_id:product_id, category_id:category_id, sub_category_id:sub_category_id,variation_id,price, quantity_selected:1  },
			    // enctype: 'multipart/form-data',
          //       processData: false,  // tell jQuery not to process the data
          //       contentType: false,   // tell jQuery not to set contentType
               
    			success:function(data) {
    
                    Loader.hide();
                   
                if(data.status == 1){
                        $.toast({
                        heading: 'Success!',
                        position: 'top-right',
                        text:  data.msg,
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2500,
                        stack: 6
                    });
    
                   
                    setInterval(() => {
                        
                        window.location = "{{route('cart')}}";
                    }, 2500);
                     
                 
                }
    
           
            if(data.status == 2){
                $.toast({
    				heading: 'Error!',
    				position: 'bottom-right',
    				text:  data.error,
    				loaderBg: '#ff6849',
    				icon: 'error',
    				hideAfter: 5000,
    				stack: 6
    			});
            }
            // $('#updatepwd')[0].reset();
    	    }
    
    			});
    });
  
    });


})()
</script>


  <script type="text/javascript">
        (() => {

            @if (session('notify_success'))
                $.toast({
                    heading: 'Success!',
                    position: 'bottom-right',
                    text: '{{ session('notify_success') }}',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 2000,
                    stack: 6
                });
            @elseif (session('notify_error'))
                $.toast({
                    heading: 'Error!',
                    position: 'bottom-right',
                    text: '{{ session('notify_error') }}',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 2000,
                    stack: 6
                });
            @endif

        })()
    </script>
    

</body>




</html>

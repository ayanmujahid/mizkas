@extends('layouts.main')
@section('content')

        <!-- page-title -->
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">Your wishlist</div>
            </div>
        </div>
        <!-- /page-title -->
        <!-- Section Product -->
        <?php   $wishlist = App\Models\Wishlist::where('user_id',Auth::id())->get(); 
// dd($wishlist);
?>
        <section class="flat-spacing-2">
            <div class="container">
                <div class="grid-layout wrapper-shop" data-grid="grid-4">
                    <!-- card product 1 -->
                    @forelse($wishlist as $k => $w)
                    <div class="card-product">
                        <div class="card-product-wrapper">
                            <a href="{{route('product-detail',$w['slug'])}}" class="product-img">
                                <img class="lazyload img-product" data-src="{{asset($w['img_path'])}}" src="{{asset($w['img_path'])}}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{asset($w['img_path'])}}" src="{{asset($w['img_path'])}}" alt="image-product">
                            </a>
                            <div class="list-product-btn type-wishlist">
                                <a href="javascript:void(0);" data-id="{{$w['product_id']}}" class="box-icon bg_white wishlist">
                                    <span class="tooltip">Remove Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                            </div>
                            
                        </div>
                        <div class="card-product-info">
                            <a href="{{route('product-detail',$w['slug'])}}" class="title link">{{ucfirst($w['name'])}}</a>
                            <span class="price">Rs: {{ number_format($w['price'],2)}}</span>
                            
                        </div>
                    </div>
                    @empty
                    <div class="container-full">
                        <div class="heading text-center">Your wishlist is empty</div>
                    </div>
                    
                    @endforelse
                </div>
            </div>
        </section>
        <!-- /Section Product -->

@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
    #demo {
  text-align: center;
  font-size: 60px;
  margin-top: 0px;
}
</style>
@endsection
@section('js')
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

$('.update').click(function ()
		{
			var id = $(this).data("id");
            var qt = parseInt($(this).closest("div.num-in").find("input[name='qty']").val());
            console.log(qt);
                    if(qt <= 0){
                        qt = 1;
                        $.toast({
                        heading: 'Error!',
                        position: 'bottom-right',
                        text:  'Quantity Must be greater than 0!',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 3000,
                        stack: 6
                    });
                    return 0;
                    }
            
            var stock =  parseInt($(this).closest("div.num-in").find("input[name='stock_qty']").val());
            
           
            if(qt > stock)
            {
                    $.toast({
                        heading: 'Error!',
                        position: 'bottom-right',
                        text:  'Quantity Must be less than or equals to ' + stock,
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 3000,
                        stack: 6
                    });
            }
            else{

                qt = parseInt(qt);
                    var token = $('meta[name="csrf-token"]').attr("content");

                    var url = '{{ url('update-cart') }}';
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {rowid: id, qty:qt, _token:token},
                        success: function(){
                            $.toast({
                                heading: 'Success!',
                                position: 'bottom-right',
                                text:  'Quantity Updated',
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 2000,
                                stack: 6
                            });
                                    //console.log('her');
                      setInterval(() => {
                        location.reload();
                      }, 2000);
                                    
                    return false;
                        },
                        // On fail
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
            }
                });

                // Remove Cart


        $('.couponbtn').click(function () {
			var couponcode = $("#code").val(); 
			var token = $('meta[name="csrf-token"]').attr("content");
			var url = '{{ url('apply-coupon')}}';
            
			$.ajax({
				url: url,
				type: 'post',
				data: {couponcode: couponcode, _token: token},
				success: function (response) {
                    console.log(response.status);
                    // $('.disprice').val(response.discoupon.coupon_price)
                    if(response.status == 0){
                        	$.toast({
						heading: 'Error!',
						position: 'bottom-right',
						text:  'Sorry have already use this Coupon',
						loaderBg: '#ff6849',
						icon: 'error',
						hideAfter: 3000,
						stack: 6
                        
					});
                 

                    }
                    if(response.status == 1){
					$.toast({
						heading: 'Success!',
						position: 'bottom-right',
						text:  'Coupon Actived',
						loaderBg: '#ff6849',
						icon: 'success',
						hideAfter: 3000,
						stack: 6
					});
                    setInterval(() => {
                        location.reload();
                      }, 2900);
                    }
                    if(response.status == 2){
                        	$.toast({
						heading: 'Error!',
						position: 'bottom-right',
						text:  'Invalid Coupon',
						loaderBg: '#ff6849',
						icon: 'error',
						hideAfter: 3000,
						stack: 6
                        
					});
                 

                    }

                    if(response.status == 3){
					$.toast({
						heading: 'Success!',
						position: 'bottom-right',
						text:  response.error,
						loaderBg: '#ff6849',
						icon: 'error',
						hideAfter: 3000,
						stack: 6
					});
                   
                    }
                    if(response.status == 4){
					$.toast({
						heading: 'Success!',
						position: 'bottom-right',
						text:  "Invalid Coupon",
						loaderBg: '#ff6849',
						icon: 'error',
						hideAfter: 3000,
						stack: 6
					});
                   
                    }
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
                    
				}
			});
		});


        
// $( ".removewhishbtn" ).click(function(e) {
    
//     var productid = $(this).data("id");
   
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

    
//     $.ajax({
        

//         type: "post",

//         url: "{{route('remove.from.wishlist')}}",

//         data: {productid: productid },
//         dataType: "json",


//         success: function (msg) {
//             if(msg.status == 1)
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

//     });


        
})
()
</script>
<script>
    // Setup CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Event delegation for removing from wishlist
    $(document).on('click', '.wishlist', function (e) {
        e.preventDefault();
        
        let $this = $(this);
        let productid = $this.data("id");

        // AJAX request to remove from wishlist
        $.ajax({
            type: "post",
            url: "{{ route('remove.from.wishlist') }}",
            data: { productid: productid },
            dataType: "json",
            
            success: function (msg) {
                if (msg.status === 1) {
                    // Remove the entire card-product element from the DOM
                    $this.closest('.card-product').remove();

                    // Display success message
                    $.toast({
                        heading: 'Success!',
                        position: 'bottom-right',
                        text: 'Product Removed from Wishlist',
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
</script>

@endsection
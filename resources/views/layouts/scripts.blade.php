{{-- -----------------------------------Links to Change----------------------------------- --}}
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/lazysize.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/count-down.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/multiple-modal.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  // Thumbnail Swiper
  var swiperThumbs = new Swiper(".mySwiperThumbs", {
    spaceBetween: 10,
    slidesPerView: 5,
    freeMode: true,
    watchSlidesProgress: true,
    grabCursor: true,
    breakpoints: {
      0: { slidesPerView: 3 },
      768: { slidesPerView: 5 }
    }
  });

  // Main Swiper
  var swiperMain = new Swiper(".mySwiperMain", {
    spaceBetween: 10,
    loop: true,
    grabCursor: true,
    thumbs: {
      swiper: swiperThumbs,
    },
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>




 
{{-- -----------------------------------Links to Change----------------------------------- --}}


<script src="{{ asset('dash/js/jquery.toast.js') }}"></script>
@if (Auth::guard('admin'))
    <script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/content-management.js') }}"></script>
@endif

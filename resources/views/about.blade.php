@extends('layouts.main')
@section('content')

<div class="tf-page-title">
    <div class="container-full">
        <div class="row">
            <div class="col-12">
                <div class="heading text-center">OUR STORY</div>
                <!-- <p class="text-center text-2 text_black-2 mt_5"></p>  -->
            </div>
        </div>
    </div>
</div>
<section class="about">
    <div class="container">
        <div class="row">
            <!-- Brand Image / Logo -->
            <div class="col-md-6">
                <div class="about_img">
                    <img src="{{asset($logo->img_path)}}" alt='Mizkas' class='img__cover'>
                </div>
            </div>

            <!-- Our Story Content -->
            <div class="col-md-6">
                <div class="about_con">
                    <?php App\Helpers\Helper::inlineEditable(
                        'h3',
                        ['class' => ''],
                        'Our Story',
                        'A1',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "Mizkas began with a simple idea: to bring style, comfort, and quality together in every product we create. From our first handcrafted designs to our latest collections, we’ve always focused on combining innovation with timeless craftsmanship.",
                        'A2',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "What sets Mizkas apart is our commitment to excellence. Every detail, every stitch, and every design is thoughtfully crafted to ensure that our customers feel confident and inspired. We don’t just make products; we create experiences that last.",
                        'A3',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "Over the years, Mizkas has grown from a small studio into a community of passionate creators and loyal customers who share our vision. Our journey is fueled by curiosity, creativity, and the drive to make every day a little more special for those who choose Mizkas.",
                        'A4',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "Join us as we continue to explore, innovate, and celebrate the art of style. At Mizkas, every story we tell is a story about you — our customers, our partners, and our family.",
                        'A5',
                    ); ?>
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
        /* ===========================
    Inner Banner Styles
=========================== */
.inner_banner {
    position: relative;
    width: 100%;
    height: 450px;
    overflow: hidden;
}

.inner_banner .inner_bg {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
}

.inner_banner .inner_bg .img__cover {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.inner_banner .inner_img {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    justify-content: center;
}

.inner_banner .inner_img .img__contain {
    max-width: 150px;
    max-height: 100px;
    object-fit: contain;
}

.inner_bannerCon {
    position: relative;
    z-index: 3;
    padding: 100px 0 0 0;
    color: #fff;
}

.inner_bannerCon h3 {
    font-size: 48px;
    font-weight: 700;
    text-transform: uppercase;
}

/* ===========================
    About Section Styles
=========================== */
.about {
    padding: 80px 0;
    background-color: #f9f9f9;
}

.about_img {
    width: 100%;
    overflow: hidden;
    border-radius: 10px;
    margin-bottom: 30px;
}

.about_img .img__cover {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.about_img:hover .img__cover {
    transform: scale(1.05);
}

.about_con {
    padding-left: 30px;
}

.about_con h3 {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 25px;
    color: #222;
}

.about_con p {
    font-size: 16px;
    line-height: 1.8;
    color: #555;
    margin-bottom: 20px;
}

/* Inline editable highlights (optional) */
[data-inline-editable] {
    border-bottom: 1px dashed #ccc;
    cursor: text;
}

[data-inline-editable]:hover {
    background-color: rgba(255, 255, 0, 0.1);
}

/* Responsive Styles */
@media (max-width: 991px) {
    .inner_bannerCon {
        padding: 70px 0 0 0;
    }

    .inner_bannerCon h3 {
        font-size: 36px;
    }

    .about_con {
        padding-left: 0;
    }
}

@media (max-width: 767px) {
    .inner_banner {
        height: 300px;
    }

    .inner_bannerCon h3 {
        font-size: 28px;
    }

    .about {
        padding: 50px 0;
    }
}

    </style>
    
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            /*in page js here*/
        })()
    </script>
@endsection
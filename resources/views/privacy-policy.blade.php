@extends('layouts.main')
@section('content')

<div class="tf-page-title">
    <div class="container-full">
        <div class="row">
            <div class="col-12">
                <div class="heading text-center">Privacy Policy</div>
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

            <!-- Privacy Policy Content -->
            <div class="col-md-6">
                <div class="about_con">
                    <?php App\Helpers\Helper::inlineEditable(
                        'h3',
                        ['class' => ''],
                        'Our Privacy Commitment',
                        'P1',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "At Mizkas, we value your trust and are committed to protecting your personal information. This Privacy Policy outlines how we collect, use, and safeguard your data when you interact with our website and services.",
                        'P2',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "We may collect personal information such as your name, email address, phone number, billing and shipping information, and order history. This information is used solely to process orders, provide customer support, and improve your shopping experience.",
                        'P3',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "We do not sell, trade, or otherwise transfer your personal information to outside parties except as necessary to fulfill your order, comply with the law, or protect our rights.",
                        'P4',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "We implement industry-standard security measures to protect your data from unauthorized access, disclosure, or destruction. Your information is stored securely and only accessible by authorized personnel.",
                        'P5',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "By using our website, you consent to the collection and use of your information as described in this Privacy Policy. We may update this policy from time to time, and any changes will be posted on this page.",
                        'P6',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "If you have any questions or concerns about your privacy, please contact us at support@mizkas.com.",
                        'P7',
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('css')
<style type="text/css">
    /* About / Privacy Policy Section Styling (same as Our Story) */
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

    @media (max-width: 991px) {
        .about_con {
            padding-left: 0;
        }
    }
</style>
@endsection

@section('js')
<script type="text/javascript">
    (() => {
        /* Optional JS for inline editing or interactivity */
    })()
</script>
@endsection

@extends('layouts.main')
@section('content')

<div class="tf-page-title">
    <div class="container-full">
        <div class="row">
            <div class="col-12">
                <div class="heading text-center">Terms & Conditions</div>
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

            <!-- Terms & Conditions Content -->
            <div class="col-md-6">
                <div class="about_con">
                    <?php App\Helpers\Helper::inlineEditable(
                        'h3',
                        ['class' => ''],
                        'Terms & Conditions',
                        'T1',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "Welcome to Mizkas. By accessing or using our website and services, you agree to comply with and be bound by these Terms & Conditions. Please read them carefully before making any purchase.",
                        'T2',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "All products sold on Mizkas are intended for personal use only. Mizkas reserves the right to modify, discontinue, or remove any product at any time without prior notice.",
                        'T3',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "Prices, promotions, and availability of products are subject to change without notice. Mizkas reserves the right to correct any errors, inaccuracies, or omissions and to update information at any time.",
                        'T4',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'h3',
                        ['class' => ''],
                        'Return & Exchange Policy',
                        'T5',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "Please read our return and exchange policy carefully before placing an order. By purchasing from Mizkas, you agree to the following conditions:",
                        'T6',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "1. Returns or exchanges are only accepted if the wrong item is sent or if the item arrives damaged. Proof of damage, including a clear unboxing video from the start, is required.",
                        'T7',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "2. Size exchanges or returns due to the customer not following the size chart are not accepted. Please check our size guide carefully before ordering.",
                        'T8',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "3. Returns are not accepted for color differences due to lighting, screen settings, or personal preference.",
                        'T9',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "4. All items must be returned in their original condition with tags attached. Items that are worn, washed, or altered will not be accepted.",
                        'T10',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "5. Cash on Delivery (COD) and bank transfer payments are available. Refunds will be processed according to the payment method used, at Mizkas’ discretion.",
                        'T11',
                    ); ?>

                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "By shopping with Mizkas, you acknowledge and agree to these terms. Mizkas reserves the right to update or modify these Terms & Conditions at any time without prior notice.",
                        'T12',
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('css')
<style type="text/css">
    /* About / Terms & Conditions Section Styling (same as Our Story) */
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

    /* Inline editable highlights */
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

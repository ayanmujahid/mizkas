@extends('layouts.main')
@section('content')
<section class="inner_banner">
    <div class="inner_bg">
        <img src="{{asset('assets/images/inner_banner.png')}}" alt='' class='img__cover'>
    </div>
   
        
    <div class="inner_img">
        @foreach ($sliders as $slider)
        <img src="{{asset($slider->img_path)}}" alt='' class='img__contain'>
        @endforeach
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="inner_bannerCon">
                    <h3>ABOUT US</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about_img">
                    <img src="{{asset('assets/images/about.png')}}" alt='' class='img__cover'>
                </div>
            </div>
            <div class="col-md-6">
                <div class="about_con">
                    <?php App\Helpers\Helper::inlineEditable(
                        'h3',
                        ['class' => ''],
                        'about us',
                        'A1',
                    ); ?>
                    {{-- <h3>about us</h3> --}}
                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.",
                        'A2',
                    ); ?>
                    {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.</p> --}}
                        <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        " Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.",
                        'A2',
                    ); ?>
                    {{-- <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.</p> --}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="about_con">
                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        " Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.",
                        'A3',
                    ); ?>
                    {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.</p> --}}
                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        " Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.",
                        'A4',
                    ); ?>
                    {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.</p> --}}
                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ''],
                        " Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.",
                        'A5',
                    ); ?>
                    {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.</p> --}}
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
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            /*in page js here*/
        })()
    </script>
@endsection
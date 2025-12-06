@extends('layouts.main')
@section('content')
    <section class="main-banner" style="background-image: url(assets/images/main-banner.png);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="banner-con">
                        <h3>Blog Details
                        </h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banner-item">
                        <img src="{{ asset('assets/images/inner-banner-5.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="detail">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6">
                    <div class="detail-item">
                        <img src="{{ asset($blog->img_path) }}" alt="{{ $blog->title }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-con">
                        <div class="blog-cat p-0">
                            <div class="blog-date">
                                <h6>{{ date('d-m-Y', strtotime($blog->created_at)) }}</h6>
                            </div>
                            <div class="blog-date">
                                <h6>{{ $blog->get_categories->title }}</h6>
                            </div>
                        </div>
                        <h3>{{ $blog->title }}</h3>
                        <p>
                            {{ $blog->short_desc }}
                        </p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="detail-con mt-5">
                        {!! $blog->long_desc !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="related-post">
        <div class="container">
            <div class="title pb-5">
                <h3>Related Posts</h3>
            </div>
            <div class="blog-slider">
                @foreach ($related_blogs as $blog)
                    <div class="blog-item">
                        <div class="blog-inner-item">
                            <img src="{{ asset($blog->img_path) }}" alt="{{ $blog->title }}">
                        </div>
                        <div class="blog-content">
                            <div class="blog-cat">
                                <div class="blog-date">
                                    <h6>{{ date('d-m-Y', strtotime($blog->created_at)) }}</h6>
                                </div>
                                <div class="blog-date">
                                    <h6>{{ $blog->get_categories->title }}</h6>
                                </div>
                            </div>
                            <a href="{{ route('blog-details', $blog->id) }}">
                                <h3>{{ $blog->title }}</h3>
                            </a>
                            <p>{{ $blog->short_desc }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
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

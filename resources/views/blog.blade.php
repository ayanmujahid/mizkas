@extends('layouts.main')
@section('content')
<section class='banner_inner'>
    <div class='banner__img Innerbanner__img'>
        @foreach ($sliders as $slider)
        <img src="{{asset($slider->img_path)}}" alt='' class='img__cover'>
        @endforeach
    </div>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12 col-md-12 col-sm-12'>
                <div class='Innerbanner__con'>
                    <h3>{{$slider->headings}}</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog">
    <div class="container">
        <?php App\Helpers\Helper::inlineEditable(
            'h3',
            ['class' => 'blog_heading'],
            '
            Current Blog Articles
                                                ',
            'BLOG1',
        ); ?>
        {{-- <h3 class="blog_heading">Current Blog Articles</h3> --}}

            
        
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-md-4 mt-5">
                <div class="blog_main">
                    <div class="blog_image">
                        <img src="{{asset($blog->img_path)}}" alt="">
                    </div>
                    <div class="blog_cont">
                        <div class="blog_topic">
                            <p>Topic: <span>{{$blog->topic}}</span></p>
                            <p class="date"><i class='bx bx-calendar'></i><span>{{$blog->created_at}}</span></p>
                        </div>
                        <a href="">
                            <h3 class="blog_title">{{$blog->title}}</h3>
                        </a>
                        <p class="blog_para">{{$blog->short_desc}}</p>
                    </div>
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

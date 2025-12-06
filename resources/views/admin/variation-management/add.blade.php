@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Add Variation</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.create_variation') }}" enctype="multipart/form-data"
                    method="POST" class="main-form mc-b-3">
                    @csrf
                    <div class="row align-items-end">
                        
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>Product:</label>
                                <select class="form-control col-pro" name="product_id">
                                    <option value="">Select Product</option>
                                    @foreach ($products as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                       
                        

                      

                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>Stock*:</label>
                                <input type="number" class="form-control" name="stock" placeholder="Stock">

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>Price*:</label>
                                <input type="text" class="form-control" name="designer_price" placeholder="Price">
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>Sale Price*:</label>
                                <input type="text" class="form-control" name="our_price" placeholder="Sale Price">
                            </div>
                        </div>
                    </div>
                    

                      <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Color:</label>
                                <div class="color-management-boxes">
                                    @foreach ($color as $fr)
                                    <div class="color-management-box">
                                        <input type="radio" id="color-{{ $fr->id }}" value="{{ $fr->id }}" name="color_id">
                                        <label for="color-{{ $fr->id }}"><span class="color-holder" style="background-color: {{$fr->code}};"></span> {{ $fr->name }}</label>
                                    </div>
                                     @endforeach
                                </div>
                              {{--  <select class="form-control" name="color_id">
                                    <option value="">Select frame style</option>
                                    @foreach ($color as $fr)
                                        <option value="{{ $fr->id }}">{{ $fr->name }}</option>
                                    @endforeach
                                </select> --}}
                            </div>
                        </div>
                    <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Size*:</label>
                                <div class="size-management-boxes">
                                     @foreach ($size as $pr)
                                     
                                    <div class="size-management-box">
                                         <input type="checkbox" name="size_id[]" value="{{ $pr->id }}" id="size-{{ $pr->id }}">
                                        <label for="size-{{ $pr->id }}">
                                            {{ $pr->name }} ({{ $pr->symbol }})
                                        </label>
                                        
                                       
                                    </div>
                                    @endforeach
                                </div>
                              {{--  <select class="form-control" name="size_id">
                                    <option value="">Select print size</option>
                                    @foreach ($size as $pr)
                                        <option value="{{ $pr->id }}">{{ $pr->name }} </option>
                                    @endforeach
                                </select> --}}
                            </div>
                        </div>
                        
                        
                    <div class="col-lg-12 text-center">
                        <div class="img-upload-wrapper  mc-b-3">
                            <h3>Main Image</h3>
                            <figure><img src="{{asset('admin/images/placeholder.png')}}" class="thumbnail-img main_image" alt="user-img"></figure>
                            <label for="main_image" class="user-img-btn"><i class="fa fa-camera"></i></label>
                            <input type="file" required onchange="mainimage(this);" name="main_image" id="main_image" class="d-none"  accept="image/jpeg, image/png">
                            @if ($errors->has('main_image'))
                                <span class="error">{{ $errors->first('main_image') }}</span>
                            @endif
                        </div>
                   </div>
                   
                   <div class="col-lg-12 text-center">
                        <div class="img-upload-wrapper  mc-b-3">
                            <h3>Back Image</h3>
                            <figure><img src="{{asset('admin/images/placeholder.png')}}" class="thumbnail-img back_image" alt="user-img"></figure>
                            <label for="back_image" class="user-img-btn"><i class="fa fa-camera"></i></label>
                            <input type="file" required onchange="backimage(this);" name="back_image" id="back_image" class="d-none"  accept="image/jpeg, image/png">
                            @if ($errors->has('back_image'))
                                <span class="error">{{ $errors->first('back_image') }}</span>
                            @endif
                        </div>
                   </div>

                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">
                            <button id="add-record" type="submit" class="primary-btn primary-bg">Create</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
    </div>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
        .thumbnail-img {
            max-width: 288px;
            height: 113px;
        }

        span.error {
            color: #eb0909;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
    function mainimage(input) {
        if (input.files && input.files[0]) {
            
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.main_image')
                    .attr('src', e.target.result);
                   
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
     function backimage(input) {
        if (input.files && input.files[0]) {
            
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.back_image')
                    .attr('src', e.target.result);
                   
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
        (() => {

            @if (Session::has('errors'))
                @foreach ($errors->all() as $error)
                    $.toast({
                        heading: 'Error!',
                        position: 'bottom-right',
                        text: "{{ $error }}",
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 2500,
                        stack: 6
                    });
                @endforeach
            @endif

        })()
    </script>
@endsection

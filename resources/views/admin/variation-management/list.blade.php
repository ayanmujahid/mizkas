@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="chart-wrapper">

                <div class="user-wrapper">
                    <div class="row align-items-center mc-b-3">
                        <div class="col-lg-6 col-12">
                            <div class="primary-heading color-dark">
                                <h2>Variation Management</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="text-right">
                                <a href="{{ route('admin.add_variation') }}" class="primary-btn primary-bg">Add New</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="user-table" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <!--<th>Status</th>-->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>

                                @foreach ($variations as $f)
                                    <tr>
                                        <td>{{ $i }}</td>

                                        <td><img class="list-img" src="{{($f['img_path']) ? asset($f['img_path']) : asset('admin/images/placeholder.png') }}">
                                        @if($f['back_image'])
                                        <img class="list-img" src="{{($f['back_image']) ? asset($f['back_image']) : asset('admin/images/placeholder.png') }}">
                                        @endif
                                        </td>
                                        <td>{{ isset($f['product']) && null !== $f['product'] ? ucfirst($f['product']->title) : '--' }}
                                        </td>
                                       
                                        <td> 
                                        @if(isset($f['color']) && null !== $f['color'])
                                        <span class="color-holder" style="background-color: {{  $f['color']->code }};"></span>
                                        {{  $f['color']->name }}
                                        @else
                                        --
                                        @endif
                                       
                                        
                                        </td>
                                        <td>
                                             @foreach($f['sizes'] as $size)
                                                {{$size->name}},
                                            @endforeach
                                           
                                        </td>
                                        <td><del>${{ $f['designer_price'] }}</del>
                                            ${{ $f['our_price'] }}</td>
                                        <td>{{ $f['stock'] }}</td>
                                        <td>
                                            <div class="dropdown show action-dropdown">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    id="action-dropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="action-dropdown">

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.edit_variation', $f['id']) }}"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Edit</a>
                                                {{--    <a class="dropdown-item"
                                                        href="{{ route('admin.delete_variation', $f->id) }}"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Delete</a>
                                                    @if ($f->is_active == 1)
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.suspend_variation', $f->id) }}"><i
                                                                class="fa fa-ban" aria-hidden="true"></i> In Active</a>
                                                    @else
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.suspend_variation', $f->id) }}"><i
                                                                class="fa fa-ban" aria-hidden="true"></i> Activate</a>
                                                    @endif --}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        </div>
    @endsection
    @section('css')
        <style type="text/css">
            /*in page css here*/
        </style>
    @endsection
    @section('js')
        <script type="text/javascript">
            (() => {

                /*in page css here*/
            })()
        </script>
    @endsection

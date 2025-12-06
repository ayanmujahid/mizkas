@extends('layouts.main')
@section('content')
<!-- page-title -->
<div class="tf-page-title style-2">
    <div class="container-full">
        <div class="heading text-center">Register</div>
    </div>
</div>


<section class="flat-spacing-10">
    <div class="container">
        <div class="form-register-wrap">
            <div class="flat-title align-items-start gap-0 mb_30 px-0">
                <h5 class="mb_18">Register</h5>
                <p class="text_black-2">Sign up for early Sale access plus tailored new arrivals, trends and promotions. To opt out, click unsubscribe in our emails</p>
            </div>
            <div>
                <form class="" id="register-form" action="{{ route('sign-up-submit') }}" method="post" accept-charset="utf-8" data-mailchimp="true">
                    @csrf
                    <div class="tf-field style-1 mb_15">
                        <input class="tf-field-input tf-input" placeholder=" " type="text" id="property1" name="full_name"  value="{{ old('full_name') }}">
                        <label class="tf-field-label fw-4 text_black-2" for="property1">First name</label>
                        @error('full_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="tf-field style-1 mb_15">
                        <input class="tf-field-input tf-input" placeholder=" " type="text" id="property2" name="full_name" >
                        <label class="tf-field-label fw-4 text_black-2" for="property2">Last name</label>
                    </div>
                    <div class="tf-field style-1 mb_15">
                        <input class="tf-field-input tf-input" placeholder=" " type="email" id="property3" name="email"  value="{{ old('email') }}">
                        <label class="tf-field-label fw-4 text_black-2" for="property3">Email *</label>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="tf-field style-1 mb_30">
                        <input class="tf-field-input tf-input" placeholder=" " type="password" id="property4" name="sign_up_password">
                        <label class="tf-field-label fw-4 text_black-2" for="property4">Password *</label>
                        @error('sign_up_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb_20">
                        <button type="submit" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Register</button>
                    </div>
                    <div class="text-center">
                        <a href="{{route('login')}}" class="tf-btn btn-line">Already have an account? Log in here<i class="icon icon-arrow1-top-left"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<!-- /page-title -->

@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#full_name').on('input', function(e) {
                $.get('{{ route('check_slug') }}', {
                        'title': $(this).val()
                    },
                    function(data) {
                        $('#slug').val(data.slug);
                    }
                );
            });
        });

    </script> --}}
@endsection

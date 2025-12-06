@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="row align-items-center mc-b-3">
          <div class="col-lg-6 col-12">
            <div class="primary-heading color-dark">
              <h2>Edit Category</h2>
            </div>
          </div>
         
        </div>
        <form action="{{route('admin.savecolor')}}" method="POST"  class="main-form create_user_form">
            @csrf
          <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label> Color title*:</label>
                <input type="text" name="title" id="name"  value="{{$color->name}}" class="form-control" placeholder="Enter Title">
                <input type="hidden" name="id" value="{{$color->id}}">
              </div>
                  @if ($errors->has('title'))
            <span class="error">{{ $errors->first('title') }}</span>
            @endif
           </div>

           <div class="col-lg-6 col-md-6 col-12">
                <div class="form-group">
                    <label>Slug*:</label>
                    <input type="text" name="slug" id="slug" required value="{{$color->slug}}" class="form-control" placeholder="Enter Slug">
                    @if ($errors->has('slug'))
                    <span class="error">{{ $errors->first('slug') }}</span>
                    @endif
                </div>
            </div>
            
            <div class="col-lg-6 col-md-12 col-12">
              <div class="form-group">
                <label> Select Color *:</label>
                <div class="d-flex ">
                <input type="color" value="{{$color->code}}" name="color"  id="colorInput" class="form-control color-input" placeholder="Select Color">
                <input type="text" value="{{$color->code}}"  id="colortext" class="form-control ml-3" placeholder="Select Color">
              </div>
              </div>
              @if ($errors->has('color'))
            <span class="error">{{ $errors->first('color') }}</span>
            @endif
            </div>  
           
                            
                          

            <div class="col-lg-12 col-12">
            <div class="text-center">
              <button type="submit" class="primary-btn primary-bg add-user">Update</button>
            </div>
          </div>
          </form>
          </div>
        
      </div>
    </div>

  </section>
@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
  .thumbnail-img {
    max-width: 288px;
    height: 113px;
   
}

.recommend{
    color:#D75DB2;
}

</style>
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function() {
            // Get references to the color and text inputs
            var colorInput = $("#colorInput");
            var textInput = $("#colortext");

            // Listen for changes in the color input
            colorInput.on("change", function() {
                // Update the value of the text input with the selected color
                textInput.val(colorInput.val());

            
            });

            // Listen for changes in the text input
            textInput.on("input", function() {
                // Update the value of the color input with the text input value
                colorInput.val(textInput.val());

            });
        });
function thumb(input) {
        if (input.files && input.files[0]) {
            
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.thumbnail-img')
                    .attr('src', e.target.result);
                   
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
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
$('#name').change(function(e) {
    $.get('{{ route('admin.check_slug') }}', 
      { 'title': $(this).val() }, 
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });
(()=>{
  
  /*in page css here*/
})()
</script>
@endsection
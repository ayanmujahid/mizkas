@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="primary-heading color-dark">
                <h2>Add Product</h2>
            </div>

        </div>
<div class="user-wrapper">
    <div class="primary-heading color-dark">
        <h2>Import Products via CSV</h2>
    </div>

    <form action="{{ route('admin.importProductsCsv') }}" method="POST" enctype="multipart/form-data" class="main-form mc-b-3">
        @csrf

        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="form-group">
                    <label>Select CSV File:</label>
                    <input type="file" name="csv_file" accept=".csv,.txt" class="form-control" required>

                    @if ($errors->has('csv_file'))
                        <span class="error">{{ $errors->first('csv_file') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12 d-flex align-items-end">
                <button type="submit" class="primary-btn primary-bg">
                    Import CSV
                </button>
            </div>
        </div>

        <p class="mt-2">
            <strong>Required CSV Headers:</strong>  
            <code>title, slug, price, old_price, category_id, main_image, other_images</code>
        </p>
    </form>
</div>

    </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/css/fileinput.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/css/file-upload.css') }}" />
    <style type="text/css">
        /*in page css here*/
        .thumbnail-img {
            max-width: 288px;
            height: 113px;

        }

        .picture {
            max-width: 288px;
            height: 113px;

        }
    </style>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/js/plugins/sortable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/themes/fas/theme.min.js"></script>
    <script src="{{ asset('admin/js/file-upload.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <script type="text/javascript">
        function validateAndSubmit() {
            var fieldsToValidate = [{
                id: "long_desc",
                editorId: "long_desc_editor"
            }];

            var allFieldsValid = true;

            for (var i = 0; i < fieldsToValidate.length; i++) {
                var field = fieldsToValidate[i];
                if (!validateField(field.id, field.editorId)) {
                    allFieldsValid = false;
                }
            }
            console.log(allFieldsValid)
            if (allFieldsValid) {
                $("#add-record-form").submit();
            }
        }

        function validateField(fieldId, editorId) {
            var fieldValue = CKEDITOR.instances[editorId].getData().trim();
            var fieldName = $("#" + editorId).attr("placeholder");
            if (fieldValue === "") {
                $.toast({
                    heading: "Error!",
                    position: "bottom-right",
                    text: fieldName + " is Required!",
                    loaderBg: "#ff6849",
                    icon: "error",
                    hideAfter: 2000,
                    stack: 6,
                });
                return false;
            }

            $("#" + fieldId).val(fieldValue);
            return true;
        }

        $(document).ready(function() {
            $("#form-submit-btn").click(function(e) {
                e.preventDefault();
                validateAndSubmit();
            });
        });



    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#category_id').on('change', function () {
                var categoryId = $(this).val();
                var subCategoryDropdown = $('#subCategory');
    
                subCategoryDropdown.prop('disabled', true);
                subCategoryDropdown.empty();
    
                if (categoryId !== "") {
                    $.ajax({
                        url: '{{ route("getSubcategories") }}',
                        type: 'GET',
                        data: { category_id: categoryId },
                        success: function (data) {
                            subCategoryDropdown.append('<option value="" disabled selected>Select Sub Category</option>');
                            $.each(data, function (key, value) {
                                subCategoryDropdown.append('<option value="' + value.id + '">' + value.title + '</option>');
                            });
                            subCategoryDropdown.prop('disabled', false);
                        }
                    });
                }
            });
        });
    </script>
@endsection

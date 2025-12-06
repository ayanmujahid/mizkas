@extends('layouts.main')
@section('content')
<section class="about customizer-section my-5 py-3">
    <div class="loader-wraper">
        <div class="loader-wraper-inner">
            
    <div class="loader"></div>
        </div>
    </div>

<div class="button-group text-center">
    <h6 class="mb-3">Upload Images of maximum 1 Mb and of this formats (jpg,jpeg,png,webp)</h6>
    <button onclick="showFrontPage()" class="btn">Front</button>
    <button onclick="showBackPage()" class="btn">Back</button>
  </div>
   <div id="container"></div>
   <div class="save-design-btn text-center mt-5">
       <button class="btn" onclick="saveDesign()">Save Design</button>
   </div>
   <img src="" id="test-img">
</section>
<!-- Footer -->
@endsection
@section('css')
<link
  href="https://unpkg.com/@blueprintjs/core@5/lib/css/blueprint.css"
  rel="stylesheet"
/>
    <style type="text/css">
       body {
    padding: 0;
    margin: 0;
  }
  #container {
    width: 100%;
    height: 100vh;
  }
   .button-group {
      margin: 10px;
    }
    .button-group button {
      padding: 10px;
      margin-right: 10px;
    }
    /* HTML: <div class="loader"></div> */
.loader {
  width: 50px;
  aspect-ratio: 1;
  border-radius: 50%;
  border: 8px solid #000000;
  animation:
    l20-1 0.8s infinite linear alternate,
    l20-2 1.6s infinite linear;
}
@keyframes l20-1{
   0%    {clip-path: polygon(50% 50%,0       0,  50%   0%,  50%    0%, 50%    0%, 50%    0%, 50%    0% )}
   12.5% {clip-path: polygon(50% 50%,0       0,  50%   0%,  100%   0%, 100%   0%, 100%   0%, 100%   0% )}
   25%   {clip-path: polygon(50% 50%,0       0,  50%   0%,  100%   0%, 100% 100%, 100% 100%, 100% 100% )}
   50%   {clip-path: polygon(50% 50%,0       0,  50%   0%,  100%   0%, 100% 100%, 50%  100%, 0%   100% )}
   62.5% {clip-path: polygon(50% 50%,100%    0, 100%   0%,  100%   0%, 100% 100%, 50%  100%, 0%   100% )}
   75%   {clip-path: polygon(50% 50%,100% 100%, 100% 100%,  100% 100%, 100% 100%, 50%  100%, 0%   100% )}
   100%  {clip-path: polygon(50% 50%,50%  100%,  50% 100%,   50% 100%,  50% 100%, 50%  100%, 0%   100% )}
}
@keyframes l20-2{ 
  0%    {transform:scaleY(1)  rotate(0deg)}
  49.99%{transform:scaleY(1)  rotate(135deg)}
  50%   {transform:scaleY(-1) rotate(0deg)}
  100%  {transform:scaleY(-1) rotate(-135deg)}
}
.customizer-section {
    position: relative;
}

.loader-wraper {
    position: absolute;
    display: none;
    width: 100%;
    height: 100%;
    z-index: 999;
    background: #000000ab;
    
    top: 0;
    left: 0;
}
.loader-wraper-inner{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
}
.konvajs-content:before {
    position: absolute;
    content: '';
    right: 0;
    bottom: 0;
    width: 100%;
    background: #e8e8e8;
    z-index: 99;
    height: 30px;
}
.bp5-navbar-group span.bp5-popover-target:last-child {
    display: none;
}
    a{
   color:#000 !important; 
}
a:hover{
  color:#000 !important;
}
a .bp5-icon, a .bp5-icon-standard, a .bp5-icon-large{
  color:inherit;
}
a code{
  color:inherit;
}

    </style>
@endsection
@section('js')
<script src="https://unpkg.com/polotno@2/polotno.bundle.js"></script>
    <script type="text/javascript">
        const { store } = createPolotnoApp({
    key: 'opbYhGCBL7vurE1KAoOi',
    showCredit: true,
    container: document.getElementById('container'),
    sections: ['photos', 'text', 'elements', 'upload', 'layers']
  });
    const editorWidth = store.width;
    const editorHeight = store.height;
    
    const frontPage = store.pages[0];
    const backPage = store.addPage();

    frontPage.addElement({
      type: 'image',
      src: '{{($variation->img_path != null ) ? asset($variation->img_path) : asset("admin/images/placeholder.png")}}', // Replace with your front t-shirt image URL
      selectable: false,
      showInExport: true,
      width: editorWidth,
      height: editorHeight,
      x: 0,
      y: 0
    });

    // Add image to the back page
    backPage.addElement({
      type: 'image',
      src: '{{ ($variation->back_image != null ) ? asset($variation->back_image) : asset("admin/images/placeholder.png")}}', // Replace with your back t-shirt image URL
      selectable: false,
      showInExport: true,
      width: editorWidth,
      height: editorHeight,
      x: 0,
      y: 0
    });
    
    function showFrontPage() {
      store.selectPage(store.pages[0].id);
    }
    function showBackPage() {
         store.selectPage(backPage.id);
    }
   async function saveDesign() {
       $('.loader-wraper').show();
       
      const variationId = {{$variation->id}};
      const quantitySelected = 1; 

      
    //   const dataUrl =  store.toDataURL();
    //   store.toDataURL();
        
        // console.log(dataUrl);
        // $('#test-img').attr('src', dataUrl.PromiseResult);
      try {
        // Get data URLs of both pages
        // const frontPageDataUrl = await store.pages[0].toDataURL();
        const frontPageDataUrl = await store.toDataURL({ pageId: store.pages[0].id });
        const backPageDataUrl = await store.toDataURL({ pageId: store.pages[1].id });

        // Create a canvas to combine both images
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');

        // Assuming both pages have the same width and height
        const pageWidth = store.width;
        const pageHeight = store.height;

        // Set canvas size to accommodate both images
        canvas.width = pageWidth;
        canvas.height = pageHeight * 2;

        // Draw the front page image on the canvas
        const frontImage = new Image();
        frontImage.src = frontPageDataUrl;
        await new Promise((resolve) => {
            frontImage.onload = resolve;
        });
        context.drawImage(frontImage, 0, 0, pageWidth, pageHeight);

        // Draw the back page image below the front page image
        const backImage = new Image();
        backImage.src = backPageDataUrl;
        await new Promise((resolve) => {
            backImage.onload = resolve;
        });
        context.drawImage(backImage, 0, pageHeight, pageWidth, pageHeight);

        // Get the combined image as a data URL
        const combinedDataUrl = canvas.toDataURL('image/png');
          
                  $.ajax({
                    url: '{{route('save-customize-design')}}', 
                    type: 'POST',
                    data: {
                      image: combinedDataUrl,
                      variation_id: variationId,
                      quantity_selected: quantitySelected
                    },
                    headers: {
                      'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for Laravel
                    },
                    success: function(response) {
                        
                            if(response.success){
                                // console.log(response.image);
                                    $.toast({
                                    heading: 'Success!',
                                    position: 'top-right',
                                    text:  'Image Customized Succesfully',
                                    loaderBg: '#ff6849',
                                    icon: 'success',
                                    hideAfter: 2500,
                                    stack: 6
                                });
                                $('.loader-wraper').hide();
                               
                                setInterval(() => {
                                    
                                    window.location = "{{route('cart')}}";
                                }, 2500);
                                 
                             
                            }else{
                                $.toast({
                    				heading: 'Error!',
                    				position: 'bottom-right',
                    				text:  response.error,
                    				loaderBg: '#ff6849',
                    				icon: 'error',
                    				hideAfter: 5000,
                    				stack: 6
                    			});
                            }
                            
                    },
                    error: function(xhr, status, error) {
                      console.error('Error saving design:', error);
                    }
                  });
      } catch (error) {
        console.error('Error generating combined image:', error);
    }
    }
    </script>
@endsection
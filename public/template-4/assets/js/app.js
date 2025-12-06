// Initialize Wow
new WOW().init();
// var getSidebar = document.querySelector('nav');
 
// <!-- ====== SCROLL TO TOP SCRIPT ====== -->
var scrollToTopBtn = document.querySelector(".scrollToTopBtn")
var rootElement = document.documentElement

function handleScroll() {
  // Do something on scroll - 0.15 is the percentage the page has to scroll before the button appears
  // This can be changed - experiment
  var scrollTotal = rootElement.scrollHeight - rootElement.clientHeight
  if ((rootElement.scrollTop / scrollTotal ) > 0.15) {
    // Show button
    scrollToTopBtn.classList.add("showBtn")
  } else {
    // Hide button
    scrollToTopBtn.classList.remove("showBtn")
  }
}



// <!-- ====== SCROLL TO TOP SCRIPT ====== -->


// Check for valid email syntax 

$(document).ready(function($) {

  /* ------------------------- */
  /* Contact Form Interactions */
  /* ------------------------- */
  $('.form_popup').on('click', function(event) {
    event.preventDefault();
    $('.contact').addClass('is-visible');
 
  });

  //close popup when clicking x or off popup
  $('.cd-popup').on('click', function(event) {
    if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
      event.preventDefault();
      $(this).removeClass('is-visible');
    }
  });

  //close popup when clicking the esc keyboard button
  $(document).keyup(function(event) {
    if (event.which == '27') {
      $('.cd-popup').removeClass('is-visible');
    }
  });




$(document).ready(function () {
  $('.scrollToTopBtn').hover(function () {
      $(this).removeClass('scrollbtn');
  });
});

$(document).ready(function () {
  $('.scrollToTopBtn').mouseleave(function () {
      $(this).addClass('scrollbtn'); 
});
});
 
  
    return false;
  });
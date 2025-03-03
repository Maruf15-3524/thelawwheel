document.addEventListener("DOMContentLoaded", function () {
  let backToTop = document.querySelector(".back-to-top");

  window.addEventListener("scroll", function () {
      if (window.scrollY > 150) {
          backToTop.style.display = "block";
      } else {
          backToTop.style.display = "none";
      }
  });
});

window.addEventListener('scroll', function() {
  if (window.scrollY > 50) {
    // Add the "nav-sticky" class to elements with class "navbar"
    document.querySelectorAll('.nav-bar').forEach(function(el) {
      el.classList.add('nav-sticky');
    });
    // Set margin-top to "80px" for elements with classes "services" and "page-header"
    document.querySelectorAll('.feature-top').forEach(function(el) {
      el.style.marginTop = "80px";
    });
  } else {
    document.querySelectorAll('.nav-bar').forEach(function(el) {
      el.classList.remove('nav-sticky');
    });

    document.querySelectorAll('.feature-top').forEach(function(el) {
      el.style.marginTop = "0";
    });
  }
});

function toggleMenu() {
  const mobileMenu = document.querySelector('.mobile-menu');
  mobileMenu.classList.toggle('active');
}

(function ($) {
  "use strict";

  $(".service-carousel").owlCarousel({
    autoplay: true,
    smartSpeed: 1500,
    margin: 30,
    dots: false,
    loop: true,
    nav : true,
    navText : [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    responsive: {
        0:{
            items:1
        },
        576:{
            items:1
        },
        768:{
            items:2
        },
        992:{
            items:3
        }
    }
});


 // Team carousel
 $(".team-carousel").owlCarousel({
  autoplay: true,
  smartSpeed: 1500,
  margin: 30,
  dots: false,
  loop: true,
  nav : true,
  navText : [
      '<i class="fa fa-angle-left" aria-hidden="true"></i>',
      '<i class="fa fa-angle-right" aria-hidden="true"></i>'
  ],
  responsive: {
      0:{
          items:1
      },
      576:{
          items:2
      },
      768:{
          items:3
      },
      992:{
          items:4
      }
  }
});
// media carousel

$(document).ready(function(){
  var owl = $(".owl-carousel");

  owl.owlCarousel({
      loop: true,
      margin: 20,
      dots: false,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      responsive: {
    0:{
        items:1
    },
    576:{
        items:2
    },
    768:{
        items:3
    },
    992:{
        items:4
    }
}
  });

  $(".prev-btn").click(function() {
      owl.trigger('prev.owl.carousel');
  });

  $(".next-btn").click(function() {
      owl.trigger('next.owl.carousel');
  });
});

})(jQuery);



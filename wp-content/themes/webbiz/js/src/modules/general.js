/*global
  $:true
*/

const page_transitions = () => {
  $("#page").animate({ opacity: 1 }, 700);
};

const main_menu_dropdowns = () => {
  $(".primary-menu li.menu-item-has-children > a").append(
    "<i class='fa fa-angle-down'></i>"
  );
};

const wb_full_bg_img = (selector) => {
  let $selector = $(selector);
  if ($selector) {
    // each time there is the selector init backstretch
    $selector.each(function () {
      let $this = $(this);
      let img = $this.data("img");

      if (img) {
        $this.backstretch(img);
      }
    });
  }
};

page_transitions();
main_menu_dropdowns();
wb_full_bg_img(".bg-img");

function mobileMenu() {
  // mobile menu toggle
  $(".mobile-menu-toggle").click(function () {
    $(".mobile-menu-container").toggleClass("active");
    $("#mobile-menu .sub-menu").removeClass("active");
    // toggle icon style
    $(this).toggleClass("is-active");
    // switch logos
    // lock scroll
    $("body").toggleClass("mobile-menu-open");
  });

  // add sub menu icon
  $("#mobile-menu .menu-item-has-children > a").append(
    // '<i class="ml-2 fas fa-angle-right"></i>'
    "<svg class='arrow-icon' xmlns='http://www.w3.org/2000/svg' width='32', height='32', viewBox='0 0 32 32' preserveAspectRatio='xMinYMin'><g fill='none', stroke='#FFFFFF', stroke-width='1.5', stroke-linejoin='round', stroke-miterlimit='10'><path class='arrow-icon--arrow' d='M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98' ></path></g></svg>"
  );

  // add back button to sub menu
  $("#mobile-menu .sub-menu").prepend(
    "<li class='menu-back-toggle'><a href='#' class='menu-arrow-left'><svg class='arrow-icon-left-side' xmlns='http://www.w3.org/2000/svg' width='32', height='32', viewBox='0 0 32 32' preserveAspectRatio='xMinYMin'><g fill='none', stroke='#FFFFFF', stroke-width='1.5', stroke-linejoin='round', stroke-miterlimit='10'><path class='arrow-icon--arrow' d='M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98' ></path></g></svg> Suskleisti</a></li>"
  );

  // toggle sub menu
  $("#mobile-menu li.menu-item-has-children > a").click(function (e) {
    // prev default
    e.preventDefault();

    // reveal sub menu
    $(this).siblings(".sub-menu").addClass("active");

    // move menu
    $("#mobile-menu").addClass("sub-menu-open");
  });

  // toggle sub menu back
  $("#mobile-menu li.menu-back-toggle > a").click(function (e) {
    // prev default
    e.preventDefault();

    // hide sub menu
    $("#mobile-menu .sub-menu").removeClass("active");

    // move menu
    $("#mobile-menu").removeClass("sub-menu-open");
  });
}

mobileMenu();

function selectField() {
  $("select").wrap('<div class="select-wrapper fas fa-chevron-down"></div>');
  //$('.select-wrapper').prepend('<i class="fas fa-chevron-down"></i>');
}

selectField();

$(".frontpage-slider .slider").slick({
  arrows: false,
  dots: true,
  slidesToScroll: 1,
  autoplay: true,
  infinite: true,
  speed: 300,
});

$(".main-prod-cat .slider").slick({
  arrows: true,
  dots: false,
  // slidesToScroll: 1,
  // autoplay: true,
  infinite: true,
  speed: 400,
  slidesToShow: 3,
});

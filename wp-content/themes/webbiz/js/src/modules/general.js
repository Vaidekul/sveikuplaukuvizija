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
    // toggle icon style
    $(this).toggleClass("is-active");
    // lock scroll
    $("body").toggleClass("mobile-menu-open");
  });

  // add icon
  $("#mobile-menu .menu-item-has-children > a").append(
    '<i class="ml-2 fas fa-angle-down"></i>'
  );

  // toggle sub menu
  $("#mobile-menu .menu-item-has-children").click(function () {
    $(this).find(".sub-menu").toggleClass("d-block");
  });
}

mobileMenu();

function selectField() {
  $("select").wrap('<div class="select-wrapper fas fa-chevron-down"></div>');
  //$('.select-wrapper').prepend('<i class="fas fa-chevron-down"></i>');
}

selectField();

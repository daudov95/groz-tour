// MOBILE MENU

$(function() {
  $(document).on("click", ".mobile_menu_container .parent", function(e) {
      e.preventDefault();
      $(".mobile_menu_container .activity").removeClass("activity");
      $(this).siblings("ul").addClass("loaded").addClass("activity");
  });
  $(document).on("click", ".mobile_menu_container .back", function(e) {
      e.preventDefault();
      $(".mobile_menu_container .activity").removeClass("activity");
      $(this).parent().parent().removeClass("loaded");
      $(this).parent().parent().parent().parent().addClass("activity");
  });
  $(document).on("click", ".header-menu__btn", function(e) {
      e.preventDefault();
      $(".mobile_menu_container").addClass("loaded");
      $(".mobile_menu_overlay").fadeIn();
      $("body").addClass('fixed');
  });
  $(document).on("click", ".mobile_menu_overlay", function(e) {
      $(".mobile_menu_container").removeClass("loaded");
      $(this).fadeOut(function() {
          $(".mobile_menu_container .loaded").removeClass("loaded");
          $(".mobile_menu_container .activity").removeClass("activity");
          $("body").removeClass('fixed');
      });
  });
})


// Scroll to price

const price = document.querySelector('.card-price__scroll')

if(price) {
  price.addEventListener('click', function (e) {
    e.preventDefault()
    const blockID = price.getAttribute('href').substr(1)
    
    document.getElementById(blockID).scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    })
  })
}




// TELEPHONE

// if(document.getElementById('phone-mask')) {
//   let phoneMask = IMask(
//     document.getElementById('phone-mask'), {
//     mask: '+{7}(000) 000-00-00'
//   });
// }




jQuery(function() {

  $('.header__action').on('click', function(event) {
    event.preventDefault();
    openCloseNav();
  });

  // $(window).scroll(function(){
  //   if($(this).scrollTop() > 0) {
  //      $('.header').addClass('header--inTransition');
  //   } else {
  //      $('.header').removeClass('header--inTransition');
  //   }
  // });
});

function openCloseNav() {
  let btn = $('.header__action');
  var navHeight = $('.nav').height();
  var headerHeight = $('.header').height();
  var translateNav = navHeight - headerHeight;

  $('.header').toggleClass('opened');

  // OPEN
  if(btn.text() == "Menu") {
    btn.text("Fermer");
    btn.removeClass("icon--hamburger");
    btn.addClass("icon--close");
    $('.nav').css('transform', 'translateY(' + translateNav+"px" + ')');
    disableScroll();
  } // CLOSE
  else {
    enableScroll()
    btn.text("Menu");
    btn.removeClass("icon--close");
    btn.addClass("icon--hamburger");
    $('.nav').css('transform', 'translateY(0px)');
  }
}

function disableScroll() {
    // Get the current page scroll position
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,

        // if any scroll is attempted, set this to the previous value
        window.onscroll = function() {
            window.scrollTo(scrollLeft, scrollTop);
        };
}

function enableScroll() {
    window.onscroll = function() {};
}

$(document).ready(function() {
  // $('.header__action').on('click', openCloseNav(event));
  $('.header__action').on('click', function(event) {
    event.preventDefault();

    let btn = $('.header__action');

    $('.header').toggleClass('opened');

    if(btn.text() == "Menu") {
      btn.text("Fermer");
      btn.removeClass("icon--hamburger");
      btn.addClass("icon--close");
    }
    else {
      btn.text("Menu");
      btn.removeClass("icon--close");
      btn.addClass("icon--hamburger");
    }
  });

  $(window).scroll(function(){
    if ($(this).scrollTop() > 0) {
       $('.header').addClass('header--inTransition');
    } else {
       $('.header').removeClass('header--inTransition');
    }
  });
});

// function showHideHeader() {
//   if ($(this).scrollTop() > 0) {
//      $('.header').addClass('header--inTransition');
//   } else {
//      $('.header').removeClass('header--inTransition');
//   }
// }

// function openCloseNav(e) {
//   e.preventDefault();
//
//   let btn = $('.header__action');
//
//   $('.header').toggleClass('opened');
//
//   if(btn.text() == "Menu") {
//     btn.text("Fermer");
//     btn.removeClass("icon--hamburger");
//     btn.addClass("icon--close");
//   }
//   else {
//     btn.text("Menu");
//     btn.removeClass("icon--close");
//     btn.addClass("icon--hamburger");
//   }
// }

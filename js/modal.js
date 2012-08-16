// # Twitter Bootstrap modal responsive fix by @niftylettuce
//  * resolves #407, #1017, #1339, #2130, #3361, #3362, #4283
//   <https://github.com/twitter/bootstrap/issues/2130>
//  * built-in support for fullscreen Bootstrap Image Gallery
//    <https://github.com/blueimp/Bootstrap-Image-Gallery>

// **NOTE:** If you are using .modal-fullscreen, you will need
//  to add the following CSS to `bootstrap-image-gallery.css`:
//
//  @media (max-width: 480px) {
//    .modal-fullscreen {
//      left: 0 !important;
//      right: 0 !important;
//      margin-top: 0 !important;
//      margin-left: 0 !important;
//    }
//  }
//

var adjustModal = function($modal) {
  var top;
  if ($(window).width() <= 480) {
    if ($modal.hasClass('modal-fullscreen')) {
      if ($modal.height() >= $(window).height()) {
        top = $(window).scrollTop();
      } else {
        top = $(window).scrollTop() + ($(window).height() - $modal.height()) / 2;
      }
    } else if ($modal.height() >= $(window).height() - 10) {
      top = $(window).scrollTop() + 10;
    } else {
      top = $(window).scrollTop() + ($(window).height() - $modal.height()) / 2;
    }
  } else {
    top = '50%';
    if ($modal.hasClass('modal-fullscreen')) {
      $modal.stop().animate({
          marginTop  : -($modal.outerHeight() / 2)
        , marginLeft : -($modal.outerWidth() / 2)
        , top        : top
      }, "fast");
      return;
    }
  }
  $modal.stop().animate({ 'top': top }, "fast");
};

var show = function() {
  var $modal = $(this);
  adjustModal($modal);
};

var checkShow = function() {
  $('.modal').each(function() {
    var $modal = $(this);
    if ($modal.css('display') !== 'block') return;
    adjustModal($modal);
  });
};

var modalWindowResize = function() {
  $('.modal').not('.modal-gallery').on('show', show);
  $('.modal-gallery').on('displayed', show);
  checkShow();
};

$(modalWindowResize);
$(window).resize(modalWindowResize);
$(window).scroll(checkShow);
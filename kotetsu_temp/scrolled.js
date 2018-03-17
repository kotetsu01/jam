jQuery(function() {
  jQuery(function() {
  var $win = jQuery(window),
      $cloneNav = jQuery('.top-nav-area').clone().addClass('clone-nav').appendTo('body'),
      showClass = 'is-show';

  $win.on('load scroll', function() {
    var value = jQuery(this).scrollTop();
    if ( value > 700 ) {
      $cloneNav.addClass(showClass);
    } else {
      $cloneNav.removeClass(showClass);
    }
  });
});
});

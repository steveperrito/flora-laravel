$(function(){
  var mapsWrap = $('.responsive-gmaps')
    , mapFrame = $('.responsive-gmaps iframe');

  mapsWrap.click(function () {
    var frameToLoad = $(this).find('iframe')
      , beforeMsg = $(this).find('span.before-map-msg');

    $(this).removeClass('map-cover');
    beforeMsg.remove();
    mapFrame.css("pointer-events", "auto");

    frameToLoad.fadeIn(function(){
      $(this).attr('src', $(this).data('src'))
    });
  });

  mapsWrap.mouseleave(function() {
    mapFrame.css("pointer-events", "none");
  });

});
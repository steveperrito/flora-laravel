$(function(){
  var mapsWrap = $('.responsive-gmaps')
    , mapFrame = $('.responsive-gmaps iframe');

  mapsWrap.click(function () {
    mapFrame.css("pointer-events", "auto");
  });

  mapsWrap.mouseleave(function() {
    mapFrame.css("pointer-events", "none");
  });

});
$(function(){
  var stat = $('span.admin-stat');
  var counters = {};

  stat.each(function(index){
    var target = $(this).data('stat');

    counters[index] = new CountUp(this, 0, target);
    counters[index].start();
    });
});
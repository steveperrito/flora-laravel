$(function () {
  var stat = $('.admin-stat')
    , counters = {}
    , statRow = $('#admin-stats');

  statRow
    .css('visibility', 'visible')
    .hide()
    .fadeIn('slow', startCounting);

  function startCounting() {
    stat.each(function (index) {
      var target = $(this).data('stat');

      counters[index] = new CountUp(this, 0, target);
      counters[index].start();
    });
  }
});
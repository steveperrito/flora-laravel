$(function(){

  var inFieldRadio = $('input[name=in_field]'),
      latInput = $('input[name=ObservationLat]'),
      lngInput = $('input[name=ObservationLng]'),
      headerText = $('section.page-header>h1'),
      locationHelp = $('p.location-help'),
      modalBody = $('div.modal-body'),
      locationText = $('textarea[name=PlantLocation]'),
      weatherCond = $('input[name=WeatherConditions]'),
      temp = $('input[name=Temp]'),
      iconWrap = $('span.weather-icon'),
      manualRadio = $('input[type=radio]').eq(1),
      spinner = $('div.spinner'),
      body = $('body'),
      modalBackDrop = '<div class="modal-backdrop fade in"></div>',
      observedAt = $('.observed-at'),
      observedAtInput = $('input[name=observed_at]'),
      observedAtHr = $('.observed-at-hr'),
      observedAtHrInput = $('input[name=observed_at_hr]'),
      amPmInput = $('input[name=am_pm]'),
      amPmMenu = $('#am-pm'),
      amPmSelect = $('.meridiem');

  inFieldRadio.change(function(){

    var inFeild = $(this).val() == 1;

    if (!inFeild) {
      pastObserve();
    }

    else if (!navigator.geolocation) {
      goOffAir(false);
    }

    else if (inFeild && navigator.geolocation) {
      body.addClass('modal-open').append(modalBackDrop);
      spinner.removeClass('hidden');
      navigator.geolocation.getCurrentPosition(goLive, goOffAir);
    }
  });

  amPmSelect.click(function(e){
    e.preventDefault();
    var meridiemChosen = $(this).text();
    amPmInput.val(meridiemChosen);
    amPmMenu.text(meridiemChosen);
  });

  function goLive(position) {

    var lat = position.coords.latitude.toFixed(6),
        lng = position.coords.longitude.toFixed(6),
        nowObj = moment(),
        nowStr = nowObj.format('YYYY-MM-DD'),
        nowHr = nowObj.format('h:mm'),
        amPm = nowObj.format('A');

    latInput.val(lat);
    lngInput.val(lng);
    observedAtInput.val(nowStr);
    amPmInput.val(amPm);
    amPmMenu.text(amPm);
    observedAtHrInput.val(nowHr);
    headerText.html('<span class="glyphicon glyphicon-map-marker text-success"></span> Live, In-Field Flora Observation!');
    modalBody.append('<iframe frameborder="0" src="https://www.google.com/maps/embed/v1/search?key=AIzaSyD4ZNMSDhjetfTQGAlUBse5YAKqTlE4HN8&q=' + lat + ',' + lng + '" allowfullscreen></iframe>');
    locationHelp.html('<a href="#myModal" data-toggle="modal" data-target="#myModal">Latitude: ' + lat + ' Longitude: ' + lng + '</a>');

    //take off auto-filled inputs.
    if (locationText.is(':visible')){
      locationText.slideUp();
    }

    if (observedAt.is(':visible')) {
      observedAt.slideUp();
    }

    if (observedAtHr.is(':visible')) {
      observedAtHr.slideUp();
    }

    getWeather(lat, lng);
    body.removeClass('modal-open');
    $('div.modal-backdrop').remove();
    spinner.addClass('hidden');
  }


  function goOffAir(geo) {

    geo = geo || true; //html5 coordinates available (true)/not available (false).

    manualRadio.prop('checked', true);//set radio option to manual entry.

    body.removeClass('modal-open');
    $('div.modal-backdrop').remove();
    spinner.addClass('hidden');

    pastObserve();

    if (!geo) {
      //browser does not support html5 geolocation
      alert('Unfortunately, your device will not share it\'s location with us. Please log your observation manually');
    }
    else {
      //user tells browser not to show lat, lng.
      alert('We cannot detect your location. Please log your observation manually');
    }

  }


  function pastObserve() {

    latInput.val(null);
    lngInput.val(null);
    headerText.html('Log Flora Observation');
    locationHelp.html('Describe as accurately as possible your location');

    if (!locationText.is(':visible')) {
      locationText.slideDown();
    }

    if (!observedAt.is(':visible')) {
      observedAt.slideDown();
    }

    if (!observedAtHr.is(':visible')) {
      observedAtHr.slideDown();
    }

    iconWrap.empty();
    iconWrap.removeClass('un-pad');
    iconWrap.append('<span class="glyphicon glyphicon-cloud text-success"></span>' );
  }


  function getWeather(lat, lng) {

    var url ='http://api.openweathermap.org/data/2.5/weather?units=imperial&lat=' + lat + '&lon=' + lng + '&APPID=7580e76e1156c975eda268ffd1d1c25e';

    console.log(url);
    $.getJSON(url, function(data) {
      console.log(data);
      var description = data.weather[0].description,
          temperature = data.main.temp,
          icon = data.weather[0].icon,
          cityTown = data.name;

      weatherCond.val(description);
      temp.val(temperature);
      iconWrap.empty();
      iconWrap.addClass('un-pad');
      iconWrap.append('<img height="32" src="http://openweathermap.org/img/w/' + icon + '.png">' );
      locationText.val(cityTown);
    });
  }

});
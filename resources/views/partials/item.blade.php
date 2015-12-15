<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"> <span class="text-success glyphicon glyphicon-leaf"></span> {{ $observation->PlantName }} <small>{{ $observation->observed_at->toDayDateTimeString() }}</small>
            <a class="pull-right" href="{{ action('ObservationController@edit', ['id' => $observation->id]) }}"><span class="glyphicon glyphicon-edit"></span></a></h3>
    </div>
    <div class="panel-body">
        <div class="col-sm-4">
            <h4>Observation Details:</h4>
            <ul>
                <li>

                    @if($observation->contributor->id == 2)
                        <span data-toggle="tooltip" data-placement="top" title="Guest Submission" class="glyphicon glyphicon-question-sign"></span>
                    @elseif($observation->contributor->profile->id)
                        <a href="/profile/{{ $observation->contributor->profile->id }}" data-toggle="tooltip" data-placement="top" title="{{ $observation->contributor->email }}"><span class="glyphicon glyphicon-ok-sign text-success"></span></a>
                    @else
                        <span data-toggle="tooltip" data-placement="top" title="{{ $observation->contributor->email }}" class="glyphicon glyphicon-ok-sign text-success"></span>
                    @endif

                    {{--<span class="glyphicon glyphicon-user"></span>--}} {{ $observation->ObserverNameF }} {{ $observation->ObserverNameL }}
                </li>
                <li> <span class="glyphicon glyphicon-map-marker"></span> {{ $observation->PlantLocation }}</li>
                <li> <span class="glyphicon glyphicon-cloud"></span> {{ $observation->Temp }}&deg;F, {{ $observation->WeatherConditions }}</li>
                <li> <span class="glyphicon glyphicon-globe"></span> {{ $observation->soil->SoilType }}</li>
            </ul>
        </div>

        @if ($observation->Notes != null)
            <div class="col-sm-4">
                <h4>Observer Notes:</h4>
                <blockquote>
                    {{ $observation->Notes }}
                    <footer>{{ $observation->ObserverNameF }}</footer>
                </blockquote>
            </div>
        @endif

        @if ($observation->ObservationLat != null && $observation->ObservationLng != null)

            <div class="col-sm-4">
                <div class="responsive-gmaps map-cover">
                    <span class="before-map-msg"><span class="glyphicon glyphicon-map-marker text-success"></span></span>
                    <iframe style="display:none;" frameborder="0" data-src="https://www.google.com/maps/embed/v1/search?key=AIzaSyD4ZNMSDhjetfTQGAlUBse5YAKqTlE4HN8&q={{ $observation->ObservationLat }},{{ $observation->ObservationLng }}" src="" allowfullscreen></iframe>
                </div>
            </div>
        @endif

    </div>
</div>
@extends('layout')

@section('sheets')
    <link rel="stylesheet" href="/css/observe-create.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    @stop

    @section('content')

    <!-- Map Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

    <div class="spinner hidden"><span class="glyphicon glyphicon-refresh text-success"></span></div>

    <section class="page-header">
        <h1><span class="glyphicon glyphicon-pencil text-success"></span> Log Flora Observation</h1>
    </section>

    @if(auth()->guest())
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <div>
                        <strong><span class="glyphicon glyphicon-warning-sign"></span> WARNING</strong> You're about to
                        make an observation as a <mark>guest</mark>. Guests cannot edit or review their submissions.
                        Please <a href="/auth/register">register</a> or <a href="/auth/login">login</a> if you'd like to
                        track and manage your observations.
                    </div>
                </div>
            </div>
        </div>
    @endif

    @include('errors.warn')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['url' => 'observations']) !!}
                    <!-- latitude -->
            {!! Form::hidden('ObservationLat') !!}

                    <!-- Longitude -->
            {!! Form::hidden('ObservationLng') !!}
                    <!-- am/pm -->
            {!! Form::hidden('am_pm', 'AM') !!}

            {!! Form::hidden('in_field', 0) !!}

            <div class="btn-group btn-group-lg btn-group-justified row-buffer" role="group">
                <a class="observation-type btn btn-default active" type="button">Manual Observation</a>
                <a class="observation-type btn btn-default" type="button">In Field Observation</a>
            </div>
            <!-- first name -->
            <div class="form-group {{ $errors->has('ObserverNameF') ? 'has-error' : '' }}">
                {!! Form::label('ObserverNameF', 'First Name:') !!}
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user text-success"></span></span>
                    {!! Form::text('ObserverNameF', $fname, ['class' => 'form-control']) !!}
                </div>
            </div>

            <!-- last name -->
            <div class="form-group">
                {!! Form::label('ObserverNameL', 'Last Name:') !!}
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user text-success"></span></span>
                    {!! Form::text('ObserverNameL', $lname, ['class' => 'form-control']) !!}
                </div>
            </div>

            <!-- plant name -->
            <div class="form-group {{ $errors->has('PlantName') ? 'has-error' : '' }}">
                {!! Form::label('PlantName', 'Plant Name:') !!}
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-leaf text-success"></span></span>
                    {!! Form::text('PlantName', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <!-- plant location -->
            <div class="form-group">
                {!! Form::label('PlantLocation', 'Plant Location:') !!}
                {!! Form::textarea('PlantLocation', null, ['class' => 'form-control', 'rows' => 3]) !!}
                <p class="help-block location-help">Describe as accurately as possible your location</p>
            </div>

            <!-- Observation Date -->
            <div class="form-group observed-at {{ $errors->has('observed_at') ? 'has-error' : '' }}">
                {!! Form::label('observed_at', 'Observation Date:') !!}
                <div class="input-group">
                    <span class="input-group-addon"><span
                                class="glyphicon glyphicon-calendar text-success"></span></span>
                    {!! Form::input('date', 'observed_at', date('Y-m-d'), ['class' => 'form-control']) !!}
                </div>
            </div>

            <!-- Observation Time -->
            <div class="form-group observed-at-hr {{ $errors->has('observed_at_hr') ? 'has-error' : '' }}">
                {!! Form::label('observed_at_hr', 'Observation Time:') !!}
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time text-success"></span></span>
                    {!! Form::text('observed_at_hr', null, ['class' => 'form-control', 'placeholder' => 'h:mm']) !!}
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><span id="am-pm">{{ date('A') }}</span> <span
                                    class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a class="meridiem" href="#">AM</a></li>
                            <li><a class="meridiem" href="#">PM</a></li>
                        </ul>
                    </div>
                </div>
                <p class="help-block"><em>example: 12:30</em></p>
            </div>

            <!-- weather -->
            <div class="form-group">
                {!! Form::label('WeatherConditions', 'Weather conditions') !!}
                <div class="input-group">
                    <span class="input-group-addon weather-icon"><span
                                class="glyphicon glyphicon-cloud text-success"></span></span>
                    {!! Form::text('WeatherConditions', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <!-- temperature -->
            <div class="form-group">
                {!! Form::label('Temp', 'Temperature') !!}
                <div class="input-group">
                    <span class="input-group-addon"><strong class="text-success">F&deg;</strong></span>
                    {!! Form::input('number', 'Temp', null, ['class' => 'form-control', 'step' => '0.01']) !!}
                </div>
            </div>

            <!-- soil type -->
            <div class="form-group {{ $errors->has('SoilType') ? 'has-error' : '' }}">
                {!! Form::label('SoilType', 'Soil Type') !!}
                {!! Form::select('SoilType', $select, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Notes', 'Observation Notes') !!}
                {!! Form::textarea('Notes', null, ['class' => 'form-control']) !!}
            </div>
            <div class="text-center">
                {!! Form::submit('Save Observation', ['class' => 'btn btn-success btn-lg']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('footer')
    <script type="text/javascript" src="/js/liveObserve.js"></script>
@stop
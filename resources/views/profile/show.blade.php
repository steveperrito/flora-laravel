@extends('layout')

@section('sheets')
    <link rel="stylesheet" type="text/css" href="/css/jquery.circliful.css">
@stop

@section('content')

    @include('partials.profileModal', ['profile' => $profile])

    @if($profile)
        @include('partials.profileHeader', ['user' => $profile->user, 'nulls' => $nulls])
    @else
        @include('partials.profileHeader', ['user' => auth()->user(), 'nulls' => $nulls])
    @endif

    <div class="row">
        <div class="col-sm-4">
            <h3 class="text-center">
                <span class="glyphicon glyphicon-map-marker"></span>
            </h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul>
                        <li><strong>Street:</strong> {!! $profile->street or $no_val !!}</li>
                        <li><strong>City:</strong> {!! $profile->city or $no_val !!}</li>
                        <li><strong>State:</strong> {!! $profile->state or $no_val !!}</li>
                        <li><strong>Zip:</strong> {!! $profile->post_code or $no_val !!}</li>
                        <li><strong>Country:</strong> {!! $profile->country or $no_val !!}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <h3 class="text-center">
                <span class="glyphicon glyphicon-earphone"></span>
            </h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul>
                        <li><strong>Phone:</strong> {!! $profile->phone or $no_val !!}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <h3 class="text-center">
                <span class="glyphicon glyphicon-globe"></span>
            </h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul>
                        <li><strong>FaceBook:</strong> {!! $profile->facebook or $no_val !!}</li>
                        <li><strong>Twitter:</strong> {!! $profile->twitter or $no_val !!}</li>
                        <li><strong>Website:</strong> {!! $profile->website or $no_val !!}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script type="text/javascript" src="/js/jquery.circliful.min.js"></script>
    <script type="text/javascript" src="/js/profile.js"></script>
@stop
@extends('layout')

@section('sheets')
    <link rel="stylesheet" type="text/css" href="/css/jquery.circliful.css">
@stop

@section('content')

    @include('partials.profileModal', ['profile' => $profile])

    <div class="jumbotron">
        <div class="row">
            <div class="col-sm-6">
                <h1><span class="glyphicon glyphicon-user text-success"></span> {{ auth()->user()->f_name }} {{ auth()->user()->l_name }}</h1>
                <p><span class="glyphicon glyphicon-envelope"></span> {{ auth()->user()->email }}</p>
                <p><a class="btn btn-primary" href="#myProfileModal" data-toggle="modal" role="button">Edit Profile</a></p>
            </div>
            <div class="col-sm-6">
                <div id="completeness" class="text-center hidden-xs" data-text="{{ $nulls }}%" data-percent="{{ $nulls }}" data-info="Profile Completeness" data-fill="#CFDBC5" data-dimension="225" data-animationstep="2" data-fontsize="42"></div>
            </div>
        </div>
    </div>

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
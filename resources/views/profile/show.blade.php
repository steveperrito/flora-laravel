@extends('layout')

@section('content')

    @include('partials.profileModal', ['profile' => $profile])

    <div class="jumbotron">
        <h1><span class="glyphicon glyphicon-user text-success"></span> {{ auth()->user()->f_name }} {{ auth()->user()->l_name }}</h1>
        <p><span class="glyphicon glyphicon-envelope"></span> {{ auth()->user()->email }}</p>
        <p><a class="btn btn-primary btn-lg" href="#myProfileModal" data-toggle="modal" role="button">Edit Profile</a></p>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <h3 class="text-center">
                <span class="glyphicon glyphicon-map-marker"></span>
            </h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul>
                        <li><strong>Street:</strong> {!! $profile->street or '<span class="glyphicon glyphicon-question-sign"></span>' !!}</li>
                        <li><strong>City:</strong> {!! $profile->city or '<span class="glyphicon glyphicon-question-sign"></span>' !!}</li>
                        <li><strong>State:</strong> {!! $profile->state or '<span class="glyphicon glyphicon-question-sign"></span>' !!}</li>
                        <li><strong>Zip:</strong> {!! $profile->post_code or '<span class="glyphicon glyphicon-question-sign"></span>' !!}</li>
                        <li><strong>Country:</strong> {!! $profile->country or '<span class="glyphicon glyphicon-question-sign"></span>' !!}</li>
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
                        <li><strong>Phone:</strong> {!! $profile->phone or '<span class="glyphicon glyphicon-question-sign"></span>' !!}</li>
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
                        <li><strong>FaceBook:</strong> {!! $profile->facebook or '<span class="glyphicon glyphicon-question-sign"></span>' !!}</li>
                        <li><strong>Twitter:</strong> {!! $profile->twitter or '<span class="glyphicon glyphicon-question-sign"></span>' !!}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
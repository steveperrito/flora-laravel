@extends('layout')

@section('sheets')
    <link rel="stylesheet" href="/css/welcome.css">
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="page-header">
                <h1>Ready to make an observation? <small>Choose an option below...</small></h1>
            </section>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-sm-4 col-sm-offset-2 option-cell">
            <a class="btn btn-success btn-block btn-lg" href="/field" data-toggle="tooltip" data-placement="top" title="You're in the field now">Make Field Observation</a>
        </div>
        <div class="col-sm-4 option-cell">
            <a class="btn btn-success btn-block btn-lg" href="/logged" data-toggle="tooltip" data-placement="top" title="You're entering a past observation">Log Past Observation</a>
        </div>
    </div>
@stop

@section('footer')
    <script type="text/javascript" src="/js/tooltip.js"></script>
@stop
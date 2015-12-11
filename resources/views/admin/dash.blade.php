@extends('layout')

@section('content')
    <section class="page-header">
        <h1><span class="glyphicon glyphicon-dashboard text-success"></span> Dashboard</h1>
    </section>

    <div class="row" id="admin-stats">
        <div class="col-sm-4 text-center">
            <span class="admin-stat" data-stat="100" data-info="Accounts"></span>
        </div>
        <div class="col-sm-4 text-center">
            <span class="admin-stat" data-stat="150" data-info="Observations"></span>
        </div>
        <div class="col-sm-4 text-center">
            <span class="admin-stat" data-stat="89" data-info="Guest Observations"></span>
        </div>
    </div>

    @foreach ($observations as $observation)
        @include('partials.item', ['observation' => $observation])
    @endforeach
@stop

@section('footer')
    <script type="text/javascript" src="/js/countUp.min.js"></script>
    <script type="text/javascript" src="/js/adminStats.js"></script>
    <script type="text/javascript" src="/js/tooltip.js"></script>
    <script type="text/javascript" src="/js/mapScroll.js"></script>
@stop
@extends('layout')

@section('content')
    <section class="page-header">
        <h1><span class="glyphicon glyphicon-dashboard text-success"></span> Dashboard</h1>
    </section>

    <div class="container-fluid">
        <div class="row hidden-xs" id="admin-stats">
            <div class="col-sm-4 text-center">
                <div class="stat-border">
                    <div class="no-flex">
                        <span class="admin-stat" data-stat="{{ $all_users }}" data-info="Accounts"></span><br>
                        <span>Accounts</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="stat-border">
                    <div class="no-flex">
                        <span class="admin-stat" data-stat="{{ $guest_observes }}" data-info="Guest Observations"></span><br>
                        <span>Guest Contributions</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="stat-border">
                    <div class="no-flex">
                        <span class="admin-stat" data-stat="{{ $all_observations }}" data-info="Observations"></span><br>
                        <span>Total Contributions</span>
                    </div>
                </div>
            </div>
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
@extends('layout')

@section('content')
    <section class="page-header">
        <h1><span class="glyphicon glyphicon-leaf text-success"></span> {{ $observation->PlantName }} <small>observation</small></h1>
    </section>

    @include('partials.item', ['observation' => $observation])
@stop

@section('footer')
    <script type="text/javascript" src="/js/tooltip.js"></script>
    <script type="text/javascript" src="/js/mapScroll.js"></script>
@stop
@extends('layout')

@section('content')
    <section class="page-header">
        <h1>Flora Observations</h1>
    </section>
    @foreach ($observations as $observation)
        @include('partials.item', ['observation' => $observation])
    @endforeach
@stop

@section('footer')
    <script type="text/javascript" src="/js/tooltip.js"></script>
    <script type="text/javascript" src="/js/mapScroll.js"></script>
@stop
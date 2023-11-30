@extends('layouts.basic')
<header>
    @yield('navbar')
</header>
<link rel="stylesheet" href="{{ asset('css/basic.css') }}">
@section("content")
<body style="min-height: 800px">
    <div class="time-parent" style="min-height: 720px">
        <h4 class="cs-topper" style="grid-area: 1/2/2/4;">{{$time->user->name}}'s Lap Time</h4>
        <div class="time-right-side">
            <h4 style="grid-area: 2/3/3/4;">{{$time->car->brand}} {{$time->car->model}} ({{$time->car->year}})</h4>
            <h4 style="grid-area: 3/3/4/4;">Time</h4>
            <h4 style="grid-area: 4/3/5/4;"> {{$time["lap_time"]}}</h4>
        </div>
        <img class="time-image" style="width: 100%" src="{{ asset('/img/' . $time->car["image"]) }}">
    </div>
</body>
@endsection

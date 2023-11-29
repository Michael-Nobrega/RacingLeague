@extends('layouts.basic')

<header>
    @yield('navbar')
</header>

<link rel="stylesheet" href="{{ asset('css/basic.css') }}">

@section("content")

<body>
    <div class="main-timer-box">
        <div class="top-timer-box">
            <img class="img-top-rounded-edges" src="{{ asset('/img/' . $time->car["image"]) }}" alt="{{ $time->car["brand"] }} Image">
        </div>
        <div class="bottom-timer-box">
            <h5>Driver: {{$time->user->name}}  ({{$time["user_id"]}})</h5>
            <h6>{{$time->car->brand}} {{$time->car->model}} ({{$time->car->year}})</h6>
            <h5>Time</h5>
            <h5>{{$time["lap_time"]}}</h5>
        </div>
    </div>
</body>
@endsection
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
    <br>
    <div class="time-container">
        <h4 class="time-container-header">{{$time->user->name}}</h4>
        <img class="time-container-left-image" style="width: 100%" src="{{ asset('/img/' . $time->car["image"]) }}">
        <h6 class="car-container-right-text">{{$time->car->brand}} {{$time->car->model}} ({{$time->car->year}})</h6>
        <h5 class="car-container-text">{{$time["lap_time"]}}</h5>

    </div>
</body>
@endsection

<style>
.time-container{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(3, 1fr);
    background-color: rgba(0, 117, 196, 0.90);
    padding:10px;
    margin: 10px auto;
    border: 2px solid black;
    box-shadow: 15px black;
    max-width: 75%;
}
.time-container-header { 
    grid-area: 1 / 1 / 2 / 4;
    text-align: center;
    text-justify: center;
}
.time-container-left-image { 
    grid-area: 2 / 1 / 3 / 2;
}
.car-container-right-text { 
    grid-area: 2 / 2 / 3 / 4;
}
.car-container-text { 
    grid-area: 3 / 1 / 4 / 4; 
}

</style>
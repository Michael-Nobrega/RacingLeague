@extends('layouts.basic')

<header>
    @yield('navbar')
</header>
<link rel="stylesheet" href="{{ asset('css/basic.css') }}">
@section("content")
<h3 class="cs-topper" style="text-align:center">List of lap times</h3>
<br>
<body>
    <div class="time-box-container">
        @foreach ($times as $time)
        <a href="{{ url('/view-time', $time) }}" style="text-decoration: none; color: inherit; display: block;font-weight:bold">
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
        @endforeach
    </div>
</body>
<br>

@endsection

<style>

    .time-box-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; 
        justify-content: center;
    }

    .time-box {
        background-color: #0075c4;
        padding: 10px;
        margin: 10px;
        border: 5px solid black;
        border-radius: 25px;
        max-width: 200px; 
    }

    .img-top-rounded-edges{
        border-radius: 10px 10px 0px 0px;
        max-height: 175px; 
        max-width: 310px
    }

    .main-timer-box{
        background-color: #0075c4;
        max-width: 310px;
        outline-width: thin;
        outline-color: black;
        outline-style: solid;
        border-top-right-radius: 3%; 
        border-top-left-radius: 3%;
    }

    .top-timer-box{
        height: 175px; 
        display: flex; 
        justify-content: center; 
        align-items: center; 
        border-top-right-radius: 1%; 
        border-top-left-radius: 1%;
    }

    .bottom-timer-box{
        min-height: 130px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .car-box {
            display: flex;
            align-items: center;
            max-width: 400px;
            margin: 20px auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .car-text {
            flex: 1;
            padding-right: 20px;
        }

        .car-image {
            max-width: 100px;
            max-height: 100px;
            border-radius: 8px;
        }

    body{margin-top:20px;}

</style>
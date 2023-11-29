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
    <h1>Edit Time</h1>
    <form action="/edit-post/{{$time->id}}" method="POST">
        @csrf
        @method("PUT")
        <select name="user_id">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <select name="car_id">
            @foreach ($cars as $car)
                <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }} ({{ $car->year }})</option>
            @endforeach
        </select>
        <input type="text" name="lap_time" value="{{$time->lap_time}}">
        <button>Save changes</button>
    </form>
</body>
@endsection
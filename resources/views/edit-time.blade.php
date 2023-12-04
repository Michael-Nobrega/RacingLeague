@extends('layouts.basic')

<header>
    @yield('navbar')
</header>

<link rel="stylesheet" href="{{ asset('css/basic.css') }}">

@section("content")
<body>
        <div class="time-parent" style="min-height: 720px">
            <h4 class="cs-topper" style="grid-area: 1/2/2/4;">{{$time->user->name}}'s Lap Time</h4>
            <div class="time-right-side">
                <h4 style="grid-area: 2/3/3/4;">{{$time->car->brand}} {{$time->car->model}} ({{$time->car->year}})</h4>
                <h4 style="grid-area: 3/3/4/4;">Time</h4>
                <h4 style="grid-area: 4/3/5/4;"> {{$time["lap_time"]}}</h4>
            </div>
            <img class="time-image" style="width: 100%" src="{{ asset('/img/' . $time->car["image"]) }}">
        </div>
    <div style="text-align: center;margin-bottom: 10%">
        <h1>Edit Time</h1>
        <form action="/edit-time/{{$time->id}}" method="POST">
            @csrf
            @method("PUT")
            <select name="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $time->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            <select name="car_id">
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }} ({{ $car->year }})</option>
                @endforeach
            </select>
            <input type="time" name="lap_time" value="{{$time->lap_time}}">
            <button class="btn btn-primary text-white">Save changes</button>
        </form>
    </div>
</body>
@endsection
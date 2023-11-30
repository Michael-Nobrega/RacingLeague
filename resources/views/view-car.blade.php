@extends('layouts.basic')

<header>
    @yield('navbar')
</header>

<link rel="stylesheet" href="{{ asset('css/basic.css') }}">

@section("content")

<body>
    <br>
    <h3 class="cs-topper">Brand: {{$car["brand"]}}   -    Model: {{$car["model"]}}    -    Year: {{$car["year"]}}</h3>
    <div style="min-height: 720px; display: flex; align-items: center; justify-content: center;">
        <div class="car-container" >
            <img class="car-container-image" src="{{ asset('/img/' . $car["image"]) }}" alt="{{ $car["brand"] }} Image" style="max-width: 75%;"> 
            <p class="car-container-right-text">{{$car["description"]}}</p>
        </div>
    </div>
</body>
@endsection
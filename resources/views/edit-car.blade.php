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
    <div style="text-align: center;margin-bottom: 10%">
        <h1>Edit Car</h1>
        <br>
        <form action="/edit-car/{{$car->id}}" method="POST">
            @csrf
            @method("PUT")
            <input type="text" name="brand" value="{{$car->brand}}">
            <input type="text" name="model" value="{{$car->model}}">
            <input type="text" name="year" value="{{$car->year}}">
            <input type="text" name="description" value="{{$car->description}}">
            <input type="file" name="image" accept="/img/*">
            <button class="btn btn-primary text-white">Save changes</button>
        </form>
    </div>
</body>
@endsection
@extends('layouts.basic')

<header>
    @yield('navbar')
</header>

<link rel="stylesheet" href="{{ asset('css/basic.css') }}">

@section("content")
<body>
    <div class="car-container">
        <h3 class="car-container-header">Brand: {{$car["brand"]}}   -    Model: {{$car["model"]}}    -    Year: {{$car["year"]}}</h3>
        <img class="car-container-image" src="{{ asset('/img/' . $car["image"]) }}" alt="{{ $car["brand"] }} Image" style="max-width: 75%;"> 
        <p class="car-container-right-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit numquam quisquam quos voluptatem, culpa veniam sequi odio ex nam eius molestiae quaerat inventore delectus, dolorem quae iste, mollitia vitae cumque?</p>
    </div>
    <h1>Edit Car</h1>
    <form action="/edit-car/{{$car->id}}" method="POST">
        @csrf
        @method("PUT")
        <input type="text" name="brand" value="{{$car->brand}}">
        <input type="text" name="model" value="{{$car->model}}">
        <input type="text" name="year" value="{{$car->year}}">
        <input type="file" name="image" accept="/img/*">
        <button>Save changes</button>
    </form>
</body>
@endsection
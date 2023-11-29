@extends('layouts.basic')

<header>
    @yield('navbar')
</header>


<link rel="stylesheet" href="{{ asset('css/basic.css') }}">

@section("content")

<section id="hero-1619">
    <br>
    <h3 class="cs-topper" style="text-align:center">OUR CAR COLLECTION</h3>
    <br>
        @foreach ($cars as $car)
        <div class="car-container">
            <h3 class="car-container-header">Brand: {{$car["brand"]}}   -    Model: {{$car["model"]}}    -    Year: {{$car["year"]}}</h3>
            <img class="car-container-image" src="{{ asset('/img/' . $car["image"]) }}" alt="{{ $car["brand"] }} Image" style="max-width: 75%;"> 
            <p class="car-container-right-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit numquam quisquam quos voluptatem, culpa veniam sequi odio ex nam eius molestiae quaerat inventore delectus, dolorem quae iste, mollitia vitae cumque?</p>
        </div>
        @endforeach
    <br>
    <picture class="cs-background">
        <source media="(max-width: 600px)" srcset="https://robbreport.com/wp-content/uploads/2023/03/1-17.jpg?w=1000">
        <source media="(min-width: 601px)" srcset="https://robbreport.com/wp-content/uploads/2023/03/1-17.jpg?w=1000">
        <img decoding="async" src="https://robbreport.com/wp-content/uploads/2023/03/1-17.jpg?w=1000" alt="meeting" width="2250" height="1500" aria-hidden="true">
    </picture>
</section>                      
@endsection

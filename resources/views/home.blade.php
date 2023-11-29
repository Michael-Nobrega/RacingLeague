@extends('layouts.basic')
<header>
    @yield('navbar')
</header>
@section("content")
<link rel="stylesheet" href="{{ asset('css/main-page.css') }}">
<link rel="stylesheet" href="{{ asset('css/basic.css') }}">

<section id="hero-1618">
    <div class="cs-container">
        <div class="cs-content">
            <span class="cs-topper">
                <svg class="cs-chevron" width="49" height="15" viewBox="0 0 49 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                </svg>
                << A CHALLENGING CIRCUIT >>
            </span>
            <br>
            <h1 class="cs-title">Elevate Your Performance With Our Leading-Edge Vehicles</h1>
            <a href="" class="cs-button-solid">Request Appointment</a>
        </div>
        <img src=img/other/TTTstoke.png class="center" style="width: 400px">
        <ul class="cs-card-group">
            <li class="cs-item">
                <img class="cs-icon" loading="lazy" decoding="async" src="/img/icons/steering-wheel.png" alt="icon" width="48" height="48">
                <h3 class="cs-h3">Pro-Instructors</h3>
                <p class="cs-item-text">
                    Qualified instructors with backgrounds in motorsport.
                </p>
            </li>
            <li class="cs-item">
                <img class="cs-icon" loading="lazy" decoding="async" src="/img/icons/car-key.png" alt="icon" width="48" height="48">
                <h3 class="cs-h3">Drive it like it's yours</h3>
                <p class="cs-item-text">
                  Get ready to push the car to the max. It's a racetrack after all - choose one of our cars and leave speed limits to the road
                </p>
            </li>
            <li class="cs-item">
                <img class="cs-icon" loading="lazy" decoding="async" src="/img/icons/hat.png" alt="icon" width="48" height="48">
                <h3 class="cs-h3">Everyone's Welcome</h3>
                <p class="cs-item-text">
                    Days designed to suit all: regulars to first timers.
                </p>
            </li>
        </ul>
        <ul class="cs-card-group">
          <li class="cs-item">
              <img class="cs-icon" loading="lazy" decoding="async" src="/img/icons/camera.png" alt="icon" width="48" height="48">
              <h3 class="cs-h3">Say Cheese!</h3>
              <p class="cs-item-text">
                  We offer you a USB stick with footage of your day to take away
              </p>
          </li>
          <li class="cs-item">
            <img class="cs-icon" loading="lazy" decoding="async" src="/img/icons/seat-belt.png" alt="icon" width="48" height="48">
            <h3 class="cs-h3">Safety First</h3>
            <p class="cs-item-text">
               We only use regularly maintained vehicles
            </p>
        </li>
          <li class="cs-item">
              <img class="cs-icon" loading="lazy" decoding="async" src="/img/icons/notepad.png" alt="icon" width="48" height="48">
              <h3 class="cs-h3">No Hidden Costs</h3>
              <p class="cs-item-text">
                Price includes Accident Damage Indemnity
              </p>
          </li>
      </ul>
    </div>
    <br>
    <div id="wrapper-1639">
      <section>
          <div class="cs-container">
              <div class="cs-content">
                <span class="cs-topper">
                  <br>
                  << Our Track >>
                </span>
                <br>
                  <h2 class="cs-title">Stitch Group for Process Safety Training</h2>
                  <img class="center" src="{{ asset('img/other/race-track.png') }}" >
                <p class="centered-box" style="margin-left: 45%">
                    The AIA circuit offers 32 different track configurations, with perimeters from 3,465m (shortest) to 4,684m and is approved by the FIA ​​and FIM to host car and motorcycle competitions at the highest level.
                    The various layouts allow users to choose between faster, more challenging versions and slower, more technical versions.
                  
                    Given the variety of track designs, the FIA ​​Slow Fast is considered the standard version.
                </p>
                </div>
              <div>
                <br>
              </div>
          </div>
      </section>
    </div>
  <div>

  <picture class="cs-background">
    <source media="(max-width: 600px)" srcset="https://hips.hearstapps.com/hmg-prod/images/racing-yellow-911-gt3rs-weissach-package-006-dsc06237-1677506351.jpg">
    <source media="(min-width: 601px)" srcset="https://hips.hearstapps.com/hmg-prod/images/racing-yellow-911-gt3rs-weissach-package-006-dsc06237-1677506351.jpg">
    <img decoding="async" src="https://hips.hearstapps.com/hmg-prod/images/racing-yellow-911-gt3rs-weissach-package-006-dsc06237-1677506351.jpg" alt="meeting" width="2250" height="1500" aria-hidden="true">
  </picture>

  @if (rand(0, 1))
  @php
  $car = $cars[rand(0, count($cars) - 1)];
  @endphp
  <a href="{{ url('/view-car', $car) }}" style="text-decoration: none; color: inherit; display: block;">
  <div class="car-container">
      <h3 class="car-container-header">Brand: {{ $car["brand"] }} - Model: {{ $car["model"] }} - Year: {{ $car["year"] }}</h3>
      <img class="car-container-image" src="{{ asset('/img/' . $car["image"]) }}" alt="{{ $car["brand"] }} Image" style="max-width: 75%;"> 
      <p class="car-container-right-text">{{$car["description"]}}</p>
  </div>
</div>

@else

<div class="time-box-container">
  @php
  $time = $times[rand(0, count($times) - 1)];
  @endphp
      <a href="{{ url('/view-time', $time) }}" style="text-decoration: none; color: inherit; display: block;">
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
</div>
@endif
<br>
</section>

                
@endsection


<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 100%;
  margin-left: 35%
}

.centered-box {
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    width: 100%;
    box-sizing: border-box;
}
</style>
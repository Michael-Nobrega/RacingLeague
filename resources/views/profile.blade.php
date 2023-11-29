@extends('layouts.basic')

<header>
    @yield('navbar')
</header>

<link rel="stylesheet" href="{{ asset('css/basic.css') }}">

@section("content")
<body style="color: white; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">
    @auth
        <p>LOGED IN!</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>
        </form>

        <div style="padding:10px; margin:10px; border: 5px solid black">
            <div>
                @if(auth()->user()->role === 'admin')
                <h2>Add a new car</h2>
                <form action="/add-car" method="POST">
                    @csrf
                    <input type="text" name="brand" placeholder="brand">
                    <input type="text" name="model" placeholder="model">
                    <input type="text" name="year" placeholder="year">
                    <input type="file" name="image" accept="/img/*">
                    <button>Add Time</button>
                </form>
            @endif

            <h2 style="padding:10px; margin:10px ">Add a new time</h2>
            <form action="/add-car" method="POST">
                @csrf
                <select name="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->role == 'user' ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                <select name="car_id">
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }} ({{ $car->year }})</option>
                    @endforeach
                </select>
                <input type="text" name="lap_time" placeholder="Lap Time - HH:MM:SS">
                <button>Add Time</button>
            </form>
            </div>
        </div>

        <!-- Resultados dos Times -->

        <h1 style="text-align: center">All Lap Times</h1>
        <br>
        <div class="time-box-container">
            @foreach ($times as $time)
                <div class="main-timer-box">
                    <div class="top-timer-box">
                        <img class="img-top-rounded-edges" src="{{ asset('/img/' . $time->car["image"]) }}" alt="{{ $time->car["brand"] }} Image">
                    </div>
                    <div class="bottom-timer-box">
                        <h5>Driver: {{$time->user->name}}  ({{$time["user_id"]}})</h5>
                        <h6>{{$time->car->brand}} {{$time->car->model}} ({{$time->car->year}})</h6>
                        <h5>Time</h5>
                        <h5>{{$time["lap_time"]}}</h5>
                        <!--<a href="/edit-time/{{$time->id}}">Edit</a>-->
                        @if(auth()->user()->role === 'admin' || auth()->user()->id !== $time["user_id"])
                            <div style="display: flex; gap: 10px;">
                                <form action="/edit-time/{{$time->id}}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                </form>
                                <form action="/delete-time/{{$time->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        <br>
        <h1 style="text-align: center">All Lap Times</h1>
        <br>
        @if(auth()->user()->role === 'admin')
            @foreach ($cars as $car)
            <div class="car-container">
                <h3 class="car-container-header">Brand: {{$car["brand"]}}   -    Model: {{$car["model"]}}    -    Year: {{$car["year"]}}</h3>
                <img class="car-container-image" src="{{ asset('/img/' . $car["image"]) }}" alt="{{ $car["brand"] }} Image" style="max-width: 75%;"> 
                <p class="car-container-right-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit numquam quisquam quos voluptatem, culpa veniam sequi odio ex nam eius molestiae quaerat inventore delectus, dolorem quae iste, mollitia vitae cumque?</p>
            </div>
                @if(auth()->user()->role === 'admin' || auth()->user()->id !== $time["user_id"])
                <div class="car-container-right-text">
                    <form action="/edit-car/{{$car->id}}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                    </form>
                    <form action="/delete-car/{{$car->id}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            @endif
            @endforeach
        </div>
        @endif
        
    @else
    <div style="border: 3px solid black">
        <div id="registerForm" style="display: none;">
            <h2>Register</h2>
            <form action="/registerUser" method="POST">
                @csrf
                <input type="text" name="name" placeholder="name">
                <input type="text" name="email" placeholder="email">
                <input type="password" name="password" placeholder="password">
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="#" onclick="toggleForm()">Log in</a></p>
        </div>
        <div id="loginForm">
            <h2>Log In</h2>
            <form action="/loginUser" method="POST">
                @csrf
                <input type="text" name="loginName" placeholder="name">
                <input type="password" name="loginPassword" placeholder="password">
                <button type="submit">Log In</button>
            </form>
            <p>Don't have an account? <a href="#" onclick="toggleForm()">Register</a></p>
        </div>
    </div>
    @endauth

</body>
@endsection
<script>
    function toggleForm() {
        const registerForm = document.getElementById('registerForm');
        const loginForm = document.getElementById('loginForm');

        registerForm.style.display = registerForm.style.display === 'none' ? 'block' : 'none';
        loginForm.style.display = loginForm.style.display === 'none' ? 'block' : 'none';
    }
</script>
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
        min-height: 160px;
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
</html>
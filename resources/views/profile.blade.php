@extends('layouts.basic')

<header>
    @yield('navbar')
</header>

<link rel="stylesheet" href="{{ asset('css/basic.css') }}">
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

@section("content")
<body style="color: white; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">
    @auth
    @if(session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
        <div style="padding:10px; margin:10px; border: 5px solid black">
            <div>
                @if(auth()->user()->role === 'admin')
                <h2>Add a new car</h2>
                <form action="/add-car" method="POST">
                    @csrf
                    <input type="text" name="brand" placeholder="brand">
                    <input type="text" name="model" placeholder="model">
                    <input type="text" name="year" placeholder="year">
                    <input type="text" name="description" placeholder="description">
                    <input type="file" name="image" accept="/img/*">
                    <button>Add Time</button>
                </form>

                <br>

                <h2>Chnage a User's Permissions</h2>
                <form action="/updateRole" method="POST">
                  @csrf
                  @method("PUT")
                  <select name="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->role == 'user' ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                  </select>
                  <select name="role">
                      <option value="user" {{ auth()->user()->role === 'user' ? 'selected' : '' }}>User</option>
                      <option value="worker" {{ auth()->user()->role === 'worker' ? 'selected' : '' }}>Worker</option>
                      <option value="admin" {{ auth()->user()->role === 'admin' ? 'selected' : '' }}>Admin</option>
                  </select>
                  <button type="submit">Update Role</button>
              </form>
            @endif

            <h2 style="padding:10px; margin:10px ">Add a new time</h2>
            <form action="/add-time" method="POST">
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
                        @if(auth()->user()->role === 'admin' || auth()->user()->id === $time["user_id"] || auth()->user()->role === 'worker')
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
        <br>
        @if(auth()->user()->role === 'admin')
        <h1 style="text-align: center">All Cars</h1>
            @foreach ($cars as $car)
            <div class="car-container">
                <h3 class="car-container-header">Brand: {{$car["brand"]}}   -    Model: {{$car["model"]}}    -    Year: {{$car["year"]}}</h3>
                <img class="car-container-image" src="{{ asset('/img/' . $car["image"]) }}" alt="{{ $car["brand"] }} Image" style="max-width: 75%;"> 
                <p class="car-container-right-text">{{$car["description"]}}</p>
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
            <div class="login-wrapper">
                <form action="/registerUser" method="POST" class="form">
                    @csrf
                  <h2>Sign Up</h2>
                  <div class="input-group">
                    <input type="text" name="name" id="loginUser" required />
                    <label for="loginUser">Name</label>
                  </div>
                  <div class="input-group">
                    <input type="email" name="email" id="loginUser" required/>
                    <label for="loginEmail">email</label>
                  </div>
                  <div class="input-group">
                    <input type="password" name="password" id="loginPassword" required/>
                    <label for="loginPassword">Password</label>
                  </div>
                  <input type="submit" value="Sign In" class="submit-btn" />
                  <p>Already have an account?<a href="#" onclick="toggleForm()">Sign Up</a></p>
                </form>
              </div>
        </div>
        <div id="loginForm">
            <div class="login-wrapper">
                <form action="/loginUser" method="POST" class="form">
                    @csrf
                  <h2>Login</h2>
                  <div class="input-group">
                    <input type="text" name="loginName" id="loginUser" required />
                    <label for="loginUser">User Name</label>
                  </div>
                  <div class="input-group">
                    <input type="password" name="loginPassword" id="loginPassword" required/>
                    <label for="loginPassword">Password</label>
                  </div>
                  <input type="submit" value="Login" class="submit-btn" />
                  <p>Don't have an account?<a href="#" onclick="toggleForm()">Register</a></p>
                </form>
              </div>
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
</html>
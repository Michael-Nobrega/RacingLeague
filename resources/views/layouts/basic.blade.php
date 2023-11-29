<!DOCTYPE html>
<html lang="en" id="grad">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RacingLeague')</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body id="grad">
    <header>
        @section('navbar')
            
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
            <div class="container-fluid">
              <img src=img/other/TTTstoke.png style="width: 50px">
              <a class="navbar-brand" href="{{ url('/') }}">Time Trial Turf</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto " >
                  <li class="nav-item" style="margin-top:5px">
                    <a class="nav-link mx-2 active" aria-current="page"href="{{ url('/') }}">Home</a>
                  </li>
                  <li class="nav-item" style="margin-top:5px">
                    <a class="nav-link mx-2" href="{{ url('cars') }}">Cars</a>
                  </li>
                  <li class="nav-item" style="margin-top:5px">
                    <a class="nav-link mx-2" href="{{ url('times') }}">Timers</a>
                  </li>
                  <li class="nav-item" style="margin-top:5px">
                    <a class="nav-link mx-2" href="{{ url('/contacts') }}">Contacts</a>
                  </li>
                  <li class="nav-item" style="margin-top:5px">
                    <a class="nav-link mx-2" href="{{ url('/search') }}">Search</a>
                  </li>
                  <li class="nav-item dropdown" style="margin-top:5px">
                    @auth
                    <div class="dropdown">
                        <a class="nav-link mx-2 dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/img/icons/loginIcon.png" style="width:25px;height:25px;">
                            {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                          <a class="nav-link mx-2" href="{{ url('/profile') }}">Profile</a>
                          <form action="/logout" method="POST">
                              @csrf
                              <button class="dropdown-item" type="submit">Log out</button>
                          </form>
                        </div>
                    </div>
                    @endauth
                    @guest
                    <div class="d-flex align-items-center">
                      <img src="/img/icons/loginIcon.png" style="width:25px;height:25px;margin-left:15px">
                      <a class="nav-link mx-2" href="{{ url('/profile') }}">Login/Register</a>
                    </div>
                    @endguest
                </ul>
              </div>
            </div>
            </nav>
        @show
    </header>

    <main>
        @yield('content')
    </main>

    <footer style="margin-top:10px">
      <section class="">
        <footer class="text-center text-white" style="background-color: #0a4275;  position: sticky; bottom: 0;">
          <div class="container p-4 pb-0">
            <section class="">
              <p class="d-flex justify-content-center align-items-center">
                <span class="me-3">Register for free</span>
                <a class="btn btn-primary text-white" href="{{ url('/profile') }}">Sign Up!</a>
              </p>
            </section>
          </div>
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://www.flaticon.com/authors/icongeek26">Icons made by: Icongeek26</a>
          </div>
        </footer>
      </section>
    </footer>

</body>

</html>

<style>

    .text {
        color: white; 
        text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;
    }
    a {
      font-size:14px;
      font-weight:700;
      font-family: sans-serif;
    }
    .superNav {
      font-size:13px;
    }
    .form-control {
      outline:none !important;
      box-shadow: none !important;
    }
    @media screen and (max-width:540px){
      .centerOnMobile {
        text-align:center
      }
    }
    #grad {
            background-image: linear-gradient(#2d6bce, #65c7f7, #9cecfb);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
</style>

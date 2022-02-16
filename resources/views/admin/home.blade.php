<!doctype html>
<html lang="en">
  <head>
    <title>Evalution | @yield('title')</title>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="path" content="{{ url('/') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('public/assets/js/datatable.min.js')}}" ></script>
    <script src="{{asset('public/assets/js/swal.js')}}"></script>
    <script src="{{asset('public/assets/css/swal.css')}}"></script>


  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light bg-info shadow-sm">
      <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
              {{ config('app.name', 'Laravel') }}
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mx-auto">
                <nav class="nav justify-content-center">
                  {{-- <a class="nav-link bg-dark" href="{{route('home')}}">Home</a> --}}
                  <li class="nav-item bg-primary p-2 hover-danger"><a class="nav-link" href="{{route('product.index')}}">Product List</a></li>
                  <li class="nav-item bg-primary p-2"><a class="nav-link" href="{{ route('product.create') }}">Product Create</a></li>
                </nav>
              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  @guest
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }}
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
              </ul>
          </div>
      </div>
  </nav>
   
      @yield('content')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script> --}}
    {{-- <script src="{{asset('public/assets/js/jquery.js')}}" ></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script> --}}
    @yield('js')
    <script>
      var url  = $('meta[name = path]').attr("content");
      var csrf    = $('mata[name = csrf-token]').attr("content");
    </script>
  </body>
</html>
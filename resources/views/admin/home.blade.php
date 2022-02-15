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
   <div class="container">
     <div class="row p-3">
       <div class="col-md-12 bg-info">
        <nav class="nav justify-content-center">
          <a class="nav-link bg-dark" href="{{route('home')}}">Home</a>
          <a class="nav-link bg-dark" href="{{route('product.index')}}">Product List</a>
          <a class="nav-link bg-dark" href="{{ route('product.create') }}">Product Create</a>
        </nav>
       </div>
     </div>
   </div>
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
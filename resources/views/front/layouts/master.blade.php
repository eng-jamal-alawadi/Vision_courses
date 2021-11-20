<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('front-asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front-asset/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-asset/css/style.css') }}">

    <title>Vision Courses</title>
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="{{route('homepage')}}">Vision Courses</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('contact')}}">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    @yield('content')

    <footer class="py-4 text-center bg-dark text-white">
      <p class="m-0">All Copyright reserved to <a href="https://github.com/eng-jamal-alawadi">Jamal A. Alawadi</a> <i class="far fa-copyright"></i> {{date('Y')}}</p>
    </footer>

    <script src="{{ asset('front-asset/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front-asset/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('front-asset/js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @yield('script')
  </body>
</html>

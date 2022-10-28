<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Media Admin</title>

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    .form-control,.form-select {
        outline:0px !important;
        -webkit-appearance:none;
        box-shadow: none !important;
    }

    .form-control:focus,.form-select:focus {
        border-color: #332D2D;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light justify-content-between px-3">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button  class="btn btn-danger">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </button>
        </form>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="#" class="brand-link text-decoration-none">

        <div class="brand-text font-weight-light ps-3">My Media Admin</div>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="fas fa-user-circle"></i>
                <p>
                  My Profile
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('admin#list') }}" class="nav-link">
                <i class="fas fa-users"></i>
                <p>
                  Admin List
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('admin#category') }}" class="nav-link">
                <i class="fas fa-list"></i>
                <p>
                  Category
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('admin#post') }}" class="nav-link">
                <i class="fas fa-file"></i>
                <p>
                  Post
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('admin#trendPost') }}" class="nav-link">
                <i class="fas fa-book"></i>
                <p>
                  Trend Post
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="row mt-4">
            @yield('content')
          </div>
        </div>
    </div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
  </div>
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
  {{-- <script src="{{ asset('dist/js/demo.js') }}"></script> --}}
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  {{-- jquery link --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
  @yield('jsCode')
</body>

</html>

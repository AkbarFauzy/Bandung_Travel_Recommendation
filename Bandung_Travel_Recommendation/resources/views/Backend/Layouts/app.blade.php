<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/global_admin.css')}}">
    @yield('assets_css')
  </head>
  <body style="min-height:100vh">
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav d-none d-md-block d-lg-none">
              <li class="nav-item">
                <a class="
                    nav-toggler nav-link
                    waves-effect waves-light
                    text-white
                  " href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto d-flex align-items-center">
              <li>
                <a class="profile-pic" href="#">
                  <img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><span class="text-white font-medium">Steave</span></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>


    <img src="{{asset('img/bg/Group 38.png')}}" alt="" style="position:absolute;right:0;z-index:-1">
    <div id="mySidebar" class="sidebar">
      <a class="text-center p-0" style="margin-bottom:50px;margin-top: 30px;border:none;"><h1 style="color:#edf1f5">LOGO</h1></a>
      <ul style="padding-left:0px">
        <li><a href=" {{route('admin.dashboard')}}" class="{{ (request()->is('admin')) ? 'active' : '' }}"><i class="bi bi-house"></i>&nbsp;&nbsp;&nbsp;Dashboard</a></li>
        <li><a href=" {{route('admin.destination')}}" class="{{ (request()->is('admin/destination*')) ? 'active' : '' }}">Destination</a></li>
        <li><a href=" {{route('admin.destinationtype')}}" class="{{ (request()->is('admin/type*')) ? 'active' : '' }}">Destination Type</a></li>
        <li><a href=" {{route('admin.users')}}" class="{{ (request()->is('admin/users*')) ? 'active' : '' }}">Users</a></li>

      </ul>
      <button href="#" class="logout-btn">Logout&nbsp;&nbsp;&nbsp;<i class="bi bi-door-closed"></i></button>
    </div>

    <div id="main">
      <button class="sidebar-toggle" onclick="closeNav()" id="sidebar-btn">&#9776;</button>
      <div class="main-title">
        <p>Home</p>
      </div>
      <div class="main-container">
        @yield('content')
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/global_admin.js')}}" charset="utf-8"></script>
    @yield('assets_js')
  </body>
</html>

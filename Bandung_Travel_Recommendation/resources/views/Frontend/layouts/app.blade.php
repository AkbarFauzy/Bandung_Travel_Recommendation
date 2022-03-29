<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    @yield('title')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    @yield('assets_css')
  </head>

<body>
  <!-- ====================================================== MODAL ====================================================== -->
  <div class="modal fade" id="SignModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <section class="text-center text-lg-start">
           <style>
             .cascading-right {
               margin-right: -50px;
             }
             @media (max-width: 991.98px) {
               .cascading-right {
                 margin-right: 0;
               }
             }
           </style>

           <!-- Jumbotron -->
           <div class="container py-4">
             <div class="row g-0 align-items-center">
               <div class="col-md-6 mb-5 mb-lg-0">
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="loginTab" role="tabpanel" aria-labelledby="login-tab">
                      <div class="card cascading-right" style=" background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(30px);">
                       <div class="card-body p-5 shadow-5 text-center">
                         <h1 class="fw-bold mb-5">Login</h1>
                         <p>Please login to your account</p>
                         <form action="/login" method="POST">
                           <div class="form-floating mb-3">
                             <input type="email" class="form-control" id="loginEmail" placeholder="name@example.com">
                             <label for="floatingInput">Email address</label>
                           </div>
                           <div class="form-floating mb-4">
                             <input type="password" class="form-control" id="loginPassword" placeholder="Password">
                             <label for="floatingPassword">Password</label>
                          </div>
                           <!-- Submit button -->
                            <div class="form-floating mb-3">
                              <button type="submit" class="btn btn-primary btn-block w-100" style="padding:10px 30px"> Login </button>
                            </div>
                          </form>
                          <div class="d-flex align-items-center justify-content-center pb-4">
                           <p class="mb-0 me-2">Don't have an account?</p>
                           <div class="nav">
                             <a class="btn btn-outline-primary" id="register-tab" data-bs-toggle="tab" data-bs-target="#registerTab" type="button" role="tab">Create new</a>
                           </div>
                         </div>
                        </div>
                        </div>
                      </div>

                      <div class="tab-pane fade" id="registerTab" role="tabpanel" aria-labelledby="register-tab">
                       <div class="card cascading-right" style=" background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(30px);">
                        <div class="card-body p-5 shadow-5 text-center">
                          <h1 class="fw-bold mb-5">Register</h1>
                          <form action="/register" method="POST">
                            <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="registerFullName" placeholder="Full Name">
                              <label for="floatingInput">Full Name</label>
                            </div>
                            <div class="form-floating mb-3">
                              <input type="email" class="form-control" id="registerEmail" placeholder="name@example.com">
                              <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                              <input type="password" class="form-control" id="registerPassword" placeholder="Password">
                              <label for="floatingPassword">Password</label>
                           </div>
                            <!-- Submit button -->
                             <div class="form-floating mb-3">
                               <button type="submit" class="btn btn-primary btn-block w-100" style="padding:10px 30px"> Register</button>
                             </div>
                           </form>
                           <div class="d-flex align-items-center justify-content-center pb-4">
                            <p class="mb-0 me-2">Already have an account?</p>
                             <div class="nav">
                               <a class="btn btn-outline-primary" id="login-tab" data-bs-toggle="tab" data-bs-target="#loginTab" type="button" role="tab">Log in</a>
                             </div>
                           </div>
                           </div>
                         </div>
                       </div>

                  </div>

                </div>
               <div class="col-md-6 mb-5 mb-lg-0">
                 <img
                      src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg"
                      class="w-100 rounded-4 shadow-4"
                      alt=""
                      />
               </div>
             </div>
           </div>
           <!-- Jumbotron -->
          </section>
          <!-- Section: Design Block -->

        </div>
      </div>
    </div>
  </div>

  <!-- ================================================= NAVBAR ================================================== -->
      <nav class="navbar navbar-expand-lg shadow fixed-top" id="navbar">
        <div class="container">
          <a class="navbar-brand text-white" href="#">Start Bootstrap</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#SignModal">Login</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#SignModal">Register</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
@yield('content')

<section class="">
  <footer class="text-center text-white" style="background-color: #141414;">
    <div class="container p-4 pb-0">
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3">Register for free</span>
          <button type="button" class="btn btn-outline-light btn-rounded">
            Sign up!
          </button>
        </p>
      </section>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">Bandung Travel Recommendation</a>
    </div>
  </footer>
</section>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="{{asset('js/global.js')}}"> </script>
  @yield('assets_js')
  </script>
  </body>
</html>

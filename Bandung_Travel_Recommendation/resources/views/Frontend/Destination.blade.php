@extends('Frontend.layouts.app')
@section('assets_css')
<link rel="stylesheet" href="{{asset('css/destination.css')}}">
<link rel="stylesheet" href="{{asset('css/animation.css')}}">
@endsection
@section('content')
<div class="row justify-content-start">
    <div class="col-3">
        <div class="side_category">
            <div id="progression" class="card mb-4">
                <div class="card-header text-center">Activity</div>
                <div class="card-body">
                    <div class="row">
                        <div id="side-step" class="col-md-4">
                            <div id="stepper4" class="bs-stepper vertical linear">
                                <div class="bs-stepper-header" role="tablist">
                                    <div id="stepper1" class="step active" data-target="#test-vl-1">
                                        <button type="button" class="step-trigger" role="tab" id="stepper4trigger1" aria-controls="test-vl-1" aria-selected="true">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Pilih Destinasi</span>
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div id="stepper2" class="step" data-target="#test-vl-2">
                                        <button type="button" class="step-trigger" role="tab" id="stepper4trigger2" aria-controls="test-vl-2" aria-selected="true">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Checkout</span>
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div id="stepper3" class="step" data-target="#test-vl-3">
                                        <button type="button" class="step-trigger" role="tab" id="stepper4trigger3" aria-controls="test-vl-3" aria-selected="true">
                                            <span class="bs-stepper-circle">3</span>
                                            <span class="bs-stepper-label">Berhasil</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div id="list-dest" class="container">
                                @for($i =0; $i < 3;$i++) 
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <h5>Tafso Barn</h5>
                                            <button type="button" class="btn-close" aria-label="Close"></button>
                                        </li>
                                    </ul>
                                    @endfor
                            </div>
                            <div id="button-checkout">
                                <div class="btn_view">
                                    <a id="next-btn" onclick="show_hide();" href="#" class="btn btn-primary">Next</a>
                                    <a id="check-btn" onclick="show_hide();" href="#" class="btn btn-primary" style="display: none;">Checkout</a>
                                    <a id="save-btn" onclick="show_hide();" href="#" class="btn btn-primary" style="display: none;">Save</a>
                                    <p id="msg-success" href="#" style="color: green; display: none; text-decoration : none;">Berhasil disimpan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-9">
        <section id="section_box">
            <div id="dest-selection" class="container" style="position: relative; bottom: 20px;">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Search Result</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="container-fluid">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-1">
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Kategori
                            </button>
                            <ul class="dropdown-menu">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Alam
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Taman Hiburan
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Sejarah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Alam
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Taman Hiburan
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Sejarah
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sort By
                            </button>
                            <ul class="dropdown-menu">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                A-Z
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Best Rating
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Favorite
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Random
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Random
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @for($i =0; $i < 7;$i++) 
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img class="image_src" src="{{asset('img/tafso-barn.jpg')}}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <h4 class="card-title">Tafso Barn</h4>
                                                    <p class="card-text">Alamat : Jl. Baru Laksana No.75, Pagerwangi, Kec. Lembang, Kabupaten Bandung Barat, Jawa Barat 40391</p>
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                    <div id="button-dest" class="row">
                                                        <div class="col-md-11 btn_view">
                                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-dest">View More</a>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" class="btn-close" style="position: relative; left: 27px; bottom: 10px;" aria-label="Close"></button>
                                                    <div class="col-md-1 btn_view" style="padding-top:150px">
                                                        <a href="#" class="btn btn-primary">+</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    @endfor
                </div>
        <!-- ================================================= Modal ================================================== -->
                <div class="modal fade" id="modal-dest" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content" style="border-radius: 10px;">
                            <div class="modal-body">
                                <section>
                                    <div class="container py-4">
                                        <div class="row">
                                            <h3 class="modal-title" id="modal-title" style="position: relative; bottom:10px;">Tafso Barn</h3>
                                            <a href="#" style="text-decoration: none; color:black;">Alamat : Jl. Baru Laksana No.75, Pagerwangi, Kec. Lembang,Kabupaten Bandung Barat, Jawa Barat 40391</a>
                                            <a href="#" style="text-decoration: none; position:relative; top: 20px;"><small class="text-muted">Wisata Alam</small></a>
                                        </div>
                                        <hr style="width:100%; position:relative; top:13px">
                                    </div>
                                    <div id="container-img" class="container py-4" style="position:relative; bottom:25px;">
                                        <div class="row">
                                            <div id="img-modal">
                                                <img src="{{asset('img/1-min.jpg')}}" class="d-block w-100" style="border-radius: 10px;">
                                            </div>
                                            
                                            <!-- <div id="carousel-dest" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#carousel-dest" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#carousel-dest" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#carousel-dest" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                </div>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active" data-bs-interval="10000">
                                                        <img src="{{asset('img/1-min.jpg')}}" class="d-block w-100">
                                                        <div class="carousel-caption d-none d-md-block">
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item" data-bs-interval="2000">
                                                        <img src="{{asset('img/dest-5.jpg')}}" class="d-block w-100">
                                                        <div class="carousel-caption d-none d-md-block">
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="{{asset('img/dest-6.jpg')}}" class="d-block w-100">
                                                        <div class="carousel-caption d-none d-md-block">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->

                                            <!-- <div class="col-md-3">
                                                <div class="row">
                                                    @for($i =0; $i < 3;$i++) 
                                                        <div id="carousel-dest-1" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active" data-bs-interval="10000">
                                                                    <img src="{{asset('img/dest-5.jpg')}}" class="d-block w-100">
                                                                </div>
                                                                <div class="carousel-item" data-bs-interval="2000">
                                                                    <img src="{{asset('img/dest-6.jpg')}}" class="d-block w-100">
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img src="{{asset('img/1-min.jpg')}}" class="d-block w-100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p></p>
                                                    @endfor
                                                </div>
                                            </div> -->
                                        </div>
                                        <hr style="width:100%; position:relative; top:20px">
                                    </div>
                                    <div id="container-info" class="container py-4" style="position:relative; bottom:25px;">
                                        <div class="row">
                                            <div class="col-md-3" style="border-right: 0.5px solid #d3d3d3;">
                                                <div style="padding-left: 50px; padding-top: 8vh;">
                                                    <span style="position: relative; bottom:10px;">
                                                        <img src="{{asset('img/star.png')}}" id="star-img-info"> <a style="position: relative; left:5px; top:4px; font-size:20px;">4.5 Rating</a>
                                                    </span> 
                                                    <p class="card-text" style="position: relative;left: 35px; bottom: 0px"><small class="text-muted">(2049 reviews)</small></p>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div style="padding-left: 10px;">
                                                    <h3>Description</h3>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, 
                                                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker 
                                                    including versions of Lorem Ipsum.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container py-4">
                                        <div class="row">
                                        <hr style="width:100%; position:relative; bottom:10px">
                                            <div class="tab-content" style="text-align-last:justify;">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<nav aria-label="Page-navigation">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>


<script>
    function show_hide() {
        var next = document.getElementById("next-btn");
        var check = document.getElementById("check-btn");
        var save = document.getElementById("save-btn");
        var msg = document.getElementById("msg-success")
        var active2 = document.getElementById("stepper2");
        var active3 = document.getElementById("stepper3");
        if (save.style.display === "none") {
            if (check.style.display === "none") {
                check.style.display = "inline-block";
                next.style.display = "none"
                active2.classList.add("active");
            } else {
                save.style.display = "inline-block"
                check.style.display = "none"
                active3.classList.add("active");
            }
        } else {
            msg.style.display = "inline-block"
            save.style.display = "none"
        }

    }
</script>

@endsection
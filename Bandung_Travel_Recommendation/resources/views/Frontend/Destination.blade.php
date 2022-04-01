@extends('Frontend.layouts.app')
@section('assets_css')
<link rel="stylesheet" href="{{asset('css/destination.css')}}">
<link rel="stylesheet" href="{{asset('css/animation.css')}}">
@endsection
@section('content')


<div class="row justify-content-start">
    <div id="dest-hist">
        <div class="container">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('img/dest-4.jpg')}}" class="d-block w-100">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Visit Again</h5>
                            <p>Lembang Park</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('img/dest-4.jpg')}}" class="d-block w-100">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Visit Again</h5>
                            <p>Tafso Barn</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('img/dest-4.jpg')}}" class="d-block w-100">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Visit Again</h5>
                            <p>Trans Studio Bandung</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
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
                                    <div class="step active" data-target="#test-vl-1">
                                        <button type="button" class="step-trigger" role="tab" id="stepper4trigger1" aria-controls="test-vl-1" aria-selected="true">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Pilih Destinasi</span>
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-vl-2">
                                        <button type="button" class="step-trigger" role="tab" id="stepper4trigger2" aria-controls="test-vl-2" aria-selected="false" disabled="disabled">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Checkout</span>
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-vl-3">
                                        <button type="button" class="step-trigger" role="tab" id="stepper4trigger3" aria-controls="test-vl-3" aria-selected="false" disabled="disabled">
                                            <span class="bs-stepper-circle">3</span>
                                            <span class="bs-stepper-label">Berhasil</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                                <div id="list-dest" class="container">
                                    @for($i =0; $i < 3;$i++) <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <h5>Tafso Barn</h5>
                                            <button type="button" class="btn btn-danger">X</button>
                                        </li>
                                        </ul>
                                        @endfor
                                </div>
                            <div id="button-checkout">
                                <div class="btn_view">
                                    <a href="#" class="btn btn-primary">Checkout</a>
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
            <div id="dest-selection" class="container">
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
                    @for($i =0; $i < 15;$i++) <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img class="image_src" src="{{asset('img/tafso-barn.jpg')}}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">Tafso Barn</h4>
                                        <p class="card-text">Alamat : Jl. Baru Laksana No.75, Pagerwangi, Kec. Lembang, Kabupaten Bandung Barat, Jawa Barat 40391</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        <div class="btn_view">
                                            <a href="#" class="btn btn-primary">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                </div>
                @endfor
            </div>
    </div>
    </section>
</div>
</div>

@endsection

@extends('Frontend.layouts.app')
@section('assets_css')
  <link rel="stylesheet" href="{{asset('css/landing-page.css')}}">
  <link rel="stylesheet" href="{{asset('css/animation.css')}}">
@endsection
@section('content')

<!-- ================================================= BANNER ================================================== -->
  <div class="carousel slide carousel-fade overflow-hidden" data-bs-ride="carousel">
    <div class="banner p-0 m-0">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{asset('img/1-min.jpg')}}" alt="Los Angeles" class="d-block" style="width:100%">
          <div class="carousel-content">
            <span class="caption-1">VISIT <br/> BANDUNG</span>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{asset('img/1-min.jpg')}}" alt="Chicago" class="d-block" style="width:100%">
          <div class="carousel-content">
            <span class="caption-2">DISCOVER THE BEST OF<br/> BANDUNG</span>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{asset('img/1-min.jpg')}}" alt="New York" class="d-block" style="width:100%">
          <div class="carousel-content">
            <span class="caption-3">VISIT <br/> BANDUNG</span>
          </div>
        </div>
      </div>

      <button type="button" name="button" class="btn banner-btn">FIND MORE</button>
    </div>
  </div>

<!-- ============================================= CONTENT 1 =============================================================== -->
<div class="container content-1">
  <div class="row">
    <div class="col-md-4">
      <span class="content-caption-1">Exploring the City of Bandung and Beyond</span>
    </div>
    <div class="col-md-7 offset-md-1">
      <div class="card-group">
        @for($i =0; $i < 3;$i++)
        <div class="card">
          <img src="{{asset('img/1-min.jpg')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer">
            <button type="button" name="button" class="btn btn-success">Simpan</button>
          </div>
        </div>
        @endfor
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-7 offset-md-5">
      <button type="button" name="button" class="btn" style="float:right; width:100%; border: 3px solid black; padding: 10px 50px;">Find More</button>
    </div>
  </div>
</div>

<!-- ====================================================== CONTENT 2 ================================================================= -->
<div class="container content-2">
  <div class="row">
    <div class="col-md-7">
      <div class="card-group">
        @for($i =0; $i < 3;$i++)
          <div class="card">
          <img src="{{asset('img/1-min.jpg')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer">
            <button type="button" name="button" class="btn btn-success">Simpan</button>
          </div>
        </div>
        @endfor
      </div>

    </div>
    <div class="col-md-4 offset-md-1">
        <span class="content-caption-1">Dream the Night Away</span>
    </div>
  </div>
  <div class="row">
    <div class="col-md-7">
      <button type="button" name="button" class="btn" style="float:right; width:100%; border: 3px solid black; padding: 10px 50px;">Find More</button>
    </div>
  </div>
</div>

<!-- ================================================== CONTENT 3 =============================================================== -->
<div class="container-content-3">
  <div class="text-center">
    <h1 class="content-caption-3">Dicover our collection</h1>
  </div>
    <div class="container">
      <div class="row content-3">
      @for ($i =0; $i < 4;$i++)
      <div class="col-md-3 scroll-element js-scroll fade-in-bottom-{{$i+1}} ">
        <div class="card text-white text-center">
          <img src="{{asset('img/1-min.jpg')}}" class="card-img" alt="...">
          <div class="card-img-overlay d-flex align-items-end">
            <div class="row">
              <div class="col-md-12">
                <h5 class="card-title">Card title</h5>
              </div>
              <p class="card-text">Tagline lorem ipsum.</p>
            </div>
          </div>
        </div>
      </div>
      @endfor
    </div>
  </div>
</div>
<!-- =============================================== OUR TEAM =============================================================== -->
<div class="container" style="padding:100px 30px">
    <div class="row text-center">
        <h1 class="white">Meet Our team</h1>
    </div><br />

    <div class="row">
      @for ($i =0; $i < 4;$i++)
        <div class="col-md-3 col-sm-6">
          <div class="card team-card text-center">
            <div class="team-img-container">
              <img class="card-img-top team-img" src="{{asset('img/1-min.jpg')}}" alt="Card image">
            </div>
              <div class="card-body">
                <h4 class="card-title">John Doe</h4>
                <p class="card-text">Some example text.</p>
                <a href="#" class="btn btn-primary team-social-media"><i class="bi bi-github"></i></a>
                <a href="#" class="btn btn-primary team-social-media"><i class="bi bi-instagram"></i></a>
                <a href="#" class="btn btn-primary team-social-media"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="btn btn-primary team-social-media"><i class="bi bi-facebook"></i></a>
              </div>
          </div>
        </div>
      @endfor
    </div>
</div>

@endsection

@section('assets_js')

  <script src="{{asset('js/animation.js')}}"></script>
@endsection

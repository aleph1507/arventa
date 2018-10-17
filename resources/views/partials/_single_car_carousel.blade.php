<?php
  $gals = explode(';', $car->galleryImages);
  array_pop($gals);
  // print_r($gals);
  // array_unshift($gals, $car->featuredImage);
  $ac = 0;
?>

<div id="singleCarCarousel">
  <ul id="imageGallery">
    @foreach($gals as $gal)
      <li data-thumb="{{asset('images/cars/' . $car->id . '/' . 'gallery/' . $gal)}}"
          data-src="{{asset('images/cars/' . $car->id . '/' . 'gallery/' . $gal)}}"
      >
        <img src="{{asset('images/cars/' . $car->id . '/' . 'gallery/' . $gal)}}" alt="{{$car->model}}">
      </li>
      {{-- <div class="carousel-item {{$ac == 0 ? 'active' : ''}}">
        <img src="{{asset('images/cars/' . $car->id . '/' . 'gallery/' . $gal)}}"
         alt="{{$car->model}}" class="d-block w-100">
      </div> --}}
      <?php $ac++; ?>
    @endforeach
    {{-- <li data-thumb="img/thumb/cS-1.jpg" data-src="img/largeImage.jpg">
      <img src="img/cS-1.jpg" />
    </li>
    <li data-thumb="img/thumb/cS-2.jpg" data-src="img/largeImage1.jpg">
      <img src="img/cS-2.jpg" />
    </li> --}}
  </ul>
</div>

{{-- <div id="singleCarCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner"> --}}

    {{-- <div class="carousel-item active">
      <img src="{{asset('images/cars/' . $car->id . '/' . $car->featuredImage)}}"
       alt="{{$car->model}}" class="d-block w-100">
    </div> --}}
    {{-- @foreach($gals as $gal)
      <div class="carousel-item {{$ac == 0 ? 'active' : ''}}">
        <img src="{{asset('images/cars/' . $car->id . '/' . 'gallery/' . $gal)}}"
         alt="{{$car->model}}" class="d-block w-100">
      </div>
      < $ac++; ?>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#singleCarCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#singleCarCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> --}}
{{-- <div class="container">
  <div id="carousel-status" style="margin:auto;" class="text-center carousel-static row spacing-top thumb-gallery">
    @foreach($gals as $gal)
      <div class="col-xs-6 col-md-4 sm-spacing">
        <img src="{{asset('images/cars/' . $car->id . '/' . 'gallery/' . $gal)}}"
        alt="{{$car->model}}" class="d-none d-md-block w-100 img-fluid">
      </div>
    @endforeach
  </div>
</div> --}}

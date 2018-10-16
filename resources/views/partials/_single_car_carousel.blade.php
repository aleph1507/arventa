<div id="singleCarCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <?php
      $gals = explode(';', $car->galleryImages);
      array_pop($gals);
      // print_r($gals);
      // array_unshift($gals, $car->featuredImage);
      $ac = 0;
    ?>

    {{-- <div class="carousel-item active">
      <img src="{{asset('images/cars/' . $car->id . '/' . $car->featuredImage)}}"
       alt="{{$car->model}}" class="d-block w-100">
    </div> --}}
    @foreach($gals as $gal)
      <div class="carousel-item {{$ac == 0 ? 'active' : ''}}">
        <img src="{{asset('images/cars/' . $car->id . '/' . 'gallery/' . $gal)}}"
         alt="{{$car->model}}" class="d-block w-100">
      </div>
      <?php $ac++; ?>
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
</div>

<div id="carousel-status" class="carousel-static row spacing-top thumb-gallery">
  @foreach($gals as $gal)
    <div class="col-xs-3 col-md-3 sm-spacing">
      <img src="{{asset('images/cars/' . $car->id . '/' . 'gallery/' . $gal)}}"
       alt="{{$car->model}}" class="d-none d-md-block w-100 img-fluid">
    </div>
  @endforeach
</div>

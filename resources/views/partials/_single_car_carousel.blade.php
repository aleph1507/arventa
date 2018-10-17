<?php
  $gals = explode(';', $car->galleryImages);
  array_pop($gals);
?>

<div id="singleCarCarousel">
  <ul id="imageGallery">
    @foreach($gals as $gal)
      <li data-thumb="{{asset('images/cars/' . $car->id . '/' . 'gallery/' . $gal)}}"
          data-src="{{asset('images/cars/' . $car->id . '/' . 'gallery/' . $gal)}}"
      >
        <img src="{{asset('images/cars/' . $car->id . '/' . 'gallery/' . $gal)}}">
      </li>
    @endforeach
  </ul>
</div>

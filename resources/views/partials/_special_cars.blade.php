<div id="special-car-wrapper">
    <div class="row">
      <h3 class="special-title">more of our special cars</h3>
    </div>
    <div class="row">
      <div class="car-thumbs-wrapper">
        @foreach($specialCars as $sc)
          <div class="col-xs-12 col-md-6 col-lg-3">
            <a href="{{route('cars.show', $sc->id)}}">
              <img src="{{asset('images/cars/' . $sc->id . '/' . $sc->featuredImage)}}" alt="{{$sc->model}}"
                class="img-fluid">
              <h4>{{$sc->brand->name}} {{$sc->model}}</h4>
            </a>
          </div>
        @endforeach
      </div>
      {{-- <div class="car-thumbs-wrapper">
        <div class="col-xs-12 col-md-6 col-lg-3">
          <img src="{{asset('img/car_thumb.jpg')}}" class="car-thumb-img img-fluid">
          <h4>Audi RS5 Coupe 2.9 TFSI Quattro Tiptronic</h4>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3 ">
          <img src="{{asset('img/car_thumb.jpg')}}" class="car-thumb-img img-fluid">
          <h4>Audi RS5 Coupe 2.9 TFSI Quattro Tiptronic</h4>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
          <img src="{{asset('img/car_thumb.jpg')}}" class="car-thumb-img img-fluid">
          <h4>Audi RS5 Coupe 2.9 TFSI Quattro Tiptronic</h4>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
          <img src="{{asset('img/car_thumb.jpg')}}" class="car-thumb-img img-fluid">
          <h4>Audi RS5 Coupe 2.9 TFSI Quattro Tiptronic</h4>
        </div>
      </div> --}}
    </div>
</div>

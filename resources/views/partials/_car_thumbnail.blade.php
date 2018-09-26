<a href="{{route('cars.show', 1)}}" class="div-a">
  <div class="car-thumnail">
    {{-- {{var_dump($car)}} --}}
    <img src="{{asset('images/cars/' . $car->featuredimage)}}" class="car-thumb-img img-fluid">
    <h3 class="car-thumb-header">{{$car->brand->name}}</h3>
    <p class="lead">{{$car->model}}</p>
    <span class="car-thumb-info">Status: <span class="status">-</span></span>
    <span class="car-thumb-info">Ref nr. <span class="refnr">{{$car->refNr}}</span></span>
    <div class="discount">save 15%</div>
  </div>
</a>

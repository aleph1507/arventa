<a href="{{route('cars.show', $car->id)}}" class="div-a">
  <div class="car-thumbnail">
    {{-- {{var_dump($car)}} --}}
    <div class="image-container">
      <img src="{{asset('images/cars/' . $car->id . '/' . $car->featuredImage)}}" class="car-thumb-img img-fluid">
      <div class="overlay">
        <!--a class = "btn btn-primary btn-sm">Save {{$car->discountPercent}}%</a-->
      </div>
    </div>
    <div class="car-thumbnail-body text-center">
        <h3 class="car-thumb-header">{{$car->brand['name']}} {{$car->model}}</h3>
        <p class="lead" style="margin-bottom:1%;">{{$car->shortAccessories}}</p>
        <!--span class="car-thumb-info">Status: <span class="status">{{$car->status}}</span></span>
        <span class="car-thumb-info">Ref nr. <span class="refnr">{{$car->VIN}}</span></span>
        <div class="discount">save {{$car->discountPercent}}%</div-->
        <div class="price-skew">{{$car->price}}</div>
  </div>
  </div>
</a>

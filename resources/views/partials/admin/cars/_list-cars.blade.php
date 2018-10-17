<div class="card-deck">
  @foreach($cars as $c)
  <div class="col-md-3">
    <div class="card"  style= "margin:5% 0 5% 0;">
      <img class="card-img-top" src="{{asset('images/cars/'.$c->id."/". $c->featuredImage)}}" style = " z-index: 2;" alt="Card image cap">
      <div class="card-body" style = " min-height: 250px; max-height: 350px; overflow: auto;">
        <div style = "min-height: 100px;">
          <h5 class="card-title">{{$c->brand->name}} {{$c->model}}</h5>
          <ul style="list-style: none;">
            <li>VIN: {{$c->VIN}}</li>
            <li>Price: {{$c->price}}</li>
            <li>{{ isset($c->shortAccessories) ? $c->shortAccessories : '-' }}</li-->
            <!--li>KMs: {{ isset($c->KMs) ? $c->KMs : '-' }}</li-->
            <!--li>{{$c->hpkw}}</li-->
            <!--li>{{$c->fuelType}}</li-->
            <!--li>{{$c->exterior}}</li-->
            <!--li>{{$c->interior}}</li-->
            <!--li>{{$c->co2}}</li-->
            <!--li>{{ isset($c->firstRegistration) ? $c->firstRegistration : '-' }}</li-->
          </ul>
          </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <a href="{{route('cars.edit', $c->id)}}" class="btn btn-primary btn-sm" style = "margin:5px">Edit</a>
          <form action="{{route('cars.duplicate', $c->id)}}" method="post">
            {{csrf_field()}}
            <input type="submit" class="btn btn-info btn-sm" style = "margin:5px" value="Duplicate">
          </form>
          {{-- <a href="{{route('cars.duplicate', $c->id)}}" class="btn btn-outline-dark btn-sm" style = "margin:5px">Duplicate</a> --}}
          <form action="{{route('cars.delete', $c->id)}}" method="post">
            {{csrf_field()}}
            <input type="submit" class="btn btn-danger btn-sm" style = "margin:5px" value="Delete">
          </form>
          {{-- <a href="{{route('cars.delete', $c->id)}}" class="btn btn-danger btn-sm" style = "margin:5px">Delete</a>--}}
        </div>
      </div>
    </div>
  </div>
  @endforeach

</div>

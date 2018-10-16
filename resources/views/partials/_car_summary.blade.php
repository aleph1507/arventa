<div class="title-buttons">
  <hr>
  <h1>
    {{-- Audi A5 Coupe 3.0 TDI quattro S Line 286 HP tiptronic --}}
    {{ $car->brand['name'] }} {{ $car->model }}
  </h1>
  <hr>
  @if($car->discountPercent)
    <div class="green-savings">saving {{$car->discountPercent}}%</div>
    <div class="red-inv-button" style="cursor: auto;">${{$car->price}}</div>
  @else
    <div class="red-inv-button" style="cursor: auto; margin-top: 5%;">${{$car->price}}</div>
  @endif
</div>
<hr class="horizontal-spacing">
<div class="summary-highlights horizontal-spacing">
  <div class="summary-highlights-header">Highlights</div>
  {{ $car->shortAccessories }}
  {{-- Coupe • Full leather Fine Nappa • MMI plus Navigation • Virtual Cockpit • New • EU Car • No registration • COC document --}}

  <div class="summary-highlights-header horizontal-spacing">Vehicle information</div>
  <div class="row summary-row">
    {{-- <div class="col-xs-4 col-sm-5">Ref nr.</div>
    <div class="col-xs-7 col-sm-7">35745</div> --}}
    <div class="desc">VIN</div>
    <div class="value">{{$car->VIN}}</div>
  </div>
  <div class="row summary-row">
    <div class="desc">Model</div>
    <div class="value">{{$car->model}}</div>
  </div>
  <div class="row summary-row">
    <div class="desc">Fuel type</div>
    <div class="value">{{$car->fuelType}}</div>
  </div>
  <div class="row summary-row">
    <div class="desc">Exterior</div>
    <div class="value">{{$car->exteriorColor}}</div>
  </div>
  <div class="row summary-row">
    <div class="desc">Interior</div>
    <div class="value">{{$car->interiorColor}}</div>
  </div>
  <div class="row summary-row">
    <div class="desc">HP/KW</div>
    <div class="value">{{$car->powerBHP}}/{{$car->powerKW}}</div>
  </div>
  <div class="row summary-row">
    <div class="desc">1st Registration</div>
    <div class="value">{{$car->registrationYear}}</div>
  </div>
  <div class="row summary-row">
    <div class="desc">KM's</div>
    <div class="value">{{$car->mileage}}</div>
  </div>
  <div class="row summary-row">
    <div class="desc">CO2</div>
    <div class="value">{{$car->emmisionClass}}</div>
  </div>

  <div class="row car-detail-button-wrapper">
    <a class="btn-black" href="tel: +38970230192">call us <strong>38970230192</strong></a>
  </div>
</div>

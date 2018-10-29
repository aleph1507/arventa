@extends('layouts.master')

@section('content')

  <!--< $filter = false; ?>-->
  <div class="container"><!--  -->
    <div class="flex-container">
      <!--div id="filter-col" class="col-xs-12 col-sm-12 col-md-6 col-lg-3">;
        @include('partials._filter')
      </div-->
      {{-- <div class="row" id="closed-filter-row"> --}}
      <div class="row car-row" id="car-row">
        @foreach($cars as $car)
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 car-thuml-col">
              @include('partials._car_thumbnail')
            </div>
          {{-- </div> --}}
        @endforeach
      </div>
    </div>
    {{-- <div class="row horizontal-spacing" id="car-row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 car-thumb-col">
        @include('partials._car_thumbnail')
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 car-thumb-col">
        @include('partials._car_thumbnail')
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 car-thumb-col">
        @include('partials._car_thumbnail')
      </div>
    </div> --}}
  </div>

@endsection

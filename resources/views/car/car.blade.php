@extends('layouts.master')

@section('content')
  <div class="container-fluid margin-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 offset-lg-1">
        <a class="red-bg-btn horizontal-spacing invisible_a" href="{{route('cars.index')}}">all stock</a>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 offset-lg-1">
        @include('partials._single_car_carousel')
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 offset-lg-1">
          @include('partials._car_summary')
      </div>
    </div>
    <hr class="horizontal-spacing">
    <div class="row">
      @include('partials._car_specs')
    </div>
    <hr class="horizontal-spacing">
    <div class="row">
      @include('partials._car_specs_further')
    </div>
    <div class="row">
      @include('partials._special_cars')
    </div>
  </div>
@endsection()

@if(isset($car))
  <form action="{{route('cars.update', $car->id)}}" id="car_form" method="post" enctype="multipart/form-data"> <!-- class="dropzone" -->
@else
  <form action="{{route('cars.store')}}" id="car_form" method="post" enctype="multipart/form-data"> <!-- class="dropzone" -->
@endif
  {{csrf_field()}}
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="form-group">
          <label for="VIN">VIN</label>
          <input type="number" name="VIN" class="form-control" id="VIN"
            aria-describedby="VIN" value="{{ isset($car) ? $car->VIN : '' }}" required>
        </div>
        <div class="form-group">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="brand_id">Brand</label>
            </div>
            <select class="custom-select" id="brand_id" name="brand_id">
              @foreach($brands as $b)
                <option value="{{$b->id}}"
                  {{ isset($car) ? ($b->id == $car->brand_id ? 'selected' : '') : '' }}>{{$b->name}}</option>
              @endforeach
            </select>
        </div>
        </div>
        <div class="form-group">
          <label for="model">Model</label>
          <input type="text" name="model" class="form-control" id="model"
            value="{{ isset($car) ? $car->model : '' }}" placeholder="model" required>
        </div>
        <div class="form-group">
          <label for="fuelType">Fuel Type</label>
          <select class="custom-select" id="fuelType" name="fuelType">
            @foreach($fuelTypes as $ft)
              <option value="{{$ft}}"
                {{ isset($car) ? ($ft == $car->fuelType ? 'selected' : '') : '' }}>{{$ft}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="engineType">Engine Type</label>
          <select class="custom-select" id="engineType" name="engineType">
            @foreach($engineTypes as $et)
              <option value="{{$et}}"
                {{ isset($car) ? ($et == $car->engineType ? 'selected' : '') : '' }}>{{$et}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="shortAccessories">Short Accessories</label>
          <input type="text" name="shortAccessories" class="form-control" id="shortAccessories"
            value="{{ isset($car) ? $car->shortAccessories : '' }}" placeholder="shortAccessories" required>
        </div>
        <div class="form-group">
          <label for="gearboxType">Gearbox Type</label>
          <select class="custom-select" id="gearboxType" name="gearboxType">
            @foreach($gearboxTypes as $gt)
              <option value="{{$gt}}"
                {{ isset($car) ? ($gt == $car->gearboxType ? 'selected' : '') : '' }}>{{$gt}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exteriorColor">Exterior Color</label>
          <input type="text" name="exteriorColor" class="form-control" id="exteriorColor"
            value="{{ isset($car) ? $car->exteriorColor : '' }}" placeholder="Exterior Color" required>
        </div>
        <div class="form-group">
          <label for="interiorColor">Interior Color</label>
          <input type="text" name="interiorColor" class="form-control" id="interiorColor"
            value="{{ isset($car) ? $car->interiorColor : '' }}" placeholder="Interior Color" required>
        </div>
        <div class="form-group">
          <label for="registrationYear">Registration Year</label>
          <input type="text" name="registrationYear" class="form-control" id="registrationYear"
            value="{{ isset($car) ? $car->registrationYear : '' }}" placeholder="Registration Year">
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="text" name="price" class="form-control" id="price"
            value="{{ isset($car) ? $car->price : '' }}" placeholder="Price">
        </div>
        <div class="form-group">
          <label for="netprice">Net Price</label>
          <input type="text" name="netprice" class="form-control" id="netprice"
            value="{{ isset($car) ? $car->netprice : '' }}" placeholder="Net Price">
        </div>
        <div class="form-group">
          <label for="mileage">Mileage</label>
          <input type="text" name="mileage" class="form-control" id="mileage"
            value="{{ isset($car) ? $car->mileage : '' }}" placeholder="Mileage">
        </div>
        <div class="form-group">
          <label for="motorCapacity">Motor Capacity</label>
          <input type="text" name="motorCapacity" class="form-control" id="motorCapacity"
            value="{{ isset($car) ? $car->motorCapacity : '' }}" placeholder="Motor Capacity">
        </div>
        <div class="form-group">
          <label for="powerBHP">Power BHP</label>
          <input type="text" name="powerBHP" class="form-control" id="powerBHP"
            value="{{ isset($car) ? $car->powerBHP : '' }}" placeholder="Power BHP">
        </div>
        <div class="form-group">
          <label for="powerKW">Power KW</label>
          <input type="text" name="powerKW" class="form-control" id="powerKW"
            value="{{ isset($car) ? $car->powerKW : '' }}" placeholder="Power KW">
        </div>
        <div class="form-group">
          <label for="discountPercent">Discount Percent</label>
          <input type="text" name="discountPercent" class="form-control" id="discountPercent"
            value="{{ isset($car) ? $car->discountPercent : '' }}" placeholder="Discount Percent">
        </div>
        <div class="form-group">
          <label for="consumptionLiters">Consumption Liters</label>
          <input type="text" name="consumptionLiters" class="form-control" id="consumptionLiters"
            value="{{ isset($car) ? $car->consumptionLiters : '' }}" placeholder="Consumption Liters">
        </div>
        <div class="form-group">
          <label for="originCountry">Origin Country</label>
          <input type="text" name="originCountry" class="form-control" id="originCountry"
            value="{{ isset($car) ? $car->originCountry : '' }}" placeholder="Origin Country">
        </div>
        <div class="form-group">
          <label for="emmisionClass">emmisionClass</label>
          <select class="custom-select" id="emmisionClass" name="emmisionClasses">
            @foreach($emmisionClasses as $ec)
              <option value="{{$ec}}"
                {{ isset($car) ? ($ec == $car->emmisionClass ? 'selected' : '') : '' }}>{{$ec}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="vehicleType">Vehicle Type</label>
          <input type="text" name="vehicleType" class="form-control" id="vehicleType"
            value="{{ isset($car) ? $car->vehicleType : '' }}" placeholder="Vehicle Type">
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <input type="text" name="status" class="form-control" id="status"
            value="{{ isset($car) ? $car->status : '' }}" placeholder="Status">
        </div>
        <div class="form-group">
          <label for="additionalEquipment">Addition Equipment</label>
          <textarea name="additionalEquipment" id="additionalEquipment"
            placeholder="Additional Equipment" cols="30" class="form-control"
            rows="10">{{isset($car) ? $car->additionalEquipment : ''}}</textarea>
        </div>
        <div class="form-group">
          <label for="furtherEquipment">Further Equipment</label>
          <textarea name="furtherEquipment" id="furtherEquipment"
            placeholder="Further Equipment" class="form-control" cols="30"
            rows="10">{{isset($car) ? $car->furtherEquipment : ''}}</textarea>
        </div>
      </div>
      <div class="col-md-6 col-sm-12">
        <div class="form-group">
          <label for="featuredImage">Featured Image</label>
          <input type="file" value="{{ isset($car) ? $car->featuredImage : ''}}" name="featuredImage">
        </div>
        <div class="form-group">
          <div id="fine-uploader-gallery">

          </div>
          {{-- <label for="file">Gallery Images</label> --}}
          {{-- <input type="file" id="file" value="{{ isset($car) ? $car->galleryimages : ''}}" name="file[]" multiple />  --}}
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-6">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          <div class="col-sm-4 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
        </form>
        @if(isset($car))
          <form action="{{route('cars.delete', $car->id)}}" method="post">
            {{csrf_field()}}
            <input type="submit" class="btn btn-danger mt-5 mt-sm-0" value="Delete">
          </form>
        @endif
      </div>
    </div>

    </div>
  </div>
</div>

{{-- <script>
        var galleryUploader = new qq.FineUploader({
            element: document.getElementById("fine-uploader-gallery"),
            template: 'qq-template-gallery',
            request: {
                endpoint: '/admin/gallery_upload'
            },
            thumbnails: {
                placeholders: {
                    waitingPath: "{{asset('js/fine-uploader/_build/placeholders/waiting-generic.png')}}",
                    notAvailablePath: "{{asset('js//fine-uploader/_build/placeholders/not_available-generic.png')}}"
                }
            },
            validation: {
                allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']
            }
        });
    </script> --}}

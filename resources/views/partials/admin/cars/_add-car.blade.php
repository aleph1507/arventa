@if(isset($car))
  <form action="{{route('cars.update', $car->id)}}" id="car_form" method="post" enctype="multipart/form-data"> <!-- class="dropzone" -->
@else
  <form action="{{route('cars.store')}}" id="car_form" method="post" enctype="multipart/form-data"> <!-- class="dropzone" -->
@endif
  {{csrf_field()}}
  <script>
    // endpoint = '/admin/gallery_upload';
    var endpoint = <?php echo '\'/admin/gallery_upload\'';/*isset($car) ? "'images/cars/$car->id/gallery'" : */ ?>;
    // console.log('endpoint: ', endpoint);
  </script>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="form-group">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="VIN">VIN</label>
            </div>
            <input type="number" name="VIN" class="form-control" id="VIN"
              aria-describedby="VIN" value="{{ isset($car) ? $car->VIN : '' }}" required>
          </div>
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
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="model">Model</label>
            </div>
            <input type="text" name="model" class="form-control" id="model"
              value="{{ isset($car) ? $car->model : '' }}" placeholder="model" required>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12">
        <div class="form-group">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="engineType">Engine Type</label>
            </div>
            <select class="custom-select" id="engineType" name="engineType">
              @foreach($engineTypes as $et)
                <option value="{{$et}}"
                  {{ isset($car) ? ($et == $car->engineType ? 'selected' : '') : '' }}>{{$et}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="shortAccessories">Short Accessories</label>
            </div>
            <input type="text" name="shortAccessories" class="form-control" id="shortAccessories"
              value="{{ isset($car) ? $car->shortAccessories : '' }}" placeholder="shortAccessories" required>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="exteriorColor">Exterior Color</label>
            </div>
            <input type="text" name="exteriorColor" class="form-control" id="exteriorColor"
              value="{{ isset($car) ? $car->exteriorColor : '' }}" placeholder="Exterior Color" required>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="interiorColor">Interior Color</label>
            </div>
            <input type="text" name="interiorColor" class="form-control" id="interiorColor"
              value="{{ isset($car) ? $car->interiorColor : '' }}" placeholder="Interior Color" required>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseMotor">Motor</a>
              </h4>
            </div>
            <div id="collapseMotor" class="panel-collapse collapse">
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="fuelType">Fuel Type</label>
                  </div>
                  <select class="custom-select" id="fuelType" name="fuelType">
                    @foreach($fuelTypes as $ft)
                      <option value="{{$ft}}"
                        {{ isset($car) ? ($ft == $car->fuelType ? 'selected' : '') : '' }}>{{$ft}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="gearboxType">Gearbox Type</label>
                  </div>
                  <select class="custom-select" id="gearboxType" name="gearboxType">
                    @foreach($gearboxTypes as $gt)
                      <option value="{{$gt}}"
                        {{ isset($car) ? ($gt == $car->gearboxType ? 'selected' : '') : '' }}>{{$gt}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="motorCapacity">Motor Capacity</label>
                  </div>
                  <input type="text" name="motorCapacity" class="form-control" id="motorCapacity"
                    value="{{ isset($car) ? $car->motorCapacity : '' }}" placeholder="Motor Capacity">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="powerBHP">Power BHP</label>
                  </div>
                  <input type="text" name="powerBHP" class="form-control" id="powerBHP"
                    value="{{ isset($car) ? $car->powerBHP : '' }}" placeholder="Power BHP">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="powerKW">Power KW</label>
                  </div>
                  <input type="text" name="powerKW" class="form-control" id="powerKW"
                    value="{{ isset($car) ? $car->powerKW : '' }}" placeholder="Power KW">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="consumptionLiters">Consumption Liters</label>
                  </div>
                    <input type="text" name="consumptionLiters" class="form-control" id="consumptionLiters"
                      value="{{ isset($car) ? $car->consumptionLiters : '' }}" placeholder="Consumption Liters">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="emmisionClass">Emmision Class</label>
                  </div>
                  <select class="custom-select" id="emmisionClass" name="emmisionClass">
                    @foreach($emmisionClasses as $ec)
                      <option value="{{$ec}}"
                        {{ isset($car) ? ($ec == $car->emmisionClass ? 'selected' : '') : '' }}>{{$ec}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseEquipment">Equipment</a>
              </h4>
            </div>
            <div id="collapseEquipment" class="panel-collapse collapse">
              <div class="form-group">
                <label for="additionalEquipment"><h6>Additional Equipment</h6></label>
                <textarea name="additionalEquipment" id="additionalEquipment"
                  placeholder="Additional Equipment" cols="30" class="form-control"
                  rows="10">{{isset($car) ? $car->additionalEquipment : ''}}</textarea>
              </div>
              <br>
              <hr>
              <br>
              <div class="form-group">
                <label for="furtherEquipment"><h6>Further Equipment</h6></label>
                <textarea name="furtherEquipment" id="furtherEquipment"
                  placeholder="Further Equipment" class="form-control" cols="30"
                  rows="10">{{isset($car) ? $car->furtherEquipment : ''}}</textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12">
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapsePrice">Price</a>
              </h4>
            </div>
            <div id="collapsePrice" class="panel-collapse collapse">
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="registrationYear">Registration Year</label>
                  </div>
                  <input type="text" name="registrationYear" class="form-control" id="registrationYear"
                    value="{{ isset($car) ? $car->registrationYear : '' }}" placeholder="Registration Year">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="price">Price</label>
                  </div>
                  <input type="text" name="price" class="form-control" id="price"
                    value="{{ isset($car) ? $car->price : '' }}" placeholder="Price">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="netprice">Net Price</label>
                    </div>
                    <input type="text" name="netprice" class="form-control" id="netprice"
                      value="{{ isset($car) ? $car->netprice : '' }}" placeholder="Net Price">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="mileage">Mileage</label>
                    </div>
                    <input type="text" name="mileage" class="form-control" id="mileage"
                      value="{{ isset($car) ? $car->mileage : '' }}" placeholder="Mileage">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="discountPercent">Discount Percent</label>
                    </div>
                    <input type="text" name="discountPercent" class="form-control" id="discountPercent"
                      value="{{ isset($car) ? $car->discountPercent : '' }}" placeholder="Discount Percent">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseAdditional">Additional</a>
              </h4>
            </div>
            <div id="collapseAdditional" class="panel-collapse collapse">
              <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="originCountry">Origin Country</label>
                    </div>
                    <input type="text" name="originCountry" class="form-control" id="originCountry"
                      value="{{ isset($car) ? $car->originCountry : '' }}" placeholder="Origin Country">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="vehicleType">Vehicle Type</label>
                    </div>
                    <input type="text" name="vehicleType" class="form-control" id="vehicleType"
                      value="{{ isset($car) ? $car->vehicleType : '' }}" placeholder="Vehicle Type">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="status">Status</label>
                    </div>
                    <input type="text" name="status" class="form-control" id="status"
                      value="{{ isset($car) ? $car->status : '' }}" placeholder="Status">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseImages">Images</a>
              </h4>
            </div>
            <div id="collapseImages" class="panel-collapse collapse">
              <div class="form-group">
                {{-- @if(isset($car)) --}}
                  <img src="{{isset($car) ? asset('images/cars/' . $car->id . '/' . $car->featuredImage) : ''}}" alt="featImg"
                    class="img-fluid {{isset($car) ? '' : 'd-none'}}" id="carFeatImg">
                {{-- @endif --}}
                <label for="featuredImage">Featured Image</label>
                <input type="file" value="{{ isset($car) ? $car->featuredImage : ''}}" id="imgInp" name="featuredImage">
              </div>
              <div class="form-group">
                <div id="fine-uploader-gallery">

                </div>
                {{-- <label for="file">Gallery Images</label> --}}
                {{-- <input type="file" id="file" value="{{ isset($car) ? $car->galleryimages : ''}}" name="file[]" multiple />  --}}
              </div>
              @if(isset($car))
                <div class="form-group">
                  <div id="uploaded-imgs">
                    <?php
                      $galImgs = explode(';', $car->galleryImages);
                    ?>
                    <script type="text/javascript">
                      var galImgs = <?php echo json_encode($galImgs); ?>;
                      var car = <?php echo json_encode($car); ?>;
                      // console.log('galImgs: ', galImgs);
                    </script>
                    {{-- {{explode(';', $car->galleryImages)}} --}}
                    <div class="row" id="GIdiv">
                      @for($i = 0; $i < count($galImgs)-1; $i++)
                        <div class="col-xs-12 col-md-6 mt-5">
                          <div class="gImgs" id="{{$galImgs[$i]}}">
                            {{-- <form action="{{route('gallery.dgi', ['cid' => $car->id, 'giname' => $galImgs[$i]])}}"
                              method="POST">
                              {{csrf_field()}} --}}
                              <input type="button" class="btn btn-danger rounded-circle GIdelete"
                                data-img="{{$galImgs[$i]}}" value="x">
                            {{-- </form> --}}
                            <img style="max-width:50%;"
                            src="{{asset('images/cars/' . $car->id . '/' . 'gallery/' . $galImgs[$i])}}"
                            alt="{{$galImgs[$i]}}">
                          </div>
                        </div>
                      @endfor
                    </div>
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
      <div class="row">
          <button type="submit" id="car_form_submit" class="btn btn-primary" style = "margin:0 5px 0 5px">Submit</button>
          @if(isset($car))
            <form action="{{route('cars.delete', $car->id)}}" method="post">
              {{csrf_field()}}
              <input type="submit" class="btn btn-danger" style = "margin:0 5px 0 5px" value="Delete">
            </form>
              <a id="car_book_keeping" class="btn btn-info" style = "margin:0 5px 0 5px">Book keeping</a>
          @endif
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

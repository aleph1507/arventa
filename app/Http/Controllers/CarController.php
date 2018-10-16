<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Image;
use File;
use Session;
use App\Brand;
use Illuminate\Filesystem\Filesystem;
// use Illuminate\Http\Response;

class CarController extends Controller
{
    public $username="API74";
    public $password="API74pass2";
    public $api_base="http://services.mobile.de/";
    public $tmp_files = [];


    public function __constructor() {
      $this->middleware('auth', ['only' => ['list', 'store', 'create', 'edit', 'update', 'destroy']]);
    }


    function get_auth_string(){
        return $this->username.":".$this->password;
    }

    public function curl_set_options($curl){
      curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
      curl_setopt($curl, CURLOPT_USERPWD, $this->get_auth_string());
      curl_setopt($curl, CURLOPT_FAILONERROR, true);
      curl_setopt($curl, CURLOPT_HEADER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    }

    public function getAll($customerNumber = 1063) {


      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_PROXY => 'http://api.test.sandbox.mobile.de:8080',
        CURLOPT_URL => "https://services.mobile.de/search-api/search?customerNumber=1063",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "Accept: application/xml",
          "Accept-Encoding: gzip",
          "Accept-Language: en",
          "Authorization: Basic QVBJNzQ6QVBJNzRwYXNzMg==",
          "Cache-Control: no-cache"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        print_r($response);
      }

      die();

     // $query = '/search-api/search?customerNumber=' . $customerNumber;
     //  $ch = curl_init();
     //  curl_setopt($ch, CURLOPT_URL, $this->api_base . $query);
     //  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
     //  curl_setopt($ch, CURLOPT_USERPWD, $this->get_auth_string());
     //  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     //  curl_setopt($ch, CURLOPT_PROXY, 'http://api.test.sandbox.mobile.de:8080'); // $proxy is ip of proxy server
     //  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     //  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
     //  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
     //  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
     //  $httpCode = curl_getinfo($ch , CURLINFO_HTTP_CODE); // this results 0 every time
     //  $response = curl_exec($ch);
     //  if ($response === false) $response = curl_error($ch);
     //  echo stripslashes($response);
     //  curl_close($ch);
     //
     //  echo "response: ";
     //  var_dump($response);
     //  die();

      // $query = '/search-api/search?customerNumber=' . $customerNumber;
      // $curl = curl_init($this->api_base . $query);
      // $this->curl_set_options($curl);
      // echo 'curl_exec: ';
      // echo curl_exec($curl);
      // die();
      // $response = curl_exec($curl);
      // echo 'response: ' . $response;
      // die();
      // $curl_error = curl_error($curl);
      // curl_close($curl);
      //
      // if($curl_error){ /* Error handling goes here */ }

      return $response;
    }

    public function getAd($ad = 11989) {
      $query = '/search-api/ad/' . $ad;
      $curl = curl_init($this->api_base . $query);
      $this->curl_set_options($curl);
      $response = curl_exec($curl);
      $curl_error = curl_error($curl);
      curl_close($curl);

      if($curl_error){ /* Error handling goes here */ }

      return $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        // $getAll = $this->getAll();
        return view('cars.stocklist')->with(compact('cars', 'cars'));
    }

    public function indexL2()
    {
        $cars = Car::all();
        return view('cars.listing2')->with(compact('cars'));
    }

    public function root_index() {
      $cars = Car::all();
      return view('welcome')->with(compact('cars'));
    }

    public function list() {
      $cars = Car::all();
      return view('admin.list-cars')->with(compact('cars'));
    }

    public function duplicate($id){
      $c = Car::find($id);
      $car = new Car();
      $car->refNr = $c->refNr;
      $car->brand_id = $c->brand_id;
      $car->model = $c->model;
      $car->fuelType = $c->fuelType;
      $car->exterior = $c->exterior;
      $car->co2 = $c->co2;
      $car->interior = $c->interior;
      $car->hpkw = $c->hpkw;
      if($c->firstRegistration)
        $car->firstRegistration = $c->firstRegistration;
      if($c->KMs)
        $car->KMs = $c->KMs;
      $car->price = $c->price;
      $car->featuredimage = $c->featuredimage;
      $car->galleryimages = $c->galleryimages;

      $car->save();

      $cars = Car::all();
      Session::flash('success', 'Car Duplicated');
      return view('admin.list-cars')->with(compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tmp_dir = public_path() . '/images/cars/tmp';
      // dd($request->all());
      $car = Car::create($request->only(['VIN', 'model', 'brand_id','engineType', 'shortAccessories',
        'fuelType', 'gearboxType', 'registrationYear', 'price',
        'netprice', 'mileage', 'motorCapacity', 'powerBHP', 'powerKW',
        'discountPercent', 'consumptionLiters', 'originCountry',
        'emmisionClass', 'vehicleType', 'status', 'exteriorColor',
        'interiorColor', 'additionalEquipment', 'furtherEquipment']));

        // global $tmp_files;
        $gallery_files = scandir($tmp_dir);
        if(count($gallery_files) > 0)
          $car->galleryImages = '';
        foreach($gallery_files as $ga){
          if(strlen($ga) < 3)
            continue;
          File::exists(public_path() . '/images/cars/' . $car->id . '/gallery') or File::makeDirectory(public_path() . '/images/cars/' . $car->id . '/gallery', 0777, true);
          $dest = public_path('images/cars/' . $car->id . '/' . 'gallery/' . $ga);
          // copy($tmp_dir . '/' . $ga, $dest);
          Image::make($tmp_dir . '/' . $ga)->fit(768, 576)->save($dest);
          $car->galleryImages .= $ga . ';';
        }

      if($request->hasFile('featuredImage')){
        $image = $request->file('featuredImage');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        File::exists(public_path() . '/images/cars/' . $car->id) or File::makeDirectory(public_path() . '/images/cars/' . $car->id, 0777, true);
        $location = public_path('images/cars/' . $car->id . '/' . $filename);
        Image::make($image)->fit(800, 500)->save($location);

        $car->featuredImage = $filename;
      }

        $car->save();
        Session::flash('success', 'This car was successfully saved.');

        $fs = new Filesystem();
        $fs->cleanDirectory($tmp_dir);

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        print_r($car->model);
        return view('car.car')->with(compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        $brands = Brand::all();
        return view('admin.car-edit')->with(compact('car', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'refNr' => 'required',
        'model' => 'required',
        'fuelType' => 'required',
        'exterior' => 'required',
        'co2' => 'required',
        'interior' => 'required',
        'hpkw' => 'required',
        'price' => 'required',
        // 'featuredImage' => 'required|image'
      ]);

      $car = Car::find($id);
      $car->refNr = $request->refNr;
      $car->brand_id = $request->brand;
      $car->model = $request->model;
      $car->fuelType = $request->fuelType;
      $car->exterior = $request->exterior;
      $car->co2 = $request->co2;
      $car->interior = $request->interior;
      $car->hpkw = $request->hpkw;
      if($request->firstRegistration)
        $car->firstRegistration = $request->firstRegistration;
      if($request->KMs)
        $car->KMs = $request->KMs;
      $car->price = $request->price;
      if($request->hasFile('featuredImage')){
        $image = $request->file('featuredImage');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        File::exists(public_path() . '/images/cars') or File::makeDirectory(public_path() . '/images/cars', 0777, true);
        $location = public_path('images/cars/' . $filename);
        Image::make($image)->fit(800, 500)->save($location);

        $car->featuredimage = $filename;
      }

      // $gallery_images = $request->file('file');
      $gallery_count = 0;
      $gallery_string = '';

      if($request->file){
        foreach($request->file as $gi){
          var_dump($gi);
          $filename = $gallery_count++ . time() . '.' . $gi->getClientOriginalExtension();
          File::exists(public_path() . '/images/cars/' . $car->id . '/') or
            File::makeDirectory(public_path() . '/images/cars/' . $car->id . '/', 0777, true);
          $location = public_path('images/cars/' . $car->id . '/' . $filename);
          Image::make($gi)->fit(800, 500)->save($location);
          $gallery_string .= $filename . ';';
        }
        $car->galleryimages = $gallery_string;
      }


      $car->save();
      Session::flash('success', 'This car was successfully updated.');

      return redirect()->route('cars.list');
    }

    // $tmp_files = [];
    public function uploadGallery(Request $request) {
        // global $tmp_files;
        // $fs = new Filesystem();
        $tmp_dir = public_path() . '/images/cars/tmp';
        $image = $request->file('qqfile');
        $filename = 'FIN' . $request->qquuid . '.' . $image->getClientOriginalExtension();
        File::exists($tmp_dir) or File::makeDirectory($tmp_dir, 0777, true);
        // $fs->cleanDirectory($tmp_dir);
        $location = $tmp_dir . '/' . $filename;
        Image::make($image)->save($location);
        array_push($this->tmp_files, $location);

        $msg = ['success' => true];
        $ret_msg = json_encode($msg);
        return $ret_msg;
        // return $this->tmp_files;
        // return json_encode(['success' => true]);

        // return Response::json(['success' => true], 200);
        // return $ret_msg;
        // echo 'REQUEST: ' . $request;
        // die();
        // $photos = $request->file('file');
        // dd($photos);

        // if (!is_array($photos)) {
        //     $photos = [$photos];
        // }
        //
        // if (!is_dir($this->photos_path)) {
        //     mkdir($this->photos_path, 0777);
        // }

        // for ($i = 0; $i < count($photos); $i++) {
        //     $photo = $photos[$i];
        //     $name = sha1(date('YmdHis') . str_random(30));
        //     $save_name = $name . '.' . $photo->getClientOriginalExtension();
        //     $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
        //
        //     Image::make($photo)
        //         ->resize(250, null, function ($constraints) {
        //             $constraints->aspectRatio();
        //         })
        //         ->save($this->photos_path . '/' . $resize_name);
        //
        //     $photo->move($this->photos_path, $save_name);
        //
        //     $upload = new Upload();
        //     $upload->filename = $save_name;
        //     $upload->resized_name = $resize_name;
        //     $upload->original_name = basename($photo->getClientOriginalName());
        //     $upload->save();
        // }
        // return Response::json([
        //     'message' => 'Image saved Successfully'
        // ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c = Car::find($id);
        $c->delete();
        Session::flash('success', 'This car was successfully deleted.');
        return redirect('/admin');
    }
}

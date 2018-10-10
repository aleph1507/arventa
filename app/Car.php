<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    public $fillable = ['VIN', 'model', 'brand_id', 'engineType', 'shortAccessories',
      'fuelType', 'gearboxType', 'registrationYear', 'price',
      'netprice', 'mileage', 'motorCapacity', 'powerBHP', 'powerKW',
      'discountPercent', 'consumptionLiters', 'originCountry',
      'emmisionClass', 'vehicleType', 'status', 'exteriorColor',
      'interiorColor', 'additionalEquipment', 'furtherEquipment',
      'featuredImage', 'galleryImages'];

    public function brand() {
      return $this->belongsTo('App\Brand');
    }
}

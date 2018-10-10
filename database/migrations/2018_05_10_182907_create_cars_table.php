<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('VIN')->nullable();
            $table->string('model')->nullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->enum('engineType', ['GTD', 'TDI', 'V6', 'V8'])->nullable();
            $table->string('shortAccessories')->nullable();
            $table->enum('fuelType', ['Diesel', 'Petrol', 'Hybrid'])->nullable();
            $table->enum('gearboxType', ['Automatic', 'Manual'])->nullable();
            $table->integer('registrationYear')->nullable();
            $table->double('price', 9, 2)->nullable();
            $table->double('netprice', 9, 2)->nullable();
            $table->integer('mileage')->nullable();
            $table->double('motorCapacity')->nullable();
            $table->double('powerBHP')->nullable();
            $table->double('powerKW')->nullable();
            $table->integer('discountPercent')->nullable();
            $table->double('consumptionLiters')->nullable();
            $table->string('originCountry')->nullable();
            $table->enum('emmisionClass', ['Euro 6', 'Euro 5', 'Euro 4', 'Euro 3', 'Euro 2', 'Euro 1']);
            $table->string('vehicleType')->nullable();
            $table->string('status')->nullable();
            $table->string('exteriorColor')->nullable();
            $table->string('interiorColor')->nullable();
            $table->text('additionalEquipment')->nullable();
            $table->text('furtherEquipment')->nullable();
            $table->string('featuredImage')->nullable();
            $table->text('galleryImages')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('cars', function (Blueprint $table) {
            // $table->dropForeign('cars_brand_id_foreign');
            // $table->dropIfExists('brand_id');
        // });
        Schema::dropIfExists('cars');
    }
}

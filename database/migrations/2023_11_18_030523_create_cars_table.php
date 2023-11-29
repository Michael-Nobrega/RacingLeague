<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string("brand");
            $table->string("model");
            $table->integer("year");
            $table->string("image");
            $table->timestamps(0);
        });

        $cars = [
            ["brand" => "Porsche", "model" => "911 GT3 RS", "year" => 2003, "image" => "911-GT3-RS.png"],
            ["brand" => "Chevrolet", "model" => "Corvette C7 Stingray", "year" => 2014, "image" => "Corvette-C7-Stingray.png"],
            ["brand" => "Nissan", "model" => "GTR Nismo", "year" => 2015, "image" => "GTR-NISMO-2015.png"],
            ["brand" => "BMW", "model" => "M4 Coupe", "year" => 2014, "image" => "M4-Coupe.png"],
            ["brand" => "Ford", "model" => "Mustang", "year" => 2015, "image" => "Mustang-2015.png"],
            ["brand" => "Audi", "model" => "R8 V10 Plus", "year" => 2009, "image" => "R8-V10-Plus.png"],
            ["brand" => "Mercedes", "model" => "SLS AMG", "year" => 2010, "image" => "SLS-AMG.png"],
        ];

        foreach ($cars as $car) {
            DB::table('cars')->insert($car);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

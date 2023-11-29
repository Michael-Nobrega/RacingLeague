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
            $table->text("description");
            $table->string("image");
            $table->timestamps(0);
        });

        $cars = [
            ["brand" => "Porsche", "model" => "911 GT3 RS", "year" => 2003,"description" => "Released in the summer of 2003, the Porsche 911 GT3 RS was a hyper performance road car that featured incredible power and handling, with the aerodynamic prowess of a true race machine. In fact, the body had much more in common with race cars of the day than even its predecessor","image" => "911-GT3-RS.png"],
            ["brand" => "Chevrolet", "model" => "Corvette C7 Stingray", "year" => 2014,"description" => "The 2014 Corvette features a carbon fiber hood and removable roof panel. Its fenders, doors, and rear quarter panels remain fiberglass composite. The C7 uses Aerogel, a material developed by NASA, to keep heat from the transmission tunnel from transferring into the cabin.","image" => "Corvette-C7-Stingray.png"],
            ["brand" => "Nissan", "model" => "GTR Nismo", "year" => 2015,"description" => "The Nissan GT-R is a car built by Japanese marque Nissan since 2007. It has a 2+2 seating layout and is considered both a sports car and a grand tourer. The engine is front-mid mounted and drives all four wheels. It succeeds the Nissan Skyline GT-R, a faster variant of the Nissan Skyline luxury coupe.","image" => "GTR-NISMO-2015.png"],
            ["brand" => "BMW", "model" => "M4 Coupe", "year" => 2014,"description" => "The BMW M4 is a version of the BMW 4 Series automobile developed by BMW's motorsport division, BMW M, that has been built since 2014. As part of the renumbering that splits the coupé and convertible variants of the 3 Series into the 4 Series","image" => "M4-Coupe.png"],
            ["brand" => "Ford", "model" => "Mustang", "year" => 2015,"description" => "The sixth-generation Ford Mustang (S550) is a pony car that was manufactured by Ford from 2014 until 2023. In departure from prior Mustang models, the sixth-generation Mustang included fully independent rear suspension on all models, as well as an optional 2.3L EcoBoost turbocharged and direct injected four-cylinder engine.","image" => "Mustang-2015.png"],
            ["brand" => "Audi", "model" => "R8 V10 Plus", "year" => 2009,"description" => "The Audi R8 is a mid-engine, 2-seater sports car, which uses Audi's trademark quattro permanent all-wheel drive system. It was introduced by the German car manufacturer Audi AG in 2006.","image" => "R8-V10-Plus.png"],
            ["brand" => "Mercedes", "model" => "SLS AMG", "year" => 2010,"description" => "The Mercedes-Benz SLS AMG is a front mid-engine, 2-seater, limited production grand tourer developed by the Mercedes-AMG division of German automotive manufacturer Mercedes-Benz, with the assistance of David Coulthard.","image" => "SLS-AMG.png"],
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

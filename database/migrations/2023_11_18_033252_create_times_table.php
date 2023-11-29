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
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->foreignId("car_id")->constrained();
            $table->time("lap_time");
            $table->timestamps(0);
        });

        $times = [
            ["user_id" => 5, "car_id" => 2, "lap_time" => "00:02:35"],
            ["user_id" => 7, "car_id" => 1, "lap_time" => "00:02:27"],
            ["user_id" => 4, "car_id" => 1, "lap_time" => "00:02:10"],
            ["user_id" => 5, "car_id" => 6, "lap_time" => "00:02:42"],
            ["user_id" => 5, "car_id" => 4, "lap_time" => "00:01:59"],
            ["user_id" => 6, "car_id" => 3, "lap_time" => "00:02:07"],
            ["user_id" => 7, "car_id" => 5, "lap_time" => "00:02:11"],
            ["user_id" => 6, "car_id" => 7, "lap_time" => "00:02:14"],
            ["user_id" => 3, "car_id" => 6, "lap_time" => "00:02:01"]

        ];
    
        foreach ($times as $time) {
            DB::table('times')->insert($time);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('times');
    }
};

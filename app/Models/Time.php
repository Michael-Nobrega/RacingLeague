<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "car_id", "lap_time"];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function car() {
        return $this->belongsTo(Car::class, "car_id");
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Time;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimesController extends Controller
{
    public function deleteTime(Time $time){
        if (auth()->user()->id === $time["user_id"] || auth()->user()->role === 'admin') {
            $time->delete();
        }
        return redirect("/");
    }

    public function UpdateTime (Time $time, Request $request) {
        if (auth()->user()->id !== $time["user_id"] && auth()->user()->role !== 'admin') {
            return redirect("/profile");
        }

        $incomingFields = $request->validate([
            "user_id" => "required|integer",
            "car_id" => "required|integer",
            "lap_time" => "required|date_format:H:i:s"
        ]);

        $incomingFields["user_id"] = strip_tags($incomingFields["user_id"]);
        $incomingFields["car_id"] = strip_tags($incomingFields["car_id"]);
        $incomingFields["lap_time"] = strip_tags($incomingFields["lap_time"]);

        $time->update($incomingFields);
        return redirect("/profile");
    }

    public function showEditScreen(Time $time, Car $car, User $user){
        if (auth()->user()->id !== $time["user_id"] && auth()->user()->role !== 'admin') {
            return redirect("/profile");
        }
        $cars = Car::all();
        $users = User::all();
    
        return view("edit-time", ["time" => $time, "car" => $car, "cars" => $cars, "users" => $users]);
    }

    public function addTime(Request $request)
    {
        $incomingFields = $request->validate([
            "user_id" => "required",
            "car_id" => "required",
            "lap_time" => "required"
        ]);

        $incomingFields["user_id"] = strip_tags($incomingFields["user_id"]);
        $incomingFields["car_id"] = strip_tags($incomingFields["car_id"]);
        $incomingFields["lap_time"] = strip_tags($incomingFields["lap_time"]);

        Time::create($incomingFields); 

        return redirect("/profile");
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $orderBy = $request->input('order_by', 'asc');
    
        $response = Time::select('times.*')
            ->join('users', 'times.user_id', '=', 'users.id')
            ->join('cars', 'times.car_id', '=', 'cars.id')
            ->where('users.name', 'LIKE', '%' . $search . '%')
            ->orWhere('cars.brand', 'LIKE', '%' . $search . '%')
            ->orWhere('times.lap_time', 'LIKE', '%' . $search . '%')
            ->orderBy('times.lap_time', $orderBy)
            ->get();
    
        return view("search", compact("response"));
    }

    public function viewTimes(){
        $times = Time::all();
        return view('times');
    }

    public function viewTime(Time $time){
        return view("view-time", ["time" => $time]);
    }
}

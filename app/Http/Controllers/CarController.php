<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Car; 

class CarController extends Controller
{
    public function deleteCar(Car $car){
        if (auth()->user()->role === "admin") {
            $car->delete();
        }
        return redirect("/");
    }

    public function UpdateCar(Car $car, Request $request) {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('home')->with('error', 'You do not have permission to update this time entry.');
        }

        $incomingFields = $request->validate([
            "brand" => "required",
            "model" => "required",
            "year" => "required",
            "image" => "required"
        ]);

        $incomingFields["brand"] = strip_tags($incomingFields["brand"]);
        $incomingFields["model"] = strip_tags($incomingFields["model"]);
        $incomingFields["year"] = strip_tags($incomingFields["year"]);
        $incomingFields["image"] = strip_tags($incomingFields["image"]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'img/' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            $incomingFields['image'] = $imageName;
        }

        $car->update($incomingFields);
        return redirect("/");
    }

    public function showEditScreen(Car $car){
        if (auth()->user()->role != "admin") {
            return redirect()->route('home')->with('error', 'You do not have permission to update this time entry.');
        }

        return view("edit-car", ["car" => $car]);
    }

    public function viewCar(Car $car){
        return view("view-car", ["car" => $car]);
    }

    public function addCar(Request $request)
    {
        $incomingFields = $request->validate([
            "brand" => "required",
            "model" => "required",
            "year" => "required",
            "image" => "required"
        ]);

        $incomingFields["brand"] = strip_tags($incomingFields["brand"]);
        $incomingFields["model"] = strip_tags($incomingFields["model"]);
        $incomingFields["year"] = strip_tags($incomingFields["year"]);
        $incomingFields["image"] = strip_tags($incomingFields["image"]);

        Car::create($incomingFields); 

        return redirect("/");
    }

}

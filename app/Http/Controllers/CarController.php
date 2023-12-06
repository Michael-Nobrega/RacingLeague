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
            return redirect()->route('home')->with("msg","You dont have permission to complete this action");
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
        $incomingFields["description"] = strip_tags($incomingFields["description"]);
        $incomingFields["image"] = strip_tags($incomingFields["image"]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'img/' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            $incomingFields['image'] = $imageName;
        }

        $car->update($incomingFields);
        return redirect("/")->with("msg","Car information has been updated");
    }

    public function showEditScreen(Car $car){
        if (auth()->user()->role != "admin") {
            return redirect()->route('home')->with("msg","You dont have permission to view this page");
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
            "image" => "required",
            "description" => "nullable",
        ]);
    
        $incomingFields["brand"] = strip_tags($incomingFields["brand"]);
        $incomingFields["model"] = strip_tags($incomingFields["model"]);
        $incomingFields["year"] = strip_tags($incomingFields["year"]);
        $incomingFields["image"] = strip_tags($incomingFields["image"]);
        $incomingFields["description"] = strip_tags($incomingFields["description"]);
    
        Car::create($incomingFields);
    
        return redirect("/")->with("msg","Car added sucessfully");
    }
    

}

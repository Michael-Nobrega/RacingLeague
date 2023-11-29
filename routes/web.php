<?php

use App\Models\Car;
use App\Models\Time;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TimesController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/profile', function () {
    $times = [];
    $users = [];

    if (auth()->check()) {
        if (auth()->user()->role === 'admin') {
            $times = Time::latest()->get();
        } else {
            $times = auth()->user()->usersTimes()->latest()->get();
        }
    }

    $cars = Car::all();
    $users = User::all();
    return view('profile', compact('times', 'cars', 'users'));
})->name("profile");

Route::post('/registerUser', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/loginUser', [UserController::class, 'login']);


Route::get('/cars', function () {
    $cars = Car::all();
    return view('cars', compact('cars'));
});
Route::post("/add-car", [CarController::class, "addCar"]);
Route::get("/edit-car/{car}", [CarController::class, "showEditScreen"]);
Route::get("/view-car/{car}", [CarController::class, "viewCar"]);
Route::put("/edit-car/{car}", [CarController::class, "UpdateCar"]);
Route::delete("/delete-car/{car}", [CarController::class, "deleteCar"]);

Route::get('/times', function () {
    $times = Time::all();
    return view('times', compact('times'));
});
Route::post("/add-time", [TimesController::class, "addTime"]);
Route::get("/edit-time/{time}", [TimesController::class, "showEditScreen"]);
Route::get("/view-time/{time}", [TimesController::class, "viewTime"]);
Route::put("/edit-time/{time}", [TimesController::class, "UpdateTime"]);
Route::delete("/delete-time/{time}", [TimesController::class, "deleteTime"]);


Route::get('/search', function () {
    $cars = Car::all();
    $times = Time::all();
    return view('search', compact('times', 'cars'));
});
Route::get("/search", [TimesController::class, "search"]);


Route::get('/contacts', function () {
    return view('contacts');
});


Route::get('/', function () {
    $cars = Car::all();
    $times = Time::all();
    return view('home', compact('times', 'cars'));
});


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';*/
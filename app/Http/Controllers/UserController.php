<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    private $users = [
        ["id"=>1, "name"=>"Joao Silva", "email"=>"admin@admin.com", "password"=>"adminAdmin", "role"=>"admin"],
        ["id"=>2, "name"=>"Maria Freitas", "email"=>"Mfreitas@hotmail.com", "password"=>"mariapassword", "role"=>"worker"],
        ["id"=>3, "name"=>"Ricardo Miguel", "email"=>"ricardao@gmail.com", "password"=>"megarick2000", "role"=>"user"],
    ];

    public function login(Request $request){
        $incomingFields = $request->validate([
            "loginName" => "required",
            "loginPassword" => "required"
        ]);

        if (auth()->attempt(["name" => $incomingFields["loginName"], "password" => $incomingFields["loginPassword"]])) { //verificacao se as credenciais estao certas
            $request->session()->regenerate();
        }

        return redirect("/profile");
    }

    public function logout(){
        auth()->logout();
        return redirect("/profile");
    }

    public function register(Request $request){
        $incomingFields = $request->validate([
            "name" => "required",
            "email" => ["required", Rule::unique("users", "email")],
            "password" => ["required","min:8"]
        ]);

        $incomingFields["password"] = bcrypt($incomingFields["password"]);//bcrypt -> encrypta a password
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect("/profile");

        return "Register test";
    }

    public function updateRole(User $user, Request $request) {
        if (auth()->user()->role !== 'admin') {
            return redirect("/profile");
        }
    
        $incomingFields = $request->validate([
            "role" => "required|in:user,admin",
        ]);
    
        $incomingFields["role"] = strip_tags($incomingFields["role"]);
    
        $user->update($incomingFields);
    
        return redirect("/profile")->with("user", $user);
    }

    public function showProfile() {
        $user = auth()->user();
        return view('your.view.name', compact('user'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function login(Request $request){
        $incomingFields = $request->validate([
            "loginName" => "required",
            "loginPassword" => "required"
        ]);

        if (auth()->attempt(["name" => $incomingFields["loginName"], "password" => $incomingFields["loginPassword"]])) { //verificacao se as credenciais estao certas
            $request->session()->regenerate();
        }

        return redirect("/profile")->with("msg","logged in");
    }

    public function logout(){
        auth()->logout();
        return redirect("/profile")->with("msg","Logged Out");
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
        return redirect("/profile")->with("msg","Sucessfully Registered");
    }

    public function updateRole(User $user, Request $request) {
        if (auth()->user()->role !== 'admin') {
            return redirect("/profile")->with("msg","You dont have permission to complete this action");
        }
    
        $incomingFields = $request->validate([
            "role" => "required|in:user,admin",
        ]);
    
        $incomingFields["role"] = strip_tags($incomingFields["role"]);
    
        $user->update($incomingFields);
    
        return redirect("/profile")->with(["user" => $user,"msg" => "User updated Sucessfully",]);;
    }

    public function showProfile() {
        $user = auth()->user();
        return view('/profile', compact('user'));
    }
}

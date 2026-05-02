<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login(Request $request){
        $validated = $request->validate([
            "name"=>"required|string",
            "password"=>"required|string|min:12"
        ]);

        if(Auth::attempt(["name"=>$validated["name"],"password"=>$validated["password"]])){
            $request->session()->regenerate();

            return redirect()->route('home')->with("success","Login succesfully!");
        }

        return redirect()->route('users.login')->with('errors',"Login failed!");
    }

    public function signup(Request $request){
        $validated = $request->validate([
            "name"=>"required|string",
            "password"=>"required|string|min:12"
        ]);

        $user = new User($validated);

        $user->save();

        Auth::login(
            $user
        );

        return redirect()->route('home')->with("success","Login succesfully!");
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("home")->with("success","Logout succesfully");
    }
}

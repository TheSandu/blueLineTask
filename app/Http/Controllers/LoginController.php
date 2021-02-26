<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request)
    {

        $user = User::where([
            ['name', '=', $request->input('name')],
            ['password', '=', $request->input('password')],
        ])->get();

        if( $user->count() == 0 )
            return redirect("/login");

        $request->session()->put('name', $request->input('name'));
        $request->session()->put('password', $request->input('password'));

        return redirect("/validate");
    }
}

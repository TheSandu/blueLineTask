<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Request as InterViewRequest;

class RegistrationController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request)
    {
        $newRequest = new InterviewRequest();

        $newRequest->name = $request->input('firstName');
        $newRequest->lastname = $request->input('lastName');
        $newRequest->date = $request->input('registerDate');
        $newRequest->approved = 0;

        $newRequest->save();

        return redirect("/");
    }
}

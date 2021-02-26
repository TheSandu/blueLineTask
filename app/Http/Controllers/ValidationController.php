<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Request as InterViewRequest;

class ValidationController extends Controller
{
    public function index(Request $request){


        if( !$request->session()->get('name') )
            return redirect("/login");

        $interViewRequest = InterViewRequest::all();

        return view('validate', [
            'interViewRequest' => $interViewRequest,
        ]);
    }

    public function approve(Request $request, $id)
    {
        if( !$request->session()->get('name') )
            return redirect("/login");

        $InterViewRequest = InterViewRequest::find($id);
        $InterViewRequest->approved = 1;
        $InterViewRequest->save();
        
        return redirect("/validate");

    }

    public function unApprove(Request $request, $id)
    {
        if( !$request->session()->get('name') )
            return redirect("/login");

        $InterViewRequest = InterViewRequest::find($id);
        $InterViewRequest->approved = 0;
        $InterViewRequest->save();
        
        return redirect("/validate");
    }
}

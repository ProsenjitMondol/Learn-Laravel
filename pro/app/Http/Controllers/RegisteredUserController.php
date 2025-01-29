<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(){
        // validation
        request()->validate([
            
        ]);
        //create the user
        // log in
        // redirect somewhere
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionCreationController extends Controller
{
    public function create(){
        return view('sessions.login');
    }
    public function store(){
        //Authenticate the user
        if(!auth()->attempt(request(['email', 'password']))){
            return back()->withErrors(['message'=>'Incorrect credentials']);
        }
        return redirect('/');
        //If we found the user, redirect to home page
        //If we couldn't find the user, go back to log in
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use Illuminate\Support\Facades\Auth;
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
        Log::create(['user_id'=>Auth::user()->id, 'log_body'=> sprintf("%s, %s has signed in (%s)", Auth::user()->lastname, Auth::user()->firstname, Auth::user()->email)]);
        return redirect('/');
        //If we found the user, redirect to home page
        //If we couldn't find the user, go back to log in
    }

    public function destroy(){
        auth()->logout();
        return redirect('/');
    }
}

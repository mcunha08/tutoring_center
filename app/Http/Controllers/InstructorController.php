<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function supersecret(){
        //If instructor take them to super secret page
//        dd(auth()->user());
        if(auth()->check())
        {
            if(auth()->user()->role_id == 3){
                return view('instructors.super_secret');
            }
        }

            //If not instructor, go to home page

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Log;
class InstructorController extends Controller
{
    public function supersecret(){
        //If instructor take them to super secret page
//        dd(auth()->user());
        if(auth()->check())
        {
            if(auth()->user()->role_id == Role::where('name', 'Instructor')->first()->id){
                $all_logs = Log::all();
                return view('instructors.super_secret',compact('all_logs'));
            }
        }

            //If not instructor, go to home page

        return redirect('/');
    }
}

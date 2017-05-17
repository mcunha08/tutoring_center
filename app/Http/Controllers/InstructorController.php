<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Log;
use App\User;
class InstructorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function supersecret(){
        //If instructor take them to super secret page

            if(auth()->user()->role_id == Role::where('name', 'Instructor')->first()->id){
                $all_logs = Log::all();
                return view('instructors.super_secret',compact('all_logs'));
            }
            //If not instructor, go to home page

        return redirect('/');
    }
    public function supersecret_tutor_search(){
        $search_string = request('namesearch');
        $role_id = Role::where('name', 'Tutor')->first()->id;
        $type = 'Tutor';
        $results = User::where('lastname', 'like', '%' . request('namesearch') .'%')->where('role_id', $role_id)->get();
        return view('instructors.super_secret_search_results', compact('search_string', 'type', 'results', 'role_id'));
    }
    public function supersecret_student_search(){
        $search_string = request('namesearch');
        $role_id = Role::where('name', 'Student')->first()->id;
        $type = 'Student';
        $results = User::where('lastname', 'like', '%' . request('namesearch') .'%')->where('role_id', $role_id)->get();
        return view('instructors.super_secret_search_results', compact('search_string', 'type', 'results', 'role_id'));
    }

}

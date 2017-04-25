<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class TutorController extends Controller
{
    public function list(){
        //Where role_id = Tutor
        //TODO this is really low level
        $tutors = User::all()->where('role_id', 1);
//        dd($tutors);
        return view('tutors.tutor_list', compact('tutors'));
    }
    public function show($id){
        $user = User::find($id);
        return view('tutors.show',compact('user'));
    }
    public function store(){
//        dd(request()->all());
        $user = User::find(request('userid'));
        $user->rating = request('rating');
        $user->save();
        $tutors = User::all()->where('role_id', 1);
        return view('tutors.tutor_list', compact('tutors'));
    }

}

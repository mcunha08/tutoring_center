<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Log;
use Illuminate\Support\Facades\Auth;
class TutorController extends Controller
{
    public function list(){
        //Where role_id = Tutor
        //TODO this is really low level
        $tutors = User::all()->where('role_id', Role::where('name', 'Tutor')->first()->id);
//        dd($tutors);
        return view('tutors.tutor_list', compact('tutors'));
    }
    public function show($id){
        $user = User::find($id);
        return view('tutors.show',compact('user'));
    }
    public function store(){
        if(auth()->check()) {
            return redirect('/');
        }
        $user = User::find(request('userid'));
        $user->rating = request('rating');
        $user->save();
        $tutors = User::all()->where('role_id', Role::where('name', 'Tutor')->first()->id);
        Log::create(['user_id'=>Auth::user()->id, 'log_body'=> sprintf("%s, %s has updated %s, %s's rating (%s)", Auth::user()->lastname, Auth::user()->firstname, $user->lastname, $user->firstname, Auth::user()->email)]);
        return view('tutors.tutor_list', compact('tutors'));
    }

}

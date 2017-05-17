<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Log;
class AccountCreationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create(){
        return view('account_creation.register');
    }
    public function store(){
        //Create a new user
        if(!ends_with(request('email'),'wou.edu')){
            return back()->withError(['message'=>'Only WOU emails are allowed']);
        }
        if(request()->hasFile('profile_picture')) {
            $file = request()->file('profile_picture')->store('public');
        }
        else{
            return back()->withErrors(['message'=>'Please upload your student id']);
        }
        $user = User::create([
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'location' => request('location'),
            'email' => request('email'),
            'majors' => request('majors'),
            'password' => bcrypt(request('password')),
            'profile_picture' => $file,
            'role_id' => DB::table('roles')->where('name', request('type'))->first()->id,
            'rating' => 0
        ]);
        $user->save();
        Log::create(['user_id'=>$user->id, 'log_body'=> sprintf("%s, %s has created an account (%s)", $user->lastname, $user->firstname, $user->email)]);
        //Redirect to home page
        return redirect('/');
    }
}

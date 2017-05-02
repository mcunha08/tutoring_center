<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
class AccountCreationController extends Controller
{
    public function create(){
        return view('account_creation.register');
    }
    public function store(){
        //Create a new user
        if(!ends_with(request('email'),'wou.edu')){
            return back()->withError(['message'=>'Only WOU emails are allowed']);
        }
        $user = User::create([
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'location' => request('location'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'role_id' => DB::table('roles')->where('name', request('type'))->first()->id,
            'rating' => 0
        ]);
        $user->save();
        //Redirect to home page
        return redirect('/');
    }
}

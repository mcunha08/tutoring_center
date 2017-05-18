<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
//use App\Http\Requests\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Log;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
//        dd($data);
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
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'location' => $data['location'],
            'email' => $data['email'],
            'majors' => $data['majors'],
            'password' => bcrypt($data['password']),
            'date_of_birth' => $data['birth_date'],
            'profile_picture' => $file,
            'role_id' => DB::table('roles')->where('name', $data['type'])->first()->id,
            'rating' => 0
        ]);
        $user->save();
        Log::create(['user_id'=>$user->id, 'log_body'=> sprintf("%s, %s has created an account (%s)", $user->lastname, $user->firstname, $user->email)]);
        return $user;
        //Redirect to home page

    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
//        event(new Registered($user = $this->create($request->all())));
//        dd($user);
//        dd($request->all());
//        dd(request()->profile_picture);

        $user = $this->create($request->all());
        return redirect('/');
//        Auth::login($user);
//        $this->guard()->login($user);
//        return $this->registered($request, $user)
//            ?: redirect($this->redirectPath());

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Log;
use Illuminate\Support\Facades\Auth;
use Mail;
use Storage;
use DB;
use Carbon\Carbon;
class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tutor_list(){
        //Where role_id = Tutor
        //TODO this is really low level
        $tutors = User::all()->where('role_id', Role::where('name', 'Tutor')->first()->id);
//        dd($tutors);
        return view('tutors.tutor_list', compact('tutors'));
    }
    public function show($id){
        $user = User::find($id);
//        dd($user);
//        dd( Storage::disk('local')->url($user->profile_picture) );
        return view('tutors.show',compact('user'));
    }
    public function edit_profile(){
        return view('tutors.edit_profile');
    }
    public function update_profile(){
        $user = User::find(Auth::id());
        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->location = request('location');
        $user->email = request('email');
        $user->majors = request('majors');
        $user->availability = request('availability');
        $user->calendar = request('calendar_link');
        if(request()->hasFile('profile_picture')) {
            $file = request()->file('profile_picture')->store('public');
        }
        else{
            return back()->withErrors(['message'=>'Please upload your student id']);
        }
        $user->profile_picture = $file;
        $user->first_date_of_attendance = request('first_date_of_attendance');
        $user->save();
        return redirect('/tutors_list/' . Auth::user()->id);
    }
    public function email_tutor_show($id){
        $user = User::find($id);
        return view('tutors.email_tutor',compact('user'));
    }
    public function email_tutor_send(){
        $user = User::find(request('tutor_id'));
        $student = Auth::user();
        $subject = request('subject');
        $body = request('body');
        Mail::send('emails.schedule_appointment', ['student' => $student, 'body' => $body], function ($m) use ($user, $subject) {
            $m->from('woututorcen@gmail.com', 'Tutoring Center');
            $m->to($user->email, $user->firstname)->subject($subject);
        });
        return redirect('/tutors_list/' . $user->id);
    }
    public function store()
    {
        $rating = floatValue(request('rating'));
        $rating_entry = DB::table('usersratings')->where('tutor_id', request('userid'))->where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->first();
        if(!is_null($rating_entry)){
            $rating_date = Carbon::parse($rating_entry->created_at);
            $now = Carbon::now();
            if($now->diffInHours($rating_date) < 24){
                return back()->withErrors("You can only provide a rating once every 24 hours");
            }
        }
        if(request('rating') < 0 || request('rating') > 10){
            return back()->withErrors("Rating must be between 0 and 10");
        }
        DB::table('usersratings')->insert(
            ['user_id' => Auth::user()->id, 'tutor_id' => request('userid'), 'rating' => request('rating'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        );
        $user = User::find(request('userid'));


        $user->rating = DB::table('usersratings')
            ->where('tutor_id', request('userid'))
            ->avg('rating');

        $user->save();
        $tutors = User::all()->where('role_id', Role::where('name', 'Tutor')->first()->id);
        Log::create(['user_id' => Auth::user()->id, 'log_body' => sprintf("%s, %s has updated %s, %s's rating (%s)", Auth::user()->lastname, Auth::user()->firstname, $user->lastname, $user->firstname, Auth::user()->email)]);
        return view('tutors.tutor_list', compact('tutors'));
    }

}

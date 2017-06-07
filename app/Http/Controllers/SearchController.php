<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(){
        $locations = User::select('location')->groupby('location')->get();
        $majors = User::select('majors')->groupby('majors')->get();
        return view('searches.search',compact('locations'), compact('majors'));
    }
    public function name_search(){
        if(empty(request('locationlist'))){
            request()->locationlist = '%';
        }
        if(empty(request('majorlist'))){
            request()->majorlist = '%';
        }
//        dd(request()->all());
//        $tutors = User::where('lastname', 'like', null . '%')->where('location', 'like', request()->locationlist)->where('majors', 'like', request()->majorlist)->where('rating', '>=', request('ratingsearch'))->where('availability', 'like', '%' . request('availability') . '%')->get();
//        dd($tutors);
        $tutors = User::where('lastname', 'like', request("namesearch") . '%')->where('location', 'like', request()->locationlist)->where('majors', 'like', request()->majorlist)->where('rating', '>=', request('ratingsearch'))->where('availability', 'like', '%' . request('availability') . '%')->get();
//        dd($tutors);
        return view('searches.search_results', compact('tutors'));
    }
}

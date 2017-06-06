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
//        dd($locations);
        return view('searches.search',compact('locations'));
    }
    public function name_search(){
//        dd(request()->all());
        if(empty(request('locationlist'))){
            request()->locationlist = '%';
        }
        $tutors = User::where('lastname', 'like', request("namesearch") . '%')->where('location', 'like', request()->locationlist)->where('rating', '>=', request('ratingsearch'))->where('availability', 'like', '%' . request('availability') . '%')->get();
        return view('searches.search_results', compact('tutors'));
    }
}

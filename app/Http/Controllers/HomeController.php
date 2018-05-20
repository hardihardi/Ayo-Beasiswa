<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale('id');
        $beasiswa = Scholarship::with(['user', 'facilitator', 'categories', 'facilitator.User'])->orderby('created_at', 'desc')->take(3)->get();
        return view('home', ["beasiswas"=> $beasiswa]);
    }

    public function single($name){
        $beasiswa = Scholarship::with(['user','facilitator','categories'])->where('str_slug', $name)->first();
        return view('single', ["beasiswa" => $beasiswa]);
    }

}

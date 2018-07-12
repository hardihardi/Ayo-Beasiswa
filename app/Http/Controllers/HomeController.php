<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
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
        $beasiswa = Scholarship::with(['user', 'facilitator', 'categories', 'facilitator.User'])->where('status', 1)->orderby('created_at', 'desc')->take(3)->get();
        return view('home', ["beasiswas"=> $beasiswa]);
    }

    public function show(){
        return view('scholarship', ["beasiswas" => Scholarship::all()]);
    }

    public function single($name){
        $beasiswa = Scholarship::with(['user','facilitator','categories'])->where('str_slug', $name)->first();
        return view('single', ["beasiswa" => $beasiswa]);
    }

    public function kategori($kategori){
        try{
            $beasiswa = Category::with(['scholarships', 'scholarships.user', 'scholarships.facilitator'])->where('judul', $kategori)->first();
            // dd($beasiswa->scholarships[0]);
            return view('category', ["judul" => $beasiswa->judul, "konten" => $beasiswa->konten, "alamat_gambar" => $beasiswa->alamat_gambar , "beasiswas" => $beasiswa->scholarships]);
        }catch(Exception $ex){
            dd("not found");
        }
    }

     public function getAll(){
        try{
             $beasiswa = Scholarship::with(['user', 'facilitator', 'categories', 'facilitator.User'])->where('status', 1)->orderby('created_at', 'desc')->get();
            // dd($beasiswa->scholarships[0]);
            return view('category', ["beasiswas" => $beasiswa]);
        }catch(Exception $ex){
            dd("not found");
        }
    }

}

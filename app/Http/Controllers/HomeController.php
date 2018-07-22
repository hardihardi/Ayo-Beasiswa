<?php

namespace App\Http\Controllers;

use Alert;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('home', ["beasiswas"=> $beasiswa, "kategori" => Category::all()]);
    }

    public function show(){
        return view('scholarship', ["beasiswas" => Scholarship::all()]);
    }

    public function single($name){
        $beasiswa = Scholarship::with(['user','facilitator','categories'])->where('str_slug', $name)->first();
        $data  =Carbon::setLocale('id');
        return view('single', ["beasiswa" => $beasiswa]);
    }

    public function kategori($kategori){
        try{
            $beasiswa = Category::with(['scholarships', 'scholarships.user', 'scholarships.facilitator'])->where('judul', $kategori)->first();
            // dd($beasiswa->scholarships[0]);
            return view('category', ["judul" => $beasiswa->judul, "konten" => $beasiswa->konten, "alamat_gambar" => $beasiswa->alamat_gambar , "beasiswas" => $beasiswa->scholarships, "kategori" => Category::all()]);
        }catch(Exception $ex){
            dd("not found");
        }
    }

     public function getAll(){
        try{
             $beasiswa = Scholarship::with(['user', 'facilitator', 'categories', 'facilitator.User'])->where('status', 1)->orderby('created_at', 'desc')->get();
            // dd($beasiswa->scholarships[0]);
            return view('category', ["beasiswas" => $beasiswa, "kategori" => Category::all()]);
        }catch(Exception $ex){
            dd("not found");
        }
    }

    public function cari(request $request){
         try{
            $keyword = ($request->kata_kunci != null) ? $request->kata_kunci  : "";
            $tanggal = ($request->tanggal != null) ? $request->tanggal  : Carbon::now()->addyear(1);
            $kategori = ($request->kategori != "semua") ? $request->kategori  : "";
            $cari = DB::table('scholarships')
                ->leftjoin('category_scholarships', 'scholarships.id', '=', 'category_scholarships.scholarship_id')
                ->join('categories', 'categories.id', '=', 'category_scholarships.category_id')
                ->join('facilitators', 'facilitators.id', '=', 'scholarships.facilitator_id')
                ->distinct()
                ->where('scholarships.nama_beasiswa', 'like', '%'.$keyword.'%')->whereDate('scholarships.masa_berlaku', '<=', $tanggal)->where('categories.judul', 'like', '%'.$kategori.'%')->select('scholarships.*', 'facilitators.nama_instansi')->get();
            // dd($cari);
            return view('category', ["beasiswas" => $cari, "kategori" => Category::all()]);
        }catch(Exception $ex){
            dd("not found");
        }
    }

}

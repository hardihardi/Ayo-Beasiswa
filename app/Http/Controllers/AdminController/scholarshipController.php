<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Models\Facilitator;
use App\Http\Requests;
use App\Models\Category;


class scholarshipController extends Controller
{
    public function index(){
    	$beasiswa = Scholarship::with(['user', 'facilitator', 'categories'])->get();
    	// dd($beasiswa);
    	// return view('admin.list', ["beasiswas" => $beasiswa]);
         return view('admin.listScholarship', ["beasiswas" => $beasiswa]);
    }

    public function create(){
          $kategori = Category::all();
    	return view('admin.createScholarship',["kategoris" => $kategori]);
    }

     public function store(Request $request){
     	$facilitator  = Facilitator::where('user_id', $request->user()->id)->first();
     	// dd($facilitator->id);
    	$beasiswa = new Scholarship;
    	$beasiswa->nama_beasiswa = $request->beasiswa;
    	$beasiswa->nama_instantsi = $request->instusi;
    	$beasiswa->quota = $request->quota;
    	$beasiswa->masa_berlaku = $request->date;
    	$beasiswa->konten = $request->Description;
    	$beasiswa->facilitator_id = $facilitator->id;
    	$beasiswa->str_slug = str_slug($request->beasiswa);
    	 if($request->file('logo')){
    	 	
            $file = $request->file('logo');   
            $destinationPath = 'img/img_ss';
            $name = $request->beasiswa.".". $file->getClientOriginalExtension();
            $name = trim($name);
            $file->move($destinationPath,$name);
            $beasiswa->alamat_gambar = "http://ayobeasiswa.me/img/img_ss/". trim($name);
        }
    	$beasiswa->save();

        if($request->kategori != []){
            foreach ($request->kategori as $kategori) {
                if($beasiswa == null)
                    return response()->json(['error' => 'data not found']);

                $kategori = Category::where('judul', $kategori)->first();
                // dd($beasiswa->id);
                $beasiswa->categories()->attach($kategori);
            }
        }
        $beasiswa = Scholarship::with(['user', 'facilitator', 'categories'])->get();
        return view('admin.listScholarship', ["beasiswas" => $beasiswa]);
    }

    public function show($id){
    	$beasiswa = Scholarship::with(['user', 'facilitator', 'categories'])->where('id', $id)->first();
      

    	// dd($beasiswa);
    	
    	return view('admin.singleScholarship', ["beasiswas" => $beasiswa]);
    }

      public function edit($id){
         $kategori_array = [];
         $beasiswa = Scholarship::with(['user', 'facilitator', 'categories'])->where('id', $id)->first();
         $kategori = $beasiswa->categories;
         foreach ($kategori as $kategori) {
             array_push($kategori_array, $kategori->judul);
         }
         $kategori = Category::all();
        // dd($kategori_array);
        return view('admin.updateScholarship', ["beasiswas" => $beasiswa,"kategoris" => $kategori, 'kategori_array' => $kategori_array]);
    }

    public function update(request $request, $id){
       $beasiswa = Scholarship::find($id);
        $beasiswa->nama_beasiswa = $request->beasiswa;
        $beasiswa->nama_instantsi = $request->instusi;
        $beasiswa->quota = $request->quota;
        $beasiswa->masa_berlaku = $request->date;
        $beasiswa->konten = $request->Description;
        $beasiswa->str_slug = str_slug($request->beasiswa);
         if($request->file('logo')){
            
            $file = $request->file('logo');   
            $destinationPath = 'img/img_ss';
            $name = $request->beasiswa.".". $file->getClientOriginalExtension();
            $file->move($destinationPath,trim($name));
            $beasiswa->alamat_gambar = "http://ayobeasiswa.me/img/img_ss/". trim($name);
        }
       $beasiswa->save();
        $beasiswa->categories()->detach();
        if($request->kategori != []){

            foreach ($request->kategori as $kategori) {
                if($beasiswa == null)
                    return response()->json(['error' => 'data not found']);

                $kategori = Category::where('judul', $kategori)->first();
                // dd($beasiswa->id);

                $beasiswa->categories()->attach($kategori);
            }
        }
       return view('admin.singleScholarship', ["beasiswas" => $beasiswa]);   }

        public function delete($id){
       $beasiswa = Scholarship::find($id);
        $beasiswa->delete();
       $beasiswa = Scholarship::with(['user', 'facilitator', 'categories'])->get();
          return view('admin.listScholarship', ["beasiswas" => $beasiswa]);
    }

}

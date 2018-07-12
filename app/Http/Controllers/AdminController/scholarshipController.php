<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Models\Facilitator;
use App\Http\Requests;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Helper\Upload;
use Validator;

class scholarshipController extends Controller
{
    public function index(){
        $beasiswa = Auth::user()->facilitator->Scholarships()->with(['user', 'facilitator', 'categories'])->get();
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
    	$beasiswa->quota = $request->quota;
    	$beasiswa->masa_berlaku = $request->date;
    	$beasiswa->konten = $request->description;
    	$beasiswa->facilitator_id = $facilitator->id;
        $beasiswa->str_slug = str_slug($request->beasiswa);
         $logo = $request->image_data;
        //1. mengambil request dari form yang sudah diubah menajadi base64 oleh javascript cropit.js
        //2. melakukan validasi apakah ada data dari hasil encode
        //3. memanggil fungsi changeBae64 dengan parameter -> data encode -> direktori folder tujuan -> nama file  
          if($logo !== null){
            $name = $request->beasiswa;
            $logo = Upload::changeBase64($request->image_data, 'public/facilitators/'.$facilitator->token_facilitator. "/beasiswa" , $name); 
            $beasiswa->alamat_gambar  =  $logo;
          }


        if($request->berkas != [] ){
            foreach ($request->berkas as $berkas) {
                if( $berkas == "berkas_lain"){
                        $data_lain[$request->berkas_lain] = 1;
                        $beasiswa->$berkas = json_encode($data_lain);
                    }else
                        $beasiswa->$berkas = 1;
            }
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


     
        return redirect('setting/list');
    }

    public function show($id){
    	$beasiswa = Scholarship::with(['user', 'facilitator', 'categories'])->where('str_slug', $id)->first();
      

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
    //    dd($beasiswa->facilitator);
        $beasiswa->nama_beasiswa = $request->beasiswa;
        $beasiswa->quota = $request->quota;
        $beasiswa->masa_berlaku = $request->date;
        $beasiswa->konten = $request->Description;
        $beasiswa->str_slug = str_slug($request->beasiswa);
        $logo = $request->image_data; 
        if($logo !== null){
          $name = str_slug($request->beasiswa).".jpg";
          $logo = Upload::changeBase64($request->image_data, 'public/facilitators/'.$beasiswa->facilitator->token_facilitator.'/beasiswa', $name); 
        }
        $data_lain = [];
        $beasiswa->status = ($request->status == "on")? 1 : 0;
         $berkas_array = ["berkas_diri", "ijazah", "organisasi","sp_beasiswa","berkas_keluarga","berkas_lain"];
         if($request->berkas != [] ){
            foreach ($berkas_array as $berkas) {
                if(in_array($berkas, $request->berkas)){
                    if( $berkas == "berkas_lain"){
                        $data_lain[$request->berkas_lain] = 1;
                        $beasiswa->$berkas = json_encode($data_lain);
                    }else
                        $beasiswa->$berkas = 1;
                }else 
                    $beasiswa->$berkas = 0;
            }
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
        return redirect('setting/list');
    }

    public function delete($id){
        $beasiswa = Scholarship::find($id);
        $beasiswa->delete();
        return redirect('setting/list');
    }

}

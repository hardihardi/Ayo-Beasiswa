<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Models\Facilitator;
use App\Http\Requests;


class scholarshipController extends Controller
{
    public function index(){
    	$beasiswa = Scholarship::with(['user', 'facilitator', 'categories'])->get();
    	// dd($beasiswa);
    	// return view('admin.list', ["beasiswas" => $beasiswa]);
         return view('admin.listScholarship', ["beasiswas" => $beasiswa]);
    }

    public function create(){

    	return view('admin.createScholarship');
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
    	 if($request->file('logo')){
    	 	
            $file = $request->file('logo');   
            $destinationPath = 'img/img_ss';
            $name = $request->beasiswa.".". $file->getClientOriginalExtension();
            $name = trim($name);
            $file->move($destinationPath,$name);
            $beasiswa->alamat_gambar = "http://ayobeasiswa.me/img/img_ss/". trim($name);
        }
    	$beasiswa->save();
        return view('admin.createScholarship');
    }

    public function show($id){
    	$beasiswa = Scholarship::with(['user', 'facilitator', 'categories'])->where('id', $id)->first();
    	// dd($beasiswa);
    	
    	return view('admin.singleScholarship', ["beasiswas" => $beasiswa]);
    }

      public function edit($id){
       $beasiswa = Scholarship::with(['user', 'facilitator', 'categories'])->where('id', $id)->first();
        return view('admin.updateScholarship', ["beasiswas" => $beasiswa]);
    }

    public function update(request $request, $id){
       $beasiswa = Scholarship::find($id);
        $beasiswa->nama_beasiswa = $request->beasiswa;
        $beasiswa->nama_instantsi = $request->instusi;
        $beasiswa->quota = $request->quota;
        $beasiswa->masa_berlaku = $request->date;
        $beasiswa->konten = $request->Description;
         if($request->file('logo')){
            
            $file = $request->file('logo');   
            $destinationPath = 'img/img_ss';
            $name = $request->beasiswa.".". $file->getClientOriginalExtension();
            $file->move($destinationPath,trim($name));
            $beasiswa->alamat_gambar = "http://ayobeasiswa.me/img/img_ss/". trim($name);
        }
       $beasiswa->save();
       return view('admin.singleScholarship', ["beasiswas" => $beasiswa]);   }

}

<?php
namespace App\Http\Controllers\UserController;

use Validator;
use Carbon\Carbon;
use App\Models\User;
use App\Http\Helper\Upload;
use App\Models\Scholarship;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class userProfileController extends Controller
{
    
    public function index($user){
    	Carbon::setLocale('id');
        $allows = User::with('scholarship')->where('str_slug', $user)->first();
       	$beasiswa = Scholarship::with(['user', 'facilitator', 'categories', 'facilitator.User'])->where('status', 1)->orderby('created_at', 'desc')->take(3)->get();
       	$pendidikan = ["Sekolah Dasar", "Sekolah Menegah Pertama", "Sekolah Menengah Atas", "Sekolah Menengah Kejuruan", "Kuliah", "Sedang Tidak Bersekolah"]; 



        if($allows->username == Auth::user()->username){
                    // dd(Auth::user()->scholarship);
            return view('userSetting', ["user" => Auth::user(), "pendidikan" => $pendidikan]);
        }
        return view('user', ["user" => $allows, "beasiswas"=> $beasiswa]);
    }

    public function updatepass(Request $request){
    	 $validator = Validator::make(request()->all(), [
        'old_password' => 'required|string|max:50',
        'password' => 'required|string|max:50|confirmed',
         ]);

        if($validator->fails()) {
		return redirect()
		    ->back()
		    ->withErrors($validator->errors());
		}
        if(Hash::check($request->old_password, Auth::user()->password)){
        	Auth::user()->update([
        		"password" => bcrypt($request->password)
        	]);
    	    return redirect()
	        ->back()
	        ->withSuccess(sprintf('File %s has been uploaded.', $updated->username));

        }
        dd("gagal");
    }

     public function update(Request $request){          
        $updated =$request->user();

        $validator = Validator::make(request()->all(), [
        'nama_depan' => 'required|string|max:50',
        'nama_belakang' => 'required|string|max:50',
        'nama_panggilan' => 'required|string|max:50',
        'pendidikan' => 'required|string|max:15',
        'telp' => 'nullable|string|max:20',
        'telp_hp' => 'required|string|max:20',
        'jk' => 'required|string|max:10',
        'provinsi' => 'required|string|max:20',
        'kota' => 'required|string|max:20',
        'kode_pos' => 'required|string|max:15',
        'alamat_1' => 'required|string|max:200',
        'alamat_2' => 'nullable|string|max:200',
         ]);
      
        if($validator->fails()) {
        redirect()
            ->back()
            ->withErrors($validator->errors());
        }
        // dd($request->telp_hp);
       $updated->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'nama_panggilan' => $request->nama_panggilan,
            'pendidikan' => $request->pendidikan,
            'telp' => $request->telp,
            'telp_hp' => $request->telp_hp,
            'jenis_kelamin' => $request->jk,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'alamat_1' => $request->alamat_1,
            'alamat_2' => $request->alamat_2
        ]);
       
        return redirect()
        ->back()
        ->withSuccess(sprintf('File %s has been uploaded.', $updated->username));
    }
    

    public function updateImage(Request $request){
		$logo = $request->image_data;
    	if($logo !== null){
            $name = $request->beasiswa;
            $logo = Upload::changeBase64($request->image_data, 'public/facilitators/'.$facilitator->token_facilitator. "/beasiswa" , $name); 
            $beasiswa->alamat_gambar  =  $logo;
        }
	}

    public function updatefile($id, Request $request){
        // dd($request->file('file'));
        $uploadedFile = $request->file('file');        
        $path = $uploadedFile->storeAs(
            'public/users/'.Auth::user()->token."/files", $id . "." . $request->file('file')->getClientOriginalExtension()
        );
        $file = Auth::user()->update([
            $id => $path
        ]);
        
        return "Berkas berhasil diupdate";
    }

}

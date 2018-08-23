<?php
namespace App\Http\Controllers\UserController;

use Validator;
use Carbon\Carbon;
use App\Models\User;
use App\Http\Helper\Upload;
use App\Models\Scholarship;
use App\Models\Facilitator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;



class userProfileController extends Controller
{
    
    public function index($user){
    	Carbon::setLocale('id');
        $allows = User::with('scholarship')->where('str_slug', $user)->first();
       	if($allows == null){
             return redirect()
            ->back()
            ->withErrors("Tidak Terdapat Data");
        }else {
            $beasiswa = Scholarship::with(['user', 'facilitator', 'categories', 'facilitator.User'])->where('status', 1)->orderby('created_at', 'desc')->take(3)->get();
            $pendidikan = ["Sekolah Dasar", "Sekolah Menegah Pertama", "Sekolah Menengah Atas", "Sekolah Menengah Kejuruan", "Kuliah", "Sedang Tidak Bersekolah"]; 



            if($allows->username == Auth::user()->username){
                        // dd(Auth::user()->scholarship);
                return view('userSetting', ["user" => Auth::user(), "pendidikan" => $pendidikan]);
            }
            return view('user', ["user" => $allows, "beasiswas"=> $beasiswa]);
        }
    }

    public function facilitator($user){
        Carbon::setLocale('id');
        $allows = Facilitator::with('scholarships')->where('str_slug', $user)->first();
        // dd($allows->scholarships[0]->user);
        return view('facilitator', ["data" => $allows]);
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
	        ->withSuccess(sprintf('Password anda telah berhasil diubah.'));

        }
         return redirect()
            ->back()
            ->withErrors(sprintf('Telah terjadi kesalah saat merubah password, silahkan coba kembali.'));
    }

     public function update(Request $request){          
        $updated =$request->user();

        $validator = Validator::make(request()->all(), [
        'nama_depan' => 'required|string|max:50',
        'nama_belakang' => 'required|string|max:50',
        'nama_panggilan' => 'required|string|max:50',
        'pendidikan' => 'required|string|max:30',
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
        return redirect()
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
        ->withSuccess(sprintf('Hi %s Anda Telah melakukan perubahan pada halaman profil anda .', Auth::user()->username));
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
            'public/users/'.Auth::user()->token."/files", $id . "_".Upload::generateRandomString(10) . "." . $request->file('file')->getClientOriginalExtension()
        );
        $file = Auth::user()->update([
            $id => $path
        ]);
        $beasiswa = Auth::user()->scholarship;
        // dd($beasiswa);
        if(isset($beasiswa)){
           foreach ($beasiswa as $data) {
                if($data->pivot->$id != null)
                    $data->pivot->$id = $path;
           }
        }
        
        return "Berkas berhasil diupdate";
    }


    public function deleteFile($berkas, $kategori = "user", $id_scholarship = 0 ){
        try {
          $user = Auth::user();
          
          // dd( $user->scholarships->$berkas);
          if($user){
            if($kategori == "user"){
               $hapus = Storage::delete($user->$berkas);
               if($hapus){
                   $user->$berkas = null;
                   $user->save();
                    foreach($user->scholarship as $beasiswa){
                       $update = $user->scholarship()->updateExistingPivot($beasiswa->id,[$berkas => null]);
                   }
                    // dd($user);
                   return redirect()
                    ->back()
                    ->withSuccess(sprintf('Berkas '.$berkas. ' Berhasil Dihapus', "success"));
               }else {
                   return redirect()
                    ->back()
                    ->withSuccess(sprintf('Berkas '.$berkas. ' Berhasil Dihapus', "success"));
               }  
            }else if($kategori = "facilitator"){
                $user_beasiswa = $user->scholarship->where('id', $id_scholarship)->first();
                  $hapus = Storage::delete($user_beasiswa->pivot->$berkas);
                  if($hapus){
                     $success = $user->scholarship()->updateExistingPivot($id_scholarship,[$berkas => null]);
                     return redirect()
                      ->back()
                      ->withSuccess(sprintf('Berkas '.$berkas. ' Berhasil Dihapus', "success"));
                 }else {
                     return redirect()
                      ->back()
                      ->withSuccess(sprintf('Berkas '.$berkas. ' Berhasil Dihapus', "success"));
                 }  
            }
            else {
              dd("gagal");
            }
          }else {
               return redirect()
                    ->back()
                    ->withErrors(sprintf('Tidak ada data yang terhapus', "success"));
          }
        }catch(Exception $ex){
            dd($ex);
        }
    }

    public function status($id, request $request){
        Carbon::setLocale('id');
        $allows = Auth::user()->scholarship()->where('scholarship_id', $id)->first();
        if($allows == null){
             return redirect('/');
        }else {
          // dd($allows);
            return view('status', ["user" => $allows]);
        }
    }

      public function updateScholar($id, request $request){
         $validator = Validator::make(request()->all(), [
        'file' => 'nullable|file|max:1000000',
         ]);
      
        if($validator->fails()) {
        redirect()
            ->back()
            ->withErrors($validator->errors());
        }
        $berkas_array = ["berkas_diri", "ijazah", "organisasi","sp_beasiswa","berkas_keluarga","berkas_lain", "berkas_pendukung"];
        $array = [];
        $user = Auth::user();
        $array['updated_at'] = Carbon::now();
       if(isset($request->berkas)){

            foreach ($berkas_array as $berkas) {
                if(in_array($berkas, $request->berkas)){
                       $array[$berkas] = $user->$berkas;
                }else 
                     $array[$berkas] = null;
              }
                $uploadedFile = $request->file('file');        
                if($uploadedFile){
                   $path = $uploadedFile->storeAs(
                    'public/facilitators/'.Scholarship::where('id', $id)->first()->facilitator->token_facilitator."/files/".$user->id, $id . "_".Upload::generateRandomString(10) . "." . $request->file('file')->getClientOriginalExtension()
                    );
                    $array["berkas_lain"] = $path;  
                }else {
                  $scholarship = $user->scholarship->where('id', $id)->first();
                  $array["berkas_lain"] = $scholarship->pivot->berkas_lain;  
                }
              $array['updated_at'] = Carbon::now();
            
                  $success = $user->scholarship()->updateExistingPivot($id,$array);
                  return redirect()
                      ->back()
                      ->withSuccess(sprintf('Berkas Anda Telah Di Ubah.', "success"));
        }
        else {
           foreach ($berkas_array as $berkas) {
                     $array[$berkas] = null;
              }
          $success = $user->scholarship()->updateExistingPivot($id,$array);
           return redirect()
                    ->back()
                    ->withSuccess(sprintf('Berkas Anda Telah Di Update %s.', "Success"));  
        }
     }


      public function addScholar($id, request $request){
        $validator = Validator::make(request()->all(), [
        'file' => 'nullable|file|max:1000000',
         ]);
      
        if($validator->fails()) {
        redirect()
            ->back()
            ->withErrors($validator->errors());
        }
        Carbon::setLocale('id');
        $user = Auth::user();
        $array = [];
        $array['created_at'] = Carbon::now();
        $array['updated_at'] = Carbon::now();
        if(isset($request->berkas)){
            foreach($request->berkas as $berkas){
              $array[$berkas] = $user->$berkas;
            }
            $array['created_at'] = Carbon::now();
            $array['updated_at'] = Carbon::now();
            $uploadedFile = $request->file('file');        
              if($uploadedFile){
                 $path = $uploadedFile->storeAs(
                  'public/facilitators/'.Scholarship::where('id', $id)->first()->facilitator->token_facilitator."/files/".$user->id, $id . "_".Upload::generateRandomString(10) . "." . $request->file('file')->getClientOriginalExtension()
                  );
                  $array["berkas_lain"] = $path;  
              }
            if($user->scholarship->where('id_scholarship', $id)->first() == null){
                $success = $user->scholarship()->attach($id,$array);
                return redirect()
                    ->back()
                    ->withSuccess(sprintf('Pendaftaran beasiswa berhasil.'));
            }else {
                  redirect()
                  ->back()
                  ->withErrors(sprintf('Maaf %s.', "Anda Sudah mendaftar"));
            }
        }
        else {
          $success = $user->scholarship()->attach($id,$array);
           return redirect()
                    ->back()
                    ->withSuccess(sprintf('Pendaftaran beasiswa berhasil. harap Lengkapi berkas anda!'));  
        }
     }

    public function cancelSchola($id){
        $beasiswa = Scholarship::where('id', $id)->first();
        $user=  Auth::user()->scholarship()->detach($id);
        if ($user){
              return redirect()
                ->back()
                ->withSuccess(sprintf('Anda telah membatalkan beasiswa %s.', $beasiswa->nama_beasiswa));
            }else {
                return redirect()
                    ->back()
                    ->withErrors("error");
            }
    }

    public function updatePhoto(Request $request){
       $validator = Validator::make(request()->all(), [
        'upload' =>  'mimes:JPEG,jpeg,JPG,jpg,png,PNG|required|max:1000000'
         ]);

        if($validator->fails()) {
          return redirect()
              ->back()
              ->withErrors(sprintf("Masalah Validasi %s ", ':Coba lagi'));
          }

        $user = Auth::user();
        $logo = $request->image_data; 
        if($logo !== null){
            $name = "profile.png";
            $logo = Upload::changeBase64($request->image_data, 'public/users/'. $user->token , $name); 
            $update = $user->img_url =  $logo;
            $user->save();
            if ($update){
              return redirect()
                ->back()
                ->withSuccess(sprintf('Update foto profil berhasil.'));
            }else {
                return redirect()
                    ->back()
                    ->withErrors("error");
            }
        }else   return redirect()
              ->back()
              ->withErrors(sprintf("Masalah Upload %s ", ':Coba lagi'));
         
    }

   
}

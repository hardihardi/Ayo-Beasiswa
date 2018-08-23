<?php

namespace App\Http\Controllers\AdminController;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Email;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\mailBroadcast;
use Validator;


class adminController extends Controller
{
     public function index()
    {
        return view('admin.home');
    }

     public function email(){
        $email = Email::with(['Facilitator'])->get();
        // dd($email);
        return view('SU.listEmail', ["email" => $email]);
    }

    public function sendEmail(Request $request){
    	   $email = Email::with(['Facilitator'])->where('id', $request->id)->first();

    	   if($email->email != []){
           $when = Carbon::now()->addMinutes(1);
         $data = Mail::to(Auth::user()->email)->later($when, new mailBroadcast($email));
         $email->status = 1;
         $email->save();
          return redirect()
              ->back()
              ->withSuccess(sprintf("Berhasil Mengirim Email"));
            }else{
              return redirect()
              ->back()
              ->withErrors(sprintf("Tidak ada email yang tersedia"));
            }
               

    }

    public function addEmail(Request $request){

        $validator = Validator::make(request()->all(), [
        'status_user' => 'required|string',
        'subject' => 'required|string',
        'description' => 'required|string',
         ]);
      
        if($validator->fails()) {
       return redirect()
            ->back()
            ->withErrors($validator->errors());
        }
      $status = $request->status_user;
      $scholarship_id = $request->scholarship_id;
      if ($request->status_user != 'all'){
         $user = User::whereHas('scholarship', function($q) use ($scholarship_id, $status){
              $q->where('user_scholarship.scholarship_id', $scholarship_id)->where('user_scholarship.status', $status);
            })->get();
       }else {
          $user = User::whereHas('scholarship', function($q) use ($scholarship_id){
              $q->where('user_scholarship.scholarship_id', $scholarship_id);
            })->get();
      } 

      $email_array = [];
      foreach($user as $status){
        array_push($email_array,$status->email);
      }
      // dd(Auth::user()->facilitator->emails);
      if($email_array ==[])
            return redirect()
            ->back()
            ->withErrors(sprintf('Tidak Ada Email Pada Pendaftar yang di '. $status));
       $beasiswa = Auth::user()->facilitator->Emails()->create([
      'subject' => $request->subject,
      'konten'  => $request->description,
      'email'   => json_encode($email_array)
      ]);
      if ($beasiswa)
          return redirect()
          ->back()
          ->withSuccess(sprintf('Berhasil Menambahkan Request Email'));
     else 
        return redirect()
            ->back()
            ->withErrors(sprintf('Gagal Menambahkan Request Email'));
      }

     public function getMessages(Request $request){
 	  $email = Email::with(['Facilitator'])->where('id', $request->id)->first();
      $data=  response()->json([
            'subject' => $email->subject,
            'konten' => $email->konten,
            'email' => json_decode($email->email)
        ]);
        echo json_encode($data);
    }
}

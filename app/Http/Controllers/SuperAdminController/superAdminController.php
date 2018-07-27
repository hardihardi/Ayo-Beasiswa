<?php

namespace App\Http\Controllers\SuperAdminController;

use App\Models\Email;
use App\Models\Facilitator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class superAdminController extends Controller
{
    public function index(){
    	return view('SU.super');
    }

    public function activate($id, $status){
    	$facilitator = Facilitator::where('id', $id)->where('status', $status)->first();
    	if($facilitator->status == 1)
    		$facilitator->status = 0;
    	else
    		$facilitator->status = 1;
    	$check = $facilitator->save();
    	if($check)
    		return redirect()
            ->back()
            ->withSuccess(sprintf("Berhasil Merubah Status Fasilitator " . $facilitator->nama_instansi));
        else
        	return  redirect()
                    ->back()
                    ->withErrors(sprintf("Masalah Dalam Mengubah Status"));
    }

    public function delete($id){
    	$facilitator = Facilitator::where('id', $id)->first();
    	if($facilitator){
    		$delete  = Storage::deleteDirectory('public/facilitators/'.$facilitator->token_facilitator . "/");
    		if ($delete){
    			$facilitator->user()->delete();
    			$facilitator->delete();
    			return redirect()
		            ->back()
		            ->withSuccess(sprintf("Berhasil Menghapus"));
    		}else{
    			return redirect()
		            ->back()
		            ->withErrors(sprintf("Gagal Menghapus"));
    		} 
		    		
    	}else {
            return redirect()
                    ->back()
                    ->withErrors(sprintf("Gagal Menghapus"));
        }
    }

       public function deleteEmail($id){
        $email = Email::where('id', $id)->first();
          if($email){
                $email->delete();
                return redirect()
                    ->back()
                    ->withSuccess(sprintf("Berhasil Menghapus"));
            }else{
                return redirect()
                    ->back()
                    ->withErrors(sprintf("Gagal Menghapus"));
            } 
    }

   
}

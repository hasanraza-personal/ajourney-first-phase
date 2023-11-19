<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Mail;
use Redirect;
use File;

class Promotion extends Controller
{
    function addPromotionemail(Request $req){
    	if($req->has('postpromoteemail')){
     		$email = $req->input('postpromoteemail');

			if(DB::table('promotes')->where('promoteemail',$email)->exists()){
				echo 1;
			}else{
				DB::table('promotes')->insert(
					array('promoteemail'=>$email)
				); 
			}
     	}
    	
    	if($req->has('email')){
     		$name = htmlspecialchars($req->input('name'));
     		$email = htmlspecialchars($req->input('email'));
     		$number = htmlspecialchars($req->input('phone'));
     		$message = htmlspecialchars($req->input('message'));
			
			if(DB::table('promotes')->where('promoteemail',$email)->exists()){
				echo 1;
			}else{
				DB::table('promotes')->insert(
					array('promoteemail'=>$email,'name'=>$name,'phone'=>$number,'message'=>$message)
				);
			} 
     	}
    }
  
  	function getPromotionemail(){
		$promotionemail = DB::table('promotes')->get();

		return view('admin.admincheckemail',compact('promotionemail'));
	}
}

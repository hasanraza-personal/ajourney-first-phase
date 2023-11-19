<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Mail;
use Redirect;
use File;

class UserAuth extends Controller
{
    // Google login
    public function redirectToGoogle()
    {
        session()->forget('user');
        return Socialite::driver('google')->redirect();
    }

    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $this->_googleregisterOrLoginUser($user);

        // Return home after Google login
        return redirect('/');
    }

    // Facebook login
    public function redirectToFacebook()
    {
        session()->forget('user');
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook callback
    public function handleFacebookCallback(Request $request)
    {
        if(!$request->has('code') || $request->has('denied')){
            return Redirect::to('login');
        }

        $user = Socialite::driver('facebook')->stateless()->user();
        $img = $user->avatar_original . "&access_token={$user->token}";
        
        $this->_facebookregisterOrLoginUser($user,$img);

        // Return home after Facebook login
        return redirect('/');
    }

    protected function _googleregisterOrLoginUser($data)
    {
        $username = strstr($data->email,'@',true);
        if(DB::table('users')->where('useremail', $data->email)->doesntExist()){
            DB::table('users')->insert(
                array('google_id'=>$data->id,'useremail'=>$data->email,'username'=>$username,'userfullname'=>$data->name,'userprofilephoto'=>$data->avatar)
            ); 
            $profile_picture = DB::table('users')->where('useremail', $data->email)->value('userprofilephoto');
            session()->put('session_username',$username);
            session()->put('session_profilephoto',$profile_picture);
        }else{
            $profile_picture = DB::table('users')->select('userprofilephoto')->where('useremail', $data->email)->first();
            if($profile_picture->userprofilephoto == ""){
                DB::table('users')->where('useremail', $data->email)->update(['userprofilephoto' => $data->avatar]);
            }
            $profile_picture = DB::table('users')->where('useremail', $data->email)->value('userprofilephoto');
            session()->put('session_username',$username);
            session()->put('session_profilephoto',$profile_picture);
        }
    }
    protected function _facebookregisterOrLoginUser($data,$img)
    {
     /*   if($data->email == ""){
            $userfullname = $data->name;
          	$username = strtok($userfullname, " ");
          	$username = $username.rand(1,9999);
        }else{
            $username = strstr($data->email,'@',true);
        }*/
      	$username = strstr($data->email,'@',true);
         if(DB::table('users')->where('username', $username)->doesntExist()){
            DB::table('users')->insert(
                array('facebook_id'=>$data->id,'useremail'=>$data->email,'username'=>$username,'userfullname'=>$data->name,'userprofilephoto'=>$img)
            ); 
            $profile_picture = DB::table('users')->where('username', $username)->value('userprofilephoto');
            session()->put('session_username',$username);
            session()->put('session_profilephoto',$profile_picture);
        }else{
            $profile_picture = DB::table('users')->where('username', $username)->value('userprofilephoto');
            session()->put('session_username',$username);
            session()->put('session_profilephoto',$profile_picture);
        }
    }

    function checkUsername(Request $req){
        $username = htmlspecialchars($req->input('postusername'));
        if(DB::table('users')->where('username', $username)->exists()){
            echo "Username already exist";
        }
    }

    function checkEmail(Request $req){
        $email = htmlspecialchars($req->input('postemail'));
        if(DB::table('users')->where('useremail', $email)->exists()){
            echo "Email already exist";
        }
    }

    function sendVerificationcode(Request $req){
        $name = htmlspecialchars($req->input('postname'));
        $gender = htmlspecialchars($req->input('postgender'));
        $username = htmlspecialchars($req->input('postusername'));
        $email = htmlspecialchars($req->input('postemail'));
        $password1 = htmlspecialchars($req->input('postpassword'));
      	$password = bcrypt($password1);
        $verification_code = htmlspecialchars(rand(1111,9999));
        //Session::flash('test', array('test1', 'test2', 'test3'));
        $req->session()->put('user', array('email'=>$email,'password'=>$password,'username'=>$username,
        'name'=>$name,'password'=>$password,'gender'=>$gender,'verificationcode'=>$verification_code));

        $data = ['name'=>$name,'data'=>'Verify youe email'];
        $user['to'] = $email;
        Mail::send('mail',$data,function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject('Verification of email');
        });
    }

    function signUp(Request $req){
        $verificationcode = htmlspecialchars($req->input('postverificationcode'));

        if($verificationcode == session('user')['verificationcode']){
            if(session('user')['gender'] == "male"){
                $profile_avatar = "images/male.png";
            }else{
                $profile_avatar = "images/female.png";
            }
            DB::table('users')->insert(
                array('useremail'=>session('user')['email'],'userpassword'=>session('user')['password'],
                'username'=>session('user')['username'],'userfullname'=>session('user')['name'],
                'usergender'=>session('user')['gender'],'userprofilephoto'=>$profile_avatar)
            ); 
            $username = session('user')['username'];
            session()->put('session_username',$username);
            session()->put('session_profilephoto',$profile_avatar);
            session()->forget('user');
        }else{
            echo "Code does not matched.";
        }
    }

    function verifyUser(Request $req){
        $req->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $username = htmlspecialchars($req->input('username'));
        $password = htmlspecialchars($req->input('password'));
		/*
        if((($username=="memespace")||($username=="memespace1669@gmail.com"))&&($password=="ViRo98&@(#fhaksv819")){
            $req->session()->put('session_username',$username);
            $req->session()->put('session_profilephoto','/w-images/admin-profile.png');
            return redirect('adminhome');
        }*/

        $user=DB::table('users')->where('username',$username)->orWhere('useremail',$username)->first();
        if(is_null($user)){
            $req->session()->flash('login_error', 'User does not exist');
            return redirect('login');
        }else{
            $social_user = DB::table('users')->where('username', $username)->orWhere('useremail',$username)->first();//Getting FB and Google
            if(($social_user->facebook_id=="")&&($social_user->google_id=="")){//Checking FB and Google
                if(Hash::check($password, $user->userpassword)){//Checking Hash Password
                    $req->session()->put('session_username',$user->username);
                	$req->session()->put('session_profilephoto',$user->userprofilephoto);
                	return redirect('/');
                }else{
                    $req->session()->flash('login_error', 'Username/email or password does not match');
                	return redirect('login');
                }
            }else{
                $req->session()->flash('login_error', 'Social login detected');
              	return redirect('login');
            }
        }
    }

    function recoverPasssword(Request $req){
        $recoveryemail = htmlspecialchars($req->input('postrecoveremail'));
        if(DB::table('users')->where('useremail',$recoveryemail)->exists()){
            $google_facebook = DB::table('users')->select('facebook_id','google_id')->where('useremail',$recoveryemail)->first();
            if(($google_facebook->google_id=="")&&($google_facebook->facebook_id=="")){
                $req->session()->flash('recoveremail',$recoveryemail);
                $startTime = date("Y-m-d H:i:s");
                //add 10 minute to time
                $cenvertedTime = date('Y-m-d H:i:s',strtotime('+10 minutes',strtotime($startTime)));
                
                //$recovery_link = 'http://localhost/ajourney/login/recoverypage?link='.urlencode(base64_encode($cenvertedTime)).'&id='.urlencode(base64_encode($recoveryemail)).'';

                $data = ['data'=>'Recover your account'];
                $user['to'] = $recoveryemail;
                Mail::send('recovermail',$data,function($messages) use ($user){
                    $messages->to($user['to']);
                    $messages->subject('Recover your Account');
                });
                echo "1";
            }else{
                echo "01";
            }
        }else{
            echo "0";
        }
    }
  
  	function changePassword(Request $req){
    	$password = htmlspecialchars($req->input('password'));
      	$email = htmlspecialchars($req->input('email'));
      	$user_encryptedpassword = bcrypt($password);
      	DB::table('users')
        ->where('useremail',$email)
        ->update(['userpassword' => $user_encryptedpassword]);
      	$req->session()->flash('login_error', 'Your Password has been Changed. Please login with your new password');
        return redirect('login');
    }
}

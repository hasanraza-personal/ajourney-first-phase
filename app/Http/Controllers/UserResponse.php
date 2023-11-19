<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic;
use Image;
use Redirect;
use File;
use DateTime;

class UserResponse extends Controller
{
    function likepostResponse(Request $req){
        $session_username = $req->session()->get('session_username');
        $postsrno = $req->input('postsrno');
        $username = $req->input('postusername');

        $userresponse = DB::table('userpostresponses')->select('postlike','postdislike')->where('postresponse_srno',$postsrno)->where('viewerusername', $session_username)->first();
        if(is_null($userresponse)){
            DB::table('userpostresponses')->insert(
                array('postresponse_srno'=> $postsrno,'response_username'=>$username,'viewerusername'=>$session_username,'postlike'=>1,'postdislike'=>0)
            );
            if($username!=$session_username){
                DB::table('usernotifications')->insert(array('notificationpostusername'=>$username,'notificationusername'=>$session_username,'notificationpostsrno'=>$postsrno,'notificationresponce'=>'like','notification_created'=>now(),'notificationread'=>0));
            }

        }else{
            if($userresponse->postdislike=="1"){
                DB::table('userpostresponses')
                ->where('postresponse_srno',$postsrno)->where('viewerusername', $session_username)
                ->update(['postlike' => 1,'postdislike'=>0]);

                if($username!=$session_username){
                    DB::table('usernotifications')
                    ->where([['notificationpostsrno',$postsrno],['notificationusername', $session_username],['notificationcomment',null]])
                    ->update(['notificationresponce' => 'like','notificationread'=>0,'notification_created'=>now()]);
                }
             
            }else{
                DB::table('userpostresponses')->where('postresponse_srno',$postsrno)->where('viewerusername', $session_username)->delete();

                if($username!=$session_username){
                    DB::table('usernotifications')->where([['notificationpostsrno',$postsrno],['notificationusername', $session_username],['notificationcomment',null]])->delete();
                }
            }
        }        
    }
    function dislikepostResponse(Request $req){
        $session_username = $req->session()->get('session_username');
        $postsrno = $req->input('postsrno');
        $username = $req->input('postusername');

        $userresponse = DB::table('userpostresponses')->select('postlike','postdislike')->where('postresponse_srno',$postsrno)->where('viewerusername', $session_username)->first();
        if(is_null($userresponse)){
            DB::table('userpostresponses')->insert(
                array('postresponse_srno'=> $postsrno,'response_username'=>$username,'viewerusername'=>$session_username,'postlike'=>0,'postdislike'=>1)
            );

            if($username!=$session_username){
                DB::table('usernotifications')->insert(array('notificationpostusername'=>$username,'notificationusername'=>$session_username,'notificationpostsrno'=>$postsrno,'notificationresponce'=>'dislike','notification_created'=>now(),'notificationread'=>0));
            }
        }else{
            if($userresponse->postlike=="1"){
                DB::table('userpostresponses')
                ->where('postresponse_srno',$postsrno)->where('viewerusername', $session_username)
                ->update(['postlike' => 0,'postdislike'=>1]);

                if($username!=$session_username){
                    DB::table('usernotifications')
                    ->where([['notificationpostsrno',$postsrno],['notificationusername', $session_username],['notificationcomment',null]])
                    ->update(['notificationresponce' => 'dislike','notificationread'=>0,'notification_created'=>now()]);
                }

            }else{
                DB::table('userpostresponses')->where('postresponse_srno',$postsrno)->where('viewerusername', $session_username)->delete();

                if($username!=$session_username){
                    DB::table('usernotifications')->where([['notificationpostsrno',$postsrno],['notificationusername', $session_username],['notificationcomment',null]])->delete();
                }
            }
        }   
    }
}

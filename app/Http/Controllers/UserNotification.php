<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
use File;
use DateTime;

class UserNotification extends Controller
{
    function postNotification(Request $req){
        $session_username = $req->session()->get('session_username');

        if(DB::table('usernotifications')->where('notificationpostusername', $session_username)->doesntExist()){
            return view('nonotification');
        }

        $notifications = DB::table('usernotifications')->select('*',
        DB::raw("(select userposts.userpost from userposts where userposts.postsrno=notificationpostsrno) as notificationpost"),
        DB::raw("(select users.userprofilephoto from users where users.username=notificationusername) as profile_photo"))
        ->where('notificationpostusername',$session_username)->orderBy('notification_created', 'DESC')->paginate(12);

        if($req->ajax()){
            $view = view('notification-data',compact('notifications'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('notification',compact('notifications')); 
    }

    function NotificationRead(Request $req){
        $session_username = $req->session()->get('session_username');
        DB::table('usernotifications')
        ->where([['notificationpostusername', $session_username],['notificationread','0']])
        ->update(['notificationread' => '1']);
    }
}

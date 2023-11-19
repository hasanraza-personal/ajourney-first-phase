<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Image;
use Redirect;
use File;
use DateTime;

class UserData extends Controller
{
    function mostLiked(Request $req){
        $req->session()->forget('user');
        $session_username = $req->session()->get('session_username');
    
        $posts = DB::table('userpostresponses')
            ->select(DB::raw('postresponse_srno as response_srno,count(postlike) as total_postlike'),
            DB::raw("(select postsrno from userposts where userposts.postsrno=response_srno) as postsrno"),
            DB::raw("(select post_username from userposts where userposts.postsrno=postresponse_srno) as post_username"),
            DB::raw("(select userpost from userposts where userposts.postsrno=postresponse_srno) as userpost"),
            DB::raw("(select created_at from userposts where userposts.postsrno=postresponse_srno) as created_at"),
            DB::raw("(select userfullname from users where users.username=post_username) as userfullname"),
            DB::raw("(select facebook_id from users where users.username=post_username) as facebook_id"),
            DB::raw("(select userprofilephoto from users where users.username=post_username) as userprofilephoto"),
            DB::raw("(select userpostresponses.postdislike from userpostresponses where userpostresponses.postresponse_srno=response_srno AND userpostresponses.viewerusername='$session_username') as postresponse_postdislike"),
            DB::raw("(select userpostresponses.postlike from userpostresponses where userpostresponses.postresponse_srno=response_srno AND userpostresponses.viewerusername='$session_username') as postresponse_postlike"),                    
            DB::raw("(select count(userpostresponses.postdislike) from userpostresponses where userpostresponses.postresponse_srno=response_srno AND userpostresponses.postdislike='1') as total_postdislike"),
            DB::raw("(select count(userpostcomments.commentsrno) from userpostcomments where userpostcomments.postcomment_srno=postresponse_srno) as total_postcomment"))
            ->where('postlike', '=', 1)
            ->orderby('total_postlike','DESC')
            ->groupby('response_srno')
            ->paginate(10);
            
        if($req->ajax()){
            $view = view('data',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        } 
        return view('mostreacted',compact('posts')); 

                   
    }
    function userProfile(Request $req,$id){
        $session_username = $req->session()->get('session_username');
        if($session_username == ""){
            return redirect('login');
        }

        if(DB::table('users')->where('username', $id)->doesntExist()){
          return $id;
            return view('usernotfound'); 
        }

        if(DB::table('userposts')->where('post_username', $session_username)->doesntExist()){
            return view('nopostfound');
        }
       
        $posts = DB::table('userposts')->select("userposts.*",
            DB::raw("(select users.userfullname from users where users.username=post_username) as userfullname"),
            DB::raw("(select users.facebook_id from users where users.username=post_username) as facebook_id"),
            DB::raw("(select users.userprofilephoto from users where users.username=post_username) as userprofilephoto"),
            DB::raw("(select userpostresponses.postresponse_srno from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as srno"),
            DB::raw("(select userpostresponses.response_username from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as postresponse_username"),
            DB::raw("(select userpostresponses.viewerusername from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as postresponse_viewerusername"),
            DB::raw("(select count(userpostresponses.postlike) from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.postlike='1') as total_postlike"),
            DB::raw("(select count(userpostresponses.postdislike) from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.postdislike='1') as total_postdislike"),
            DB::raw("(select count(userpostcomments.commentsrno) from userpostcomments where userpostcomments.postcomment_srno=postsrno) as total_postcomment"),
            DB::raw("(select userpostresponses.postlike from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as postresponse_postlike"),
            DB::raw("(select userpostresponses.postdislike from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as postresponse_postdislike"))
            ->where('post_username',$id)->orderBy('postsrno', 'DESC')->paginate(10);
        
        
        if($req->ajax()){
            $view = view('data',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        } 
        return view('profile',compact('posts')); 
    }

    function uploadPost(Request $request){
        $session_username = $request->session()->get('session_username');

        $file = $request->file('image');
        $x = $request->input('x');
        $y = $request->input('y');
        $width = $request->input('width');
        $height = $request->input('height');

        $file_size = $request->file('image')->getSize();

        $image_name = md5(rand()) . '.jpeg';
        $destinationPath = public_path('/images');

        if($file_size<=512000){
            Image::make($file->getRealPath())->crop($width,$height,$x,$y)->save($destinationPath.'/'.$image_name);
        }else{
            Image::make($file->getRealPath())->crop($width,$height,$x,$y)->save($destinationPath.'/'.$image_name,40);
        }
        DB::table('userposts')->insert(
            array('post_username'=> $session_username,'userpost'=>$image_name,'created_at'=>now())
        );

        return redirect('memes'); 
    }
    function getUserdata(Request $req){
        $req->session()->forget('user');
        $session_username = $req->session()->get('session_username');
       
        $posts = DB::table('userposts')->select("userposts.*",
            DB::raw("(select users.userfullname from users where users.username=post_username) as userfullname"),
            DB::raw("(select users.facebook_id from users where users.username=post_username) as facebook_id"),
            DB::raw("(select users.userprofilephoto from users where users.username=post_username) as userprofilephoto"),
            DB::raw("(select userpostresponses.postresponse_srno from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as srno"),
            DB::raw("(select userpostresponses.response_username from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as postresponse_username"),
            DB::raw("(select userpostresponses.viewerusername from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as postresponse_viewerusername"),
            DB::raw("(select count(userpostresponses.postlike) from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.postlike='1') as total_postlike"),
            DB::raw("(select count(userpostresponses.postdislike) from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.postdislike='1') as total_postdislike"),
            DB::raw("(select count(userpostcomments.commentsrno) from userpostcomments where userpostcomments.postcomment_srno=postsrno) as total_postcomment"),
            DB::raw("(select userpostresponses.postlike from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as postresponse_postlike"),
            DB::raw("(select userpostresponses.postdislike from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as postresponse_postdislike"))
            ->orderBy('postsrno', 'DESC')->Paginate(10);
        
        if($req->ajax()){
            $view = view('data',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        } 
        $maintopic = DB::table('knowledges')->select('maintopic','maintopicphoto')->distinct()->get();
        return view('memes',compact('posts','maintopic')); 
    }
    
    function getknowledgetopic(Request $req){
    $maintopic = DB::table('knowledges')->select('maintopic','maintopicphoto')->distinct()->get();
    return view('meme-kd',compact('maintopic')); 
    }

    function deletePost(Request $req){

        $session_username = $req->session()->get('session_username');

        $delete_postsrno = $req->get('postsrno');
        $post_name = DB::table('userposts')->select('userpost')->where('postsrno',$delete_postsrno)->first();
        $postname = $post_name->userpost;
        $file_path = "images/".$postname;

        if(File::exists($file_path)) {
            File::delete($file_path);
            DB::table('userpostresponses')->where('postresponse_srno',$delete_postsrno)->delete();
            DB::table('userpostcomments')->where('postcomment_srno',$delete_postsrno)->delete();
            DB::table('usernotifications')->where('notificationpostsrno',$delete_postsrno)->delete();
            DB::table('userposts')->where('postsrno',$delete_postsrno)->delete();
            echo "1";
        }else{
            DB::table('userpostresponses')->where('postresponse_srno',$delete_postsrno)->delete();
            DB::table('userpostcomments')->where('postcomment_srno',$delete_postsrno)->delete();
            DB::table('usernotifications')->where('notificationpostsrno',$delete_postsrno)->delete();
            DB::table('userposts')->where('postsrno',$delete_postsrno)->delete();
            echo "1";
            //echo "not found";
        }
    }

    function userPost(Request $req,$postname){
        $session_username = $req->session()->get('session_username');

        $posts = DB::table('userposts')->select("userposts.*",
            DB::raw("(select users.userfullname from users where users.username=post_username) as userfullname"),
            DB::raw("(select users.facebook_id from users where users.username=post_username) as facebook_id"),
            DB::raw("(select users.userprofilephoto from users where users.username=post_username) as userprofilephoto"),
            DB::raw("(select userpostresponses.postresponse_srno from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as srno"),
            DB::raw("(select userpostresponses.response_username from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as postresponse_username"),
            DB::raw("(select userpostresponses.viewerusername from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as postresponse_viewerusername"),
            DB::raw("(select count(userpostresponses.postlike) from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.postlike='1') as total_postlike"),
            DB::raw("(select count(userpostresponses.postdislike) from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.postdislike='1') as total_postdislike"),
            DB::raw("(select count(userpostcomments.commentsrno) from userpostcomments where userpostcomments.postcomment_srno=postsrno) as total_postcomment"),
            DB::raw("(select userpostresponses.postlike from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as postresponse_postlike"),
            DB::raw("(select userpostresponses.postdislike from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as postresponse_postdislike"))
            ->where('userpost',$postname)->get();
            
            return view("userpost", compact("posts"));
    }

    function usersharePost(Request $req,$postname){
        $session_username = $req->session()->get('session_username');


        $posts = DB::table('userposts')->select("userposts.*",
        DB::raw("(select users.userfullname from users where users.username=post_username) as userfullname"),
        DB::raw("(select users.facebook_id from users where users.username=post_username) as facebook_id"),
        DB::raw("(select users.userprofilephoto from users where users.username=post_username) as userprofilephoto"),
        DB::raw("(select userpostresponses.postresponse_srno from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as srno"),
        DB::raw("(select userpostresponses.response_username from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as postresponse_username"),
        DB::raw("(select userpostresponses.viewerusername from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as postresponse_viewerusername"),
        DB::raw("(select count(userpostresponses.postlike) from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.postlike='1') as total_postlike"),
        DB::raw("(select count(userpostresponses.postdislike) from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.postdislike='1') as total_postdislike"),
        DB::raw("(select count(userpostcomments.commentsrno) from userpostcomments where userpostcomments.postcomment_srno=postsrno) as total_postcomment"),
        DB::raw("(select userpostresponses.postlike from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as postresponse_postlike"),
        DB::raw("(select userpostresponses.postdislike from userpostresponses where userpostresponses.postresponse_srno=postsrno AND userpostresponses.viewerusername='$session_username') as postresponse_postdislike"))
        ->where('userpost',$postname)->get();
        return view("userpost", compact("posts"));
    }
}

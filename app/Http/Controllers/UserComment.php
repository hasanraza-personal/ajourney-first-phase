<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic;
use Image;
use Redirect;
use File;
use DateTime;

class UserComment extends Controller
{
    function commentPost(Request $req){
        function time_elapsed_string($posttime, $full = false) {
            $now = new DateTime;
            $ago = new DateTime($posttime);
            $diff = $now->diff($ago);
            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;
            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            );
            foreach ($string as $k => &$v){
                if ($diff->$k){
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                }else{
                    unset($string[$k]);
                }
            }
            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }

        $session_username = $req->session()->get('session_username');
        $post_srno = $req->postsrno;
        $post_username = $req->postusername;
        $post_comment = htmlspecialchars($req->postcomment);
        if($post_comment != ""){
           
            DB::table('userpostcomments')->insert(
                array('postcomment_srno'=>$post_srno,'comment_username'=>$post_username,'comment_viewerusername'=>$session_username,'comment'=>$post_comment,'comment_created'=>now())
            );

            if($post_username!=$session_username){
                $commentsrno = DB::table('userpostcomments')->select('commentsrno')
                ->where([['postcomment_srno',$post_srno],['comment_viewerusername',$session_username]])->orderBy('commentsrno','DESC')->first();

                DB::table('usernotifications')->insert(array('notificationpostusername'=>$post_username,'notificationusername'=>$session_username,'notificationpostsrno'=>$post_srno,'notificationcommentsrno'=>$commentsrno->commentsrno,'notificationcomment'=>1,'notification_created'=>now(),'notificationread'=>0));
            }

            $comments = DB::table('userpostcomments')->where('postcomment_srno',$post_srno)->orderBy('commentsrno','DESC')->first();

            $profile_photo = DB::table('users')->where('username',$comments->comment_viewerusername)->value('userprofilephoto');
            echo '<div class="comment-response">
                    <div class="comment-response-userdetails">';
                        if(($comments->comment_viewerusername == $session_username) || ($comments->comment_username == $session_username)){
                            echo '<div class="comment-delete-comment">
                                <a href="javascript:void(0)">
                                    <i class="fas fa-trash" onclick="deleteComment('.$comments->commentsrno.','.$comments->postcomment_srno.',\''.$comments->comment_username.'\')"></i>
                                </a>
                            </div>';
                        }
                        echo '<div class="comment-response-profilephoto">
                            <img src="'.$profile_photo.'" class="rounded-circle" height="25px" width="25px" alt="" loading="lazy" />
                        </div>
                        <div class="comment-response-username">'.$comments->comment_viewerusername.'</div>
                        <div class="comment-response-commenttime">'.time_elapsed_string($comments->comment_created).'</div>
                    </div>
                    <div class="comment-response-comment">'.$comments->comment.'</div>
                </div>';
        }else{
            $comments = DB::table('userpostcomments')->select('*',
            DB::raw("(select count(userpostcomments.commentsrno) from userpostcomments) as total_count"))
            ->where('postcomment_srno',$post_srno)->get();

            foreach($comments as $comment){
                $profile_photo = DB::table('users')->where('username',$comment->comment_viewerusername)->value('userprofilephoto');

                echo '<div class="comment-response">
                    <div class="comment-response-userdetails">';
                        if(($comment->comment_viewerusername == $session_username) || ($comment->comment_username == $session_username)){
                            echo '<div class="comment-delete-comment">
                                <a href="javascript:void(0)">
                                    <i class="fas fa-trash" onclick="deleteComment('.$comment->commentsrno.','.$comment->postcomment_srno.',\''.$comment->comment_username.'\')"></i>
                                </a>
                            </div>';
                        }
                        echo '<div class="comment-response-profilephoto">
                            <img src="'.$profile_photo.'" class="rounded-circle" height="25px" width="25px" alt="" loading="lazy" />
                        </div>
                        <div class="comment-response-username"><a href="'.$comment->comment_viewerusername.'">'.$comment->comment_viewerusername.'</a></div>
                        <div class="comment-response-commenttime">'.time_elapsed_string($comment->comment_created).'</div>
                    </div>
                    <div class="comment-response-comment">'.$comment->comment.'</div>
                </div>';
            }
        }

    }

    function commentDelete(Request $req){
        function time_elapsed_string($posttime, $full = false) {
            $now = new DateTime;
            $ago = new DateTime($posttime);
            $diff = $now->diff($ago);
            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;
            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            );
            foreach ($string as $k => &$v){
                if ($diff->$k){
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                }else{
                    unset($string[$k]);
                }
            }
            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }

        $session_username = $req->session()->get('session_username');
        $comment_srno = $req->commentsrno;
        $post_srno = $req->deletepostsrno;
        $comment_username = $req->deleteusername;

        if($comment_username!=$session_username){
            DB::table('usernotifications')->where('notificationcommentsrno',$comment_srno)->delete();
        }

        DB::table('userpostcomments')->where('commentsrno',$comment_srno)->delete();

        $comments = DB::table('userpostcomments')->select('*',
        DB::raw("(select count(userpostcomments.commentsrno) from userpostcomments) as total_count"))
        ->where('postcomment_srno',$post_srno)->get();

            foreach($comments as $comment){
                $profile_photo = DB::table('users')->where('username',$comment->comment_viewerusername)->value('userprofilephoto');
                echo '<div class="comment-response">
                    <div class="comment-response-userdetails">';
                        if(($comment->comment_viewerusername == $session_username) || ($comment->comment_username == $session_username)){
                            echo '<div class="comment-delete-comment">
                                <a href="javascript:void(0)">
                                    <i class="fas fa-trash" onclick="deleteComment('.$comment->commentsrno.','.$comment->postcomment_srno.',\''.$comment->comment_username.'\')"></i>
                                </a>
                            </div>';
                        }
                        echo '<div class="comment-response-profilephoto">
                            <img src="'.$profile_photo.'" class="rounded-circle" height="25px" width="25px" alt="" loading="lazy" />
                        </div>
                        <div class="comment-response-username"><a href="'.$comment->comment_viewerusername.'">'.$comment->comment_viewerusername.'</a></div>
                        <div class="comment-response-commenttime">'.time_elapsed_string($comment->comment_created).'</div>
                    </div>
                    <div class="comment-response-comment">'.$comment->comment.'</div>
                </div>';
            }
    }

    function commentCount(Request $req){
        $post_srno = $req->postsrno;
        $comments = DB::table('userpostcomments')->where('postcomment_srno',$post_srno)->count();
        echo $comments;
    }   
}

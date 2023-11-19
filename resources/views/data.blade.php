<?php
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
?>
            @foreach($posts as $post)
                <div class="userpost">
                    <div class="userposthead">
                        @if($post->facebook_id != "")
                            <div class="userpost_profilephoto text-center">
                                <img src="{{$post->userprofilephoto}}" class="rounded-circle fb-photo" alt="" />
                            </div>
                        @else
                            <div class="userpost_profilephoto text-center">
                                <img src="{{$post->userprofilephoto}}" class="rounded-circle" style="margin:0 !important;" height="40" alt="" />
                            </div>
                        @endif

                        <div class="userpost_userdetails">

                            @if(Request::path() == session('session_username'))
                                <a href="{{url($post->post_username)}}"><div class="userpost_userfullname">{{$post->userfullname}}</div></a>
                            @else
                                <a href="javascript:void(0)" id="link" onclick="event.preventDefault(); seeProfile('{{$post->post_username}}');"><div class="userpost_userfullname">{{$post->userfullname}}</div></a>
                            @endif

                            <div class="userpost_time">{{time_elapsed_string($post->created_at)}}</div>

                            @if(Request::path() == session('session_username'))
                                <a href="{{url($post->post_username)}}"><div class="userpost_username">{{$post->post_username}}</div></a>
                            @else
                                <a href="javascript:void(0)" id="link" onclick="event.preventDefault(); seeProfile('{{$post->post_username}}');"><div class="userpost_username">{{$post->post_username}}</div></a>
                            @endif
                        </div>
                        <div class="post-report ">
                            <div class="dropdown">
                                <i onclick="myFunction('{{$post->postsrno}}','{{session('session_username')}}')" class="bi bi-three-dots-vertical dropbtn" style="color:black;"></i>
                                <div id="myDropdown_{{$post->postsrno}}" class="dropdown-content">
                                    @if(session('session_username') != $post->post_username)
                                        <a class="reportpost" href="javascript:void(0)" onclick="reportPost('{{$post->postsrno}}','{{$post->post_username}}')"><i class="far fa-flag"></i> Report</a>
                                    @endif
                                    @if(session('session_username') == $post->post_username)
                                        <a class="deletepost" href="javascript:void(0)" onclick="deletePost('{{$post->postsrno}}')"><i class="bi bi-trash"></i> Delete post</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="userpost_image text-center">
                        <img src="{{"images/".$post->userpost}}" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="userpost_response"><!--Sending session_username to check, if user has loged in or not-->
                        <div class="userpost_like">
                            @if($post->postresponse_postlike == 1)
                                <a class="nav-link d-sm-flex align-items-sm-center" href="javascript:void(0)">
                                    <img class="after-haha" src="{{"web-images/haha.svg"}}" onclick="likePost('{{$post->postsrno}}','{{$post->post_username}}','{{session('session_username')}}','{{$post->total_postlike}}')" id="like_{{$post->postsrno}}"><span id="likecount_{{$post->postsrno}}" style="margin-left:5px;">{{$post->total_postlike}}</span>
                                </a>
                            @else
                                <a class="nav-link d-sm-flex align-items-sm-center" href="javascript:void(0)">
                                    <img class="before-haha" src="{{"web-images/haha.svg"}}" onclick="likePost('{{$post->postsrno}}','{{$post->post_username}}','{{session('session_username')}}','{{$post->total_postlike}}')" id="like_{{$post->postsrno}}"><span id="likecount_{{$post->postsrno}}" style="margin-left:5px;">{{$post->total_postlike}}</span>
                                </a>
                            @endif
                        </div>
                        <div class="userpost_dislike">
                            @if($post->postresponse_postdislike == 1)
                                <a class="nav-link d-sm-flex align-items-sm-center" href="javascript:void(0)">
                                    <img class="after-angry" src="{{"web-images/angry.svg"}}" onclick="dislikePost('{{$post->postsrno}}','{{$post->post_username}}','{{session('session_username')}}')" id="dislike_{{$post->postsrno}}"><span id="dislikecount_{{$post->postsrno}}" style="margin-left:5px;">{{$post->total_postdislike}}</span>
                                </a>
                            @else
                                <a class="nav-link d-sm-flex align-items-sm-center" href="javascript:void(0)">
                                    <img class="before-angry" src="{{"web-images/angry.svg"}}" onclick="dislikePost('{{$post->postsrno}}','{{$post->post_username}}','{{session('session_username')}}')" id="dislike_{{$post->postsrno}}"><span id="dislikecount_{{$post->postsrno}}" style="margin-left:5px;">{{$post->total_postdislike}}</span>
                                </a>
                            @endif
                        </div>    
                        <div class="userpost_comment">
                            <a class="nav-link d-sm-flex align-items-sm-center" href="javascript:void(0)">
                                <span class=""><span onclick="commentPost('{{$post->postsrno}}','{{$post->post_username}}','{{session('session_username')}}')" style="font-size:18px" class="bi bi-chat-text" id="comment_{{$post->postsrno}}"> &nbsp{{$post->total_postcomment}}</span></span>
                            </a>
                        </div>
                        <div class="userpost_share">
                            <a class="nav-link d-sm-flex align-items-sm-center" href="javascript:void(0)">
                                <span class=""><span onclick="sharePost('{{$post->userpost}}','{{session('session_username')}}')" style="font-size:18px" class="bi bi-share-fill"></span></span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
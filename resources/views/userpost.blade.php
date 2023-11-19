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
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#5b00ff">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#5b00ff">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#5b00ff">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#5b00ff">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="translucent-black">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.css" />
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
 
    <title>Share  MemeSpace</title>
  </head>
  <body>
    @include('top-navbar')  
    
    
    <div class="col-md-6 userpost_form">
        @foreach($posts as $post)
            <div class="userpost">
                <div class="userposthead">
                    <div class="userpost_profilephoto text-center">
                        <img src="{{ session('session_profilephoto') }}" class="rounded-circle" height="40px" width="40px" alt="" loading="lazy" />
                    </div>
                    <div class="userpost_userdetails">
                        <a href="{{url($post->post_username)}}"><div class="userpost_userfullname">{{$post->userfullname}}</div></a>
                        <div class="userpost_time">{{time_elapsed_string($post->created_at)}}</div>
                        <a href="{{url($post->post_username)}}"><div class="userpost_username">{{$post->post_username}}</div></a>
                    </div>
                </div>
                <div class="userpost_image text-center">
                    <img src="{{"../images/".$post->userpost}}" class="img-fluid" alt="Responsive image" loading="lazy">
                </div>
                <div class="userpost_response"><!--Sending session_username to check, if user has loged in or not-->
                    <div class="userpost_like">
                        @if($post->postresponse_postlike == 1)
                            <a class="nav-link d-sm-flex align-items-sm-center" href="javascript:void(0)">
                                <span class=""><span onclick="likePost('{{$post->postsrno}}','{{$post->post_username}}','{{session('session_username')}}')" style="font-size:24px" class="fas fa-grin-squint-tears" id="like_{{$post->postsrno}}"> {{$post->total_postlike}}</span></span>
                            </a>
                        @else
                            <a class="nav-link d-sm-flex align-items-sm-center" href="javascript:void(0)">
                                <span class=""><span onclick="likePost('{{$post->postsrno}}','{{$post->post_username}}','{{session('session_username')}}')" style="font-size:24px" class="far fa-grin-squint-tears" id="like_{{$post->postsrno}}"> {{$post->total_postlike}}</span></span>
                            </a>
                        @endif
                    </div>
                    <div class="userpost_dislike">
                        @if($post->postresponse_postdislike == 1)
                            <a class="nav-link d-sm-flex align-items-sm-center" href="javascript:void(0)">
                                <span class=""><span onclick="dislikePost('{{$post->postsrno}}','{{$post->post_username}}','{{session('session_username')}}')" style="font-size:24px;" class="fas fa-angry" id="dislike_{{$post->postsrno}}"> {{$post->total_postdislike}}</span></span>
                            </a>
                        @else
                            <a class="nav-link d-sm-flex align-items-sm-center" href="javascript:void(0)">
                                <span class=""><span onclick="dislikePost('{{$post->postsrno}}','{{$post->post_username}}','{{session('session_username')}}')" style="font-size:24px" class="far fa-angry" id="dislike_{{$post->postsrno}}"> {{$post->total_postdislike}}</span></span>
                            </a>
                        @endif
                    </div>    
                    <div class="userpost_comment">
                        <a class="nav-link d-sm-flex align-items-sm-center" href="javascript:void(0)">
                            <span class=""><span onclick="commentPost('{{$post->postsrno}}','{{$post->post_username}}','{{session('session_username')}}')" style="font-size:24px" class="far fa-comment" id="comment_{{$post->postsrno}}"> {{$post->total_postcomment}}</span></span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    @include('comment')

    @include('upload')

    <i onclick="topFunction()" id="myBtn" title="Go to top" class="fas fa-arrow-circle-up" style="font-size:35px;color:green"></i>
  
    <div class="ajax-load text-center" style="display:none"></div>

   <!--Buttom navbar-->
   <nav class="sticky">
    <div class="bottom-nav-conatiner container-fluid col-md-6">
        <ul class="bottom-nav-ul">
            <li class="bottom-nav-li">
                <a class="bottom-nav-link" href="{{ url(session('session_username')) }}">
                    <img class="nav-user-profile-photo" src="{{ $session = session('session_profilephoto') }}" />
                    <strong class="d-none d-sm-block ms-1">{{$session = session('session_username')}}</strong>
                </a>
            </li>
           
            <div class="image-upload">
                <label for="file-input">
                    <i id="empty-camera" class="bi bi-camera fa-lg"></i>
                </label>
                <input id="file-input" type="file" accept="image/*" />
            </div>

            <li class="bottom-nav-li"><!--Home-->
                <a class="bottom-nav-link" href="{{url('/')}}">
                    <span><i class="bi bi-house fa-lg"></i></span>
                </a>
            </li>
            
            <li class="bottom-nav-li">
                {{--<a href="{{url('notification')}}">--}}
                <a href="javascript:void(0)" id="link" onclick="event.preventDefault(); readNotification();">
                    <i id="filled-bell" class="bi bi-bell-fill fa-lg"></i>
                    @if($notification_count>0)
                        <span class="badge rounded-pill badge-notification bg-danger">{{$notification_count}}</span>
                    @endif
                </a>
            </li>
            
            <li class="bottom-nav-li"><!--Logout-->
                <a class="bottom-nav-link" href="{{url('logout')}}">
                    <span><i class="bi bi-box-arrow-right fa-lg"></i></span>
                </a>
            </li>
           
        </ul>
    </div>
</nav>
<!--Buttom navbar-->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.js"></script>
    <script src="{{ asset('jquery/single-post-action.js')}}"></script>

    <script type="text/javascript">
        
        $(document).ready(()=>{
        var modal = document.getElementById("myModal");
        $('#file-input').change(function(){
            $('#empty-camera').removeClass("bi bi-camera");
            $('#empty-camera').addClass("bi bi-camera-fill");
            $('#filled-bell').removeClass("bi bi-bell-fill");
            $('#filled-bell').addClass("bi bi-bell");
            $('#image').cropper('destroy');
            const file = this.files[0];//2097152
            if (file.size<5097152){
                let reader = new FileReader();
                reader.onload = function(event){
                    modal.style.display = "block";
                    $('#image').attr('src', event.target.result);
                    $('#image').cropper()
                }
                reader.readAsDataURL(file);
            }else{
                $('#imagewarning').modal('show');
            }
      });
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
            $('#empty-camera').removeClass("bi bi-camera-fill");
            $('#empty-camera').addClass("bi bi-camera");
            $('#filled-bell').removeClass("bi bi-bell");
            $('#filled-bell').addClass("bi bi-bell-fill");
        }
    });

   
    function closeModel(){
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
        $('#empty-camera').removeClass("bi bi-camera-fill");
        $('#empty-camera').addClass("bi bi-camera");
        $('#filled-bell').removeClass("bi bi-bell");
        $('#filled-bell').addClass("bi bi-bell-fill");
    }
      

    </script>
  </body>
</html>

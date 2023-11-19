<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Memes - Share react comment the memes you love. The best collection of memes from worldwide is here, share your creativity of memes and get known worldwide. Join the community now! - Memespace - memespace.in">

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
    <meta property="og:title" content="It's a World that you have never seen before.... 
    It's something which will make your day & you too can make someone's day yes! we are talking about Memes the memes you love and yeah that one smile will be worth it 
    Checkout memespace at below link" />
    <meta property="og:image" content="https://i.redd.it/eyj5d6q4u9s31.jpg" />
    <meta property="og:url" content="https://memespace.in" />
    <meta property="og:site_name" content="memespace.in" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.css" />
    <link href="{{ asset('css/upload.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/post.css') }}" rel="stylesheet">
    <link href="{{ asset('css/comment.css') }}" rel="stylesheet">
    <link href="{{ asset('css/share.css') }}" rel="stylesheet">

    <title>Admin home</title>
  </head>
  <body>

    <div class="load-before">
        <div class="text-center">
            <img src="{{asset('w-images/before-load.gif')}}" class="before-load-image" />
        </div>
    </div>
    <div class="all-content hide">
        
    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid justify-content-between">
            <!--<span style="font-size:30px; color:whitesmoke; cursor:pointer; transform: scaleX(-1) rotate(-90deg);"
                 onclick="openNav()" class="bi bi-bar-chart-fill"></span>--->
            <div class="fries-icon ripple" onclick="openNav()">
                <div class="i1"></div>
                <div class="i2"></div>
                <div class="i3"></div>
            </div>
            <div id="myNav" class="overlay">
                <a href="javascript:void(0)" class="closebtn ripple" style="height=85px;" onclick="closeNav()">&times;</a>
                <div class="overlay-content">
                    <a href="{{url('/')}}" class="fromcenter">Home</a><br>
                    <a href="#" class="fromcenter">About</a><br>
                    <a href="#" class="fromcenter">Contact-us</a>
                </div>
            </div>
            <!-- Left elements -->
            <div class="d-flex center">
                <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="{{url('/')}}">
                    MemeSpace
                </a>
            </div>
            <!-- Left elements -->

            <div class="d-flex center" style="visibility: hidden;">
                <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="{{url('/')}}">
                    MS
                </a>
            </div>
        </div>
    </nav>
    <!-- Navbar -->    


    <div class="col-md-6 trending dragscroll">
        <div class="genre-1">
            <a href="{{url('mostreacted')}}">
                <img src="images/trending-meme.jpeg" style="width: 145px; height:80px; " class="trending-1">
                <div class="caption">
                    <span>Trending Memes</span>
                </div>
            </a>
        </div>
        <div class="genre-1">
            <a href="{{url('mostreacted')}}">
                <img src="images/elon-musk-tesla.jpg" style="width: 145px; height:80px;" class="trending-1">
                <div class="caption">
                    <span><img src="images/tesla.png" style="width: 20px; height:20px; filter: brightness(100%)!important;">esla</span>
                </div>
            </a>
        </div>
         <div class="genre-1">
            <a href="{{url('mostreacted')}}">
                <img src="images/elon-musk-spacex.jpg" style="width: 145px; height:80px;" class="trending-1">
                <div class="caption">
                    <span>Spacex</span>
                </div>
            </a>
        </div>
        <div class="genre-1">
            <a href="{{url('startup/startup-1')}}">
                <img src="images/elon-musk-starlink.jpg" style="width: 145px; height:80px;" class="trending-1">
                <div class="caption">
                    <span>Starlink</span>
                </div>
            </a>
        </div>
        <div class="genre-1">
            <a href="{{url('mostreacted')}}">
                <img src="images/elon-musk-neuralink.jpg" style="width: 145px; height:80px;" class="trending-1">
                <div class="caption">
                    <span>Neuralink</span>
                </div>
            </a>
        </div>
    </div>

    <!-- Post Delete Modal -->
    <div class="modal fade" id="postdeleted" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-successfull-delete">
                        Your post has been deleted
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-mdb-dismiss="modal" onclick="refresh()">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--Post Delete Modal-->  

    @include('postreport')

    @include('comment')

    @include('share')

    <div class="col-md-6 homepage_form">
        <div class="allpost" id="post-data">
            @include('data')
        </div>
    </div>
   
    <i onclick="topFunction()" id="myBtn" title="Go to top" class="fas fa-angle-up" style="font-size:24px; background-color: #5900ff77"></i>

    <div class="ajax-load text-center" style="display:none">
        <p><img src="{{asset('images/loader.gif')}}" /></p>
    </div>

    <!--Buttom navbar-->
    <nav class="sticky col-md-6">
        <div class="bottom-nav-conatiner container-fluid ">
            <ul class="bottom-nav-ul">
                @if(session('session_username'))
                    <li class="bottom-nav-li">
                        <a class="bottom-nav-link tip" href="{{ url(session('session_username')) }}"><span>Profile</span>
                            <img class="nav-user-profile-photo" src="{{ $session = session('session_profilephoto') }}" />
                            <strong class="d-none d-sm-block ms-1">{{$session = session('session_username')}}</strong>
                        </a>
                    </li>
                    <a class="tip"><span>Upload</span>
                    <div class="image-upload">
                        <label for="file-input">
                            <i id="empty-camera" class="bi bi-cloud-arrow-up"></i>
                        </label>
                        <form method="post" action="../adddata" id="uploadimage" enctype="multipart/form-data">
                            @csrf
                            <input id="file-input" style="display:none" type="file" name="image" accept="image/*" />
                            <input type="hidden" id="x" name="x" value="">
                            <input type="hidden" id="y" name="y" value="">
                            <input type="hidden" id="width" name="width" value="">
                            <input type="hidden" id="height" name="height" value="">
                        </form>
                    </div>
                @else
                    <li class="bottom-nav-li">
                        <a class="bottom-nav-link" href="javascript:void(0)" onclick="visitProfile();">
                            <i class="bi bi-person fa-lg"></i>
                        </a>
                    </li>
                    <div class="image-upload" onclick="uploadPost()">
                        <label for="file-input">
                            <i id="empty-camera" class="bi bi-cloud-arrow-up"></i>
                        </label>
                    </div>
                @endif

                <li class="bottom-nav-li"><!--Home-->
                    <a class="bottom-nav-link" href="{{url('/')}}">
                        <i id="filled-home" class="bi bi-house-fill fa-lg"></i>
                    </a>
                </li>
                
                @if(session('session_username'))
                    <a href="javascript:void(0)" id="link" onclick="event.preventDefault(); readNotification();" class="tip"><span>Notification's</span>
                        <i id="filled-bell" class="bi bi-bell fa-lg"></i>
                        @if($notification_count>0)
                            <span class="badge rounded-pill badge-notification bg-danger">{{$notification_count}}</span>
                        @endif
                    </a>
                @else
                    <li class="bottom-nav-li">
                        <a href="javascript:void(0)" onclick="showNotification()">
                            <i class="bi bi-bell fa-lg"></i>
                        </a>
                    </li>
                @endif

                @if(session('session_username'))
                    <li class="bottom-nav-li"><!--Logout-->
                        <a class="bottom-nav-link tip" href="{{url('logout')}}"><span>Logout</span>
                            <i class="bi bi-box-arrow-right fa-lg"></i>
                        </a>
                    </li>
                @else
                    <li class="bottom-nav-li"><!--Logout-->
                        <a class="bottom-nav-link tip" href="{{url('login')}}"><span>Login</span>
                            <i class="bi bi-box-arrow-in-left fa-lg"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    <!--Buttom navbar-->
</div>


    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/asvd/dragscroll/master/dragscroll.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/underscore@1.13.1/underscore-umd-min.js"></script>
    <script src="{{ asset('jquery/post-action.js')}}"></script>

    <script>

setTimeout(function() {
    $('.load-before').fadeOut('fast');
    $('.all-content').removeClass('hide');
}, 3000); // <-- time in milliseconds

    $(function() {
    
    $("h2")
        .wrapInner("<span>")

    $("h2 br")
        .before("<span class='spacer'>")
        .after("<span class='spacer'>");

});

function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}

    if(window.location.hash && window.location.hash == '#_=_'){
        window.location.hash = '';
    }

        function visitProfile(){
            var data = "{{session('session_username')}}";
            if(data == ""){
                $('#exampleModal').modal('show');
            }
        }
        function seeProfile(user){
            var data = "{{session('session_username')}}";
            if(data == ""){
                $('#exampleModal').modal('show');
            }else{
                location.href = user;
            }
        }
        function uploadPost(){
            var data = "{{session('session_username')}}";
            if(data == ""){
                $('#exampleModal').modal('show');
            }else{
                $('#staticBackdrop').modal('show');
            }
        }
        function showNotification(){
            var data = "{{session('session_username')}}";
            if(data == ""){
                $('#exampleModal').modal('show');
            }else{
                location.href = "notification";
            } 
        }

 
    </script>
    
  </body>
</html>

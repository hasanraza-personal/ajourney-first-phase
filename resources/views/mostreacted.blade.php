<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Browse memes at memespace.in Free sharing of memes to worldwide, connect to other creators through Memespace . Join the community now! - Memespace - memespace.in">

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
    <link href="{{ asset('css/mostreacted.css') }}" rel="stylesheet">
    <link href="{{ asset('css/post.css') }}" rel="stylesheet">
    <link href="{{ asset('css/upload.css') }}" rel="stylesheet">
    <link href="{{ asset('css/comment.css') }}" rel="stylesheet">
    <link href="https://memespace.in" rel="canonical">

    <title>Popular memes in hindi | Best Memes, Funny memes  - memespace.in</title>
  </head>
  <body>
    
    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid justify-content-between">
            <!--<span style="font-size:30px; color:whitesmoke; cursor:pointer; transform: scaleX(-1) rotate(-90deg);" onclick="openNav()" class="bi bi-bar-chart-fill"></span>-->
            <div class="fries-icon" onclick="openNav()">
                <div class="i1"></div>
                <div class="i2"></div>
                <div class="i3"></div>
            </div>
            <div id="myNav" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content">
                    <a href="{{url('/')}}">Home</a>
                    <a href="#">About</a>
                    <a href="#">Contact</a>
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

      <!-- Login Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-size:17px;">Please Signin/Signup to continue</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <a href="login" class="signup-signin">
                            Click here to Signup/Signin
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--Login Modal-->  

    @include('comment')
   
    @include('upload')

    <div class="col-md-6 homepage_form">
        <div class="allpost" id="post-data">
            <h3>Popular memes | Best memes | Funny memes</h3>
            @include('data')
        </div>
    </div>

    <i onclick="topFunction()" id="myBtn" title="Go to top" class="fas fa-angle-up" style="font-size:24px; background-color: #00d0ffa4"></i>

    <div class="ajax-load text-center" style="display:none">
        <p><img src="{{asset('images/loader.gif')}}" /></p>
    </div>

    <!--Buttom navbar-->
    <nav class="sticky">
        <div class="bottom-nav-conatiner container-fluid col-md-6">
            <ul class="bottom-nav-ul">
                @if(session('session_username'))
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
                @else
                    <li class="bottom-nav-li">
                        <a class="bottom-nav-link" href="javascript:void(0)" onclick="visitProfile();">
                            <i class="bi bi-person fa-lg"></i>
                        </a>
                    </li>
                    <div class="image-upload" onclick="uploadPost()">
                        <label for="file-input">
                            <i id="empty-camera" class="bi bi-camera fa-lg"></i>
                        </label>
                    </div>
                @endif

                <li class="bottom-nav-li"><!--Home-->
                    <a class="bottom-nav-link" href="{{url('/')}}">
                        <i id="filled-home" class="bi bi-house fa-lg"></i>
                    </a>
                </li>
                
                @if(session('session_username'))
                    <a href="javascript:void(0)" id="link" onclick="event.preventDefault(); readNotification();">
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
                        <a class="bottom-nav-link" href="{{url('logout')}}">
                            <span><i class="bi bi-box-arrow-right fa-lg"></i></span>
                        </a>
                    </li>
                @else
                    <li class="bottom-nav-li"><!--Logout-->
                        <a class="bottom-nav-link" href="{{url('login')}}">
                            <span><i class="bi bi-box-arrow-left fa-lg"></i></span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    <!--Buttom navbar-->
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/underscore@1.13.1/underscore-umd-min.js"></script>

    <script src="{{ asset('jquery/post-action.js')}}"></script>

    <script type="text/javascript">

    $(document).ready(()=>{
        var modal = document.getElementById("myModal");
        $('#file-input').change(function(){
            $('#empty-camera').removeClass("bi bi-camera");
            $('#empty-camera').addClass("bi bi-camera-fill");
            $('#image').cropper('destroy');
            const file = this.files[0];
            if (file.size<6097152){
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
        }
    });

   
    function closeModel(){
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
        $('#empty-camera').removeClass("bi bi-camera-fill");
        $('#empty-camera').addClass("bi bi-camera");
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

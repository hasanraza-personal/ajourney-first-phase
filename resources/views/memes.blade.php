<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Startups - See newly formed Indian Startups | Trending Topics - Get the latest specially handpicked information | Memes - Share, react, comment on memes at Ajourney only. - ajourney.in">
	
    <link rel="apple-touch-icon" sizes="180x180" href="../web-images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../web-images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../web-images/favicon-16x16.png">
	<link rel="manifest" href="../web-images/site.webmanifest">
    
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
    <meta property="og:title" content="Memes | Best memes of 2021, funny tweet, jokes - Ajourney | ajourney.in" />
    <meta property="og:image" content="https://www.ajourney.in/web-images/aj.jpg" />
    <meta property="og:url" content="https://www.ajourney.in/memes" />
    <meta property="og:site_name" content="ajourney.in" />
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-93GHM2WY79"></script>
	<script>
  		window.dataLayer = window.dataLayer || [];
  			function gtag(){dataLayer.push(arguments);}
  			gtag('js', new Date());
			gtag('config', 'G-93GHM2WY79');
	</script>
    
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.css" />
    <link href="{{ asset('css/upload.css') }}" rel="stylesheet">
    <link href="{{ asset('css/meme-kd.css') }}" rel="stylesheet">
    <link href="{{ asset('css/post.css') }}" rel="stylesheet">
    <link href="{{ asset('css/comment.css') }}" rel="stylesheet">
    <link href="{{ asset('css/share.css') }}" rel="stylesheet">

    <title>Memes | Best memes of 2021, funny tweet, jokes - Ajourney </title>
  </head>
  <body>

    <div class="load-before">
        <div class="text-center">
            <img src="{{asset('web-images/before-load.gif')}}" class="before-load-image" />
        </div>
    </div>
    <div class="all-content hide">
    {{-- Navbar --}}
        @include('top-navbar')
    {{-- Navbar --}}    

    
     <!-- Login Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-size:17px;">Please Signin to continue</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <a href="login" class="signup-signin ripple">
                            Oops! You are not logged in 
                           	<br>
                          <u>Click here to Signin/Signup</u>
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
   
    @include('upload')

    @include('share')
    <div class="main-post">
        <div class="left-nav-conatiner">
            <ul class="left-nav-ul">
                @if(session('session_username'))
                    <li class="left-nav-li">
                        <a class="left-nav-link" href="{{ url(session('session_username')) }}">
                            <img class="nav-user-profile-photo" src="{{ $session = session('session_profilephoto') }}" />
                            <strong class="d-none d-sm-block ms-1" style="color: #5b00ff; padding-left: 5px; font-size: 22px;">{{$session = session('session_username')}}</strong>
                        </a>
                    </li>
                    <li class="left-nav-li image-upload" style="top: 0 !important">
                        <form method="post" action="../adddata" id="uploadimage" enctype="multipart/form-data">
                            @csrf
                            <input id="file-input" style="display:none" type="file" name="image" accept="image/*" />
                            <input type="hidden" id="x" name="x" value="">
                            <input type="hidden" id="y" name="y" value="">
                            <input type="hidden" id="width" name="width" value="">
                            <input type="hidden" id="height" name="height" value="">
                        </form>
                        <a class="left-nav-link" style="width: 100%" >
                            <label for="file-input" style="display: contents">
                                <i id="empty-camera" class="bi bi-cloud-arrow-up" style="font-size: 26px"></i>
                                <div class="li-text" style="cursor: pointer">Upload meme</div>
                            </label>
                        </a>
                    </li>
                @else
                    <li class="left-nav-li">
                        <a class="left-nav-link" href="javascript:void(0)" onclick="visitProfile();">
                            <i class="bi bi-person" style="font-size: 24px"></i>
                            <div class="li-text">Profile</div>
                        </a>
                    </li>
                    <li class="left-nav-li image-upload" onclick="uploadPost()">
                        <a class="left-nav-link">
                            <label for="file-input" style="display: contents">
                                <i id="empty-camera" class="bi bi-cloud-arrow-up" style="font-size: 24px"></i>
                                <div class="li-text">Upload meme</div>
                            </label>
                        </a>
                    </li>
                @endif

                <li class="left-nav-li active"><!--Home-->
                    <a class="left-nav-link" href="{{url('memes')}}">
                        <i id="filled-home" class="bi bi-house-fill" style="font-size: 24px"></i>
                        <div class="li-text">Home</div>
                    </a>
                </li>
                
                @if(session('session_username'))
                <li class="left-nav-li">
                    <a class="left-nav-link" href="javascript:void(0)" id="link" onclick="event.preventDefault(); readNotification();">
                        <i id="filled-bell" class="bi bi-bell" style="font-size: 23px"></i>
                        <div class="li-text">Notification's
                        @if($notification_count>0)
                            <span class="badge rounded-pill badge-notification bg-danger" style="margin-top: -.1rem; margin-left: 0rem; width: 15px; height: 15px;">{{$notification_count}}</span>
                        @endif
                        </div>
                    </a>
                </li>
                @else
                    <li class="left-nav-li">
                        <a class="left-nav-link" href="javascript:void(0)" onclick="showNotification()">
                            <i class="bi bi-bell" style="font-size: 22px"></i>
                            <div class="li-text">Notification's</div>
                        </a>
                    </li>
                @endif

                @if(session('session_username'))
                    <li class="left-nav-li"><!--Logout-->
                        <a class="left-nav-link" href="{{url('logout')}}">
                            <i class="bi bi-box-arrow-right" style="font-size: 22px; padding-left: 3px"></i>
                            <div class="li-text">Logout</div>
                        </a>
                    </li>
                @else
                    <li class="left-nav-li"><!--Login-->
                        <a class="left-nav-link" href="{{url('login')}}">
                            <i class="bi bi-box-arrow-in-left" style="font-size: 23px; padding-left: 3px"></i>
                            <div class="li-text">Login</div>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="homepage_form">
            <div class="allpost" id="post-data">
                @include('data')
            </div>
        </div>
        <div class="lg-footer">
            
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
                        <a class="bottom-nav-link" href="{{ url(session('session_username')) }}">
                            <img class="nav-user-profile-photo" src="{{ $session = session('session_profilephoto') }}" />
                            <strong class="d-none d-sm-block ms-1">{{$session = session('session_username')}}</strong>
                        </a>
                    </li>
                    <li class="image-upload">
                        <label for="file-input">
                            <i id="empty-camera" class="bi bi-cloud-arrow-up" style="font-size: 24px"></i>
                        </label>
                        <form method="post" action="../adddata" id="uploadimage" enctype="multipart/form-data">
                            @csrf
                            <input id="file-input" style="display:none" type="file" name="image" accept="image/*" />
                            <input type="hidden" id="x" name="x" value="">
                            <input type="hidden" id="y" name="y" value="">
                            <input type="hidden" id="width" name="width" value="">
                            <input type="hidden" id="height" name="height" value="">
                        </form>
                    </li>
                @else
                    <li class="bottom-nav-li">
                        <a class="bottom-nav-link" href="javascript:void(0)" onclick="visitProfile();">
                            <i class="bi bi-person" style="font-size: 22px"></i>
                        </a>
                    </li>
                    <li class="image-upload bottom-nav-li" onclick="uploadPost()">
                        <label class="bottom-nav-link" for="file-input">
                            <i class="bi bi-cloud-arrow-up" style="font-size: 24px"></i>
                        </label>
                    </li>
                @endif

                <li class="bottom-nav-li"><!--Home-->
                    <a class="bottom-nav-link" href="{{url('memes')}}">
                        <i id="filled-home" class="bi bi-house active" style="font-size: 21px"></i>
                    </a>
                </li>
                
                @if(session('session_username'))
                    <a href="javascript:void(0)" id="link" onclick="event.preventDefault(); readNotification();">
                        <i id="filled-bell" class="bi bi-bell" style="font-size: 20px"></i>
                        {{-- @if($notification_count>0)
                            <span class="badge rounded-pill badge-notification bg-danger">{{$notification_count}}</span>
                        @endif --}}
                    </a>
                @else
                    <li class="bottom-nav-li">
                        <a class="bottom-nav-link" href="javascript:void(0)" onclick="showNotification()">
                            <i class="bi bi-bell" style="font-size: 20px"></i>
                        </a>
                    </li>
                @endif

                @if(session('session_username'))
                    <li class="bottom-nav-li"><!--Logout-->
                        <a class="bottom-nav-link" href="{{url('logout')}}">
                            <i class="bi bi-box-arrow-right" style="font-size: 22px"></i>
                        </a>
                    </li>
                @else
                    <li class="bottom-nav-li"><!--Login-->
                        <a class="bottom-nav-link" href="{{url('login')}}">
                            <i class="bi bi-box-arrow-in-left" style="font-size: 22px"></i>
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
}, 500); // <-- time in milliseconds

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

    $(document).ready(()=>{
        var modal = document.getElementById("myModal");
        $('#file-input').change(function(){
            $('#image').cropper('destroy');
            // $('#empty-camera').removeClass("bi bi-camera");
            // $('#empty-camera').addClass("bi bi-camera-fill");
            // $('#filled-home').removeClass("bi bi-house-fill");
            // $('#filled-home').addClass("bi bi-house");
            var image = $('#file-input')[0].files[0];
            
            if(image.size<10097152){
                let reader = new FileReader();
                reader.onload = function(event){
                    $('#image-preparing').css('display', 'none');
                    modal.style.display = "block";
                    var img = $('#image').attr('src', event.target.result);
                    $('#image').cropper({
                        zoomable: false,
                        modal: true,
                        guides: true,
                        center: true,
                        highlight: true,
                        background: true,
                        autoCropArea: 1
                    })
                }
                reader.readAsDataURL(image);
            }else{
                $('#imagewarning').modal('show');
            }
        });

        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
            // $('#empty-camera').removeClass("bi bi-cloud-arrow-up-fill");
            // $('#empty-camera').addClass("bi bi-cloud-arrow-up");
            // $('#filled-home').removeClass("bi bi-house");
            // $('#filled-home').addClass("bi bi-house-fill");
        }
    });

   
    function closeModel(){
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
        // $('#empty-camera').removeClass("bi bi-cloud-arrow-up-fill");
        // $('#empty-camera').addClass("bi bi-cloud-arrow-up");
        // $('#filled-home').removeClass("bi bi-house");
        // $('#filled-home').addClass("bi bi-house-fill");
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
        function hide_booster(){
            console.log("hello");
            $('.bstr-stp-knd').css("position", "relative");
        }

            jQuery(window).scroll(function(){
                var scroll = Math.ceil($(window).scrollTop());
                if(scroll>50){
                    $('#hide_booster').css("display", "block");
                }
                if(scroll<50){
                    $('#hide_booster').css("display", "none");
                }
            });

    </script>
    
  </body>
</html>

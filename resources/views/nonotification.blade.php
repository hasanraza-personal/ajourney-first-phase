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
    <meta property="og:title" content="See Newly Rising Startups, Trending Topics and Share memes| ajourney.in" />
    <meta property="og:image" content="https://ajourney.in/web-images/aj.jpg" />
    <meta property="og:url" content="https://ajourney.in" />
    <meta property="og:site_name" content="ajourney.in" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.css" />
    <link href="{{ asset('css/notification.css') }}" rel="stylesheet">
    <link href="{{ asset('css/upload.css') }}" rel="stylesheet">
 
    <title>Notification • Ajourney</title>
  </head>
  <body>
    @include('top-navbar')
    
    
    <div class="container-fluid col-md-6 homepage_form">
        <div class="no-notification text-center">
            You don't have any notification
        </div>
    </div>

    @include('upload')

    <i onclick="topFunction()" id="myBtn" title="Go to top" class="fas fa-angle-up" style="font-size:24px; background-color: #00d0ffa4"></i>
  
    <div class="ajax-load text-center" style="display:none">
      <p><img src="{{asset('images/loader.gif')}}" /></p>
    </div>

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
    <script src="{{ asset('jquery/post-action.js')}}"></script>

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

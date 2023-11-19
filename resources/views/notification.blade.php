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
    <meta property="og:image" content="https://www.ajourney.in/web-images/aj.jpg" />
    <meta property="og:url" content="https://www.ajourney.in" />
    <meta property="og:site_name" content="ajourney.in" />
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.css" />
    <link href="{{ asset('css/notification.css') }}" rel="stylesheet">
    <link href="{{ asset('css/upload.css') }}" rel="stylesheet">
 
    <title>Notification • Ajourney</title>
  </head>
  <body>
    {{-- Navbar --}}
        @include('top-navbar')
    {{-- Navbar --}}    
    
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
                                <div class="li-text">Upload</div>
                            </label>
                        </a>
                    </li>
                @endif

                <li class="left-nav-li"><!--Home-->
                    <a class="left-nav-link" href="{{url('memes')}}">
                        <i id="filled-home" class="bi bi-house" style="font-size: 24px"></i>
                        <div class="li-text">Home</div>
                    </a>
                </li>
                
                @if(session('session_username'))
                <li class="left-nav-li active">
                    <a class="left-nav-link" href="javascript:void(0)" id="link" onclick="event.preventDefault(); readNotification();">
                        <i id="filled-bell" class="bi bi-bell-fill" style="font-size: 23px; top: 0 !important;"></i>
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
                            <i class="bi bi-box-arrow-in-left" style="font-size: 22px; padding-left: 3px"></i>
                            <div class="li-text">Login</div>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="homepage_form">
            <div class="all-notification" id="notification-data">
                @include('notification-data')
            </div>
        </div>
        <div class="lg-footer">
            
        </div>
    </div>

    @include('upload')

    <i onclick="topFunction()" id="myBtn" title="Go to top" class="fas fa-angle-up" style="font-size:24px; background-color: #5900ff77"></i>

    <div class="ajax-load text-center" style="display:none">
      <p><img src="{{asset('images/loader.gif')}}" /></p>
    </div>

   <!--Buttom navbar-->
   <nav class="sticky col-md-6">
    <div class="bottom-nav-conatiner container-fluid ">
        <ul class="bottom-nav-ul">
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

            <li class="bottom-nav-li"><!--Home-->
                <a class="bottom-nav-link" href="{{url('memes')}}">
                    <i class="bi bi-house" style="font-size: 21px"></i>
                </a>
            </li>
            
            <li class="bottom-nav-li">
                {{--<a href="{{url('notification')}}">--}}
                <a href="javascript:void(0)" id="link" onclick="event.preventDefault(); readNotification();">
                    <i id="filled-bell" class="bi bi-bell active" style="font-size: 20px"></i>
                    {{-- @if($notification_count>0)
                        <span class="badge rounded-pill badge-notification bg-danger">{{$notification_count}}</span>
                    @endif --}}
                </a>
            </li>
            
            <li class="bottom-nav-li"><!--Logout-->
                <a class="bottom-nav-link" href="{{url('logout')}}">
                    <i class="bi bi-box-arrow-right" style="font-size: 22px"></i>
                </a>
            </li>
           
        </ul>
    </div>
</nav>
<!--Buttom navbar-->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/asvd/dragscroll/master/dragscroll.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/underscore@1.13.1/underscore-umd-min.js"></script>
    <script src="{{ asset('jquery/post-action.js')}}"></script>

    <script type="text/javascript">
        
        $(document).ready(()=>{
        var modal = document.getElementById("myModal");
        $('#file-input').change(function(){
            // $('#empty-camera').removeClass("bi-cloud-arrow-up");
            // $('#empty-camera').addClass("bi-cloud-arrow-up-fill");
            // $('#filled-bell').removeClass("bi bi-bell-fill");
            // $('#filled-bell').addClass("bi bi-bell");
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
            // $('#empty-camera').removeClass("bi-cloud-arrow-up-fill");
            // $('#empty-camera').addClass("bi-cloud-arrow-up");
            // $('#filled-bell').removeClass("bi bi-bell");
            // $('#filled-bell').addClass("bi bi-bell-fill");
        }
    });

   
    function closeModel(){
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
        // $('#empty-camera').removeClass("bi-cloud-arrow-up-fill");
        // $('#empty-camera').addClass("bi-cloud-arrow-up");
        // $('#filled-bell').removeClass("bi bi-bell");
        // $('#filled-bell').addClass("bi bi-bell-fill");
    }
      
    

        function loadMoreData(page){
            $.ajax({
                url:'?page=' +page,
                type:'get',
                beforeSend:function(){
                    $('.ajax-load').show();
                }
            })
            .done(function(data){
                if(data.html == ""){
                    $('.ajax-load').html('No more notifications to load');
                    return;
                }
                $('.ajax-load').hide();
                $('#notification-data').append(data.html);
            })
            .fail(function(jqXHR,ajaxOptions,thrownError){
                alert("server not responding....");
            });
        }
        var page = 1;
        jQuery(document).ready(function(){
            jQuery(window).scroll(function(){
                var scroll = Math.ceil($(window).scrollTop());
                if(scroll>=$(document).height()-$(window).height()){
                    page++;
                    loadMoreData(page);
                }
            });
        });
    </script>
  </body>
</html>

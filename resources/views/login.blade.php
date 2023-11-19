<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Startups - See newly formed Indian Startups | Trending Topics - Get the latest specially handpicked information | Memes - Share, react, comment on memes at Ajourney only. - ajourney.in">
	
    <link rel="apple-touch-icon" sizes="180x180" href="../web-images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../web-images/favicon-32x32.png">
	{{-- <link rel="icon" type="image/png" sizes="16x16" href="../web-images/favicon-16x16.png"> --}}
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
    <meta property="og:url" content="https://www.ajourney.in/login" />
    <meta property="og:site_name" content="ajourney.in" />
    
    {{-- <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />

    <link href="{{ asset('css/google-fonts.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">   
    <!-- MDB -->

    <title>Login - Ajourney</title>
  </head>
  <body>
     <div class="modal fade" id="fb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-image-size">
                    Facebook login is currently not available!
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    {{-- Navbar --}}
        @include('top-navbar')
    {{-- Navbar --}}

    <div class="col-md-6 login_form">
        <div class="login-info">
            <h4 class="login-text">Log in</h4>
            <h5 class="login-subtext">Hello, welcome back to Ajourney</h5>
        </div>
        <a href="{{ url('selectsection') }}" class="btn btn-link">Continue as Guest <i class="bi bi-arrow-right"></i></a>

        {{--Social Login--}}
        <div class="social-login"> 
            <a class="google-login" href="{{url('googlelogin')}}">
                <img src="../web-images/gbtn.png">Google
            </a>
            <a class="facebook-login" onclick="openModal()">
                <img src="../web-images/fbbtn.png" class="fb-image">Facebook
            </a> 
        </div>   
        {{--Social Login--}}      

        <div class="or-line"><div class="or-text">OR</div></div>
        
        {{--Email Login--}}
        <div class="email-login">
            <form method="post" action="verifyuser" onsubmit="return Login()">
                @csrf
                <div class="field-wrapper">
                    <input type="text" name="username" id="username" autocomplete="off">
                    <div class="field-placeholder"><span>Email or username*</span></div>
                </div>
                @if($errors->first('username'))
                    <div class="username-error">{{$errors->first('username')}}</div>
                @endif
                <div class="field-wrapper">
                    <input type="password" name="password" id="password">
                    <div class="field-placeholder"><span>Password*</span></div>
                </div>
                @if($errors->first('password'))
                    <div class="password-error">{{$errors->first('password')}}</div>
                @endif
                <div class="password-checkbox form-check">
                    <input type="checkbox" id="flexCheckDefault" class="form-check-input" onclick="showPassword()">
                    <label class="form-check-label" for="flexCheckDefault">
                        Show password
                    </label> 
                </div>
                <div class="login-form-error">{{session('login_error')}}</div>
                <button class="btn btn-secondary btn-block">Login</button>
            </form>
            <div class="forgot-create">
                <div class="forgot-password"><a href="{{ url('forgot') }}">Forgot password?</a></div>
                <div class="create-account">New to Ajourney?<a href="{{ url('signup') }}"> <b>Sign up</b></a></div>
            </div>
        </div>
        {{--Email Login--}}
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('jquery/user-action.js')}}"></script>

    <script type="text/javascript">
	    function openModal(){
        	$('#fb').modal('show');
        }

        if(window.location.hash && window.location.hash == '#_=_'){
            window.location.hash = '';
        }

        $(function (){
            $(".field-wrapper .field-placeholder").on("click", function () {
                $(this).closest(".field-wrapper").find("input").focus();
            });
            $(".field-wrapper input").on("keyup", function (){
                var value = $.trim($(this).val());
                if(value){
                    $(this).closest(".field-wrapper").addClass("hasValue");
                }else{
                    $(this).closest(".field-wrapper").removeClass("hasValue");
                }
             });
        });

        function showPassword() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        } 
    </script>
  </body>
</html>

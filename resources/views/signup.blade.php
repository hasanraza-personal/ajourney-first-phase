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
    <meta property="og:url" content="https://www.ajourney.in/signup" />
    <meta property="og:site_name" content="ajourney.in" />
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/signup.css') }}" rel="stylesheet">
 
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
   
    <title>Signup - Ajourney</title>
  </head>
  <body>

    {{-- Navbar --}}
    @include('top-navbar')
    {{-- Navbar --}}


    <!--Mail Sending Wait Modal-->
    <div class="modal fade" id="mail-sending" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <p><img src="{{asset('images/send-mail.gif')}}" height="200px" /></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Mail Sending Wait Modal-->

    <!--Account Created Modal-->
    <div class="modal fade" id="account-created" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <p>Congrats, your account has been successfully created</p>
                    </div>
                </div>
                <div class="account-created-button">
                    <button type="button" class="btn btn-light" data-mdb-dismiss="modal" onclick="accountCreated()">Continue to Homepage</button>
                </div>
            </div>
        </div>
    </div>
    <!--Account Created Modal-->

    <div class="col-md-4 signup-form">
        <div class="login-info">
            <h4 class="login-text">Sign up</h4>
            <h5 class="login-subtext">Hello, welcome to Ajourney</h5>
        </div>
        <div class="verification-info hide">
            <h4 class="verification-text">Verify email</h4>
            <h5 class="Verification-subtext">Enter the four digit code below</h5>
        </div>
        
        {{--Email Login--}}
        <div class="email-login">
            <div class="field-wrapper">
                <input type="text" id="name" autocomplete="off" required>
                <div class="field-placeholder"><span>Your Name*</span></div>
            </div>
            <div class="signup-from-radio-button">
                <div class="form-check form-check-inline">
                    <input class="toggle rd" type="radio" id="male" value="male" name="gender" required/>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="toggle rd" type="radio" id="female" value="female" name="gender" />
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="toggle rd" type="radio" id="other" value="other" name="gender" />
                    <label class="form-check-label" for="other">Other</label>
                </div>
            </div>

            <div class="field-wrapper">
                <input type="text" id="username" onfocusout="checkUsername()" autocomplete="off" required>
                <div class="field-placeholder"><span>Username*</span></div>
            </div>
            <div class="user-already-exist"></div>
            <div class="field-wrapper">
                <input type="email" id="email" onfocusout="checkEmail()" autocomplete="off" required>
                <div class="field-placeholder"><span>Email*</span></div>
            </div>
            <div class="email-already-exist"></div>
            <div class="field-wrapper">
                <input type="password" id="password" onkeyup="checkPassword()" required>
                <div class="field-placeholder"><span>Password*</span></div>
            </div>
            <div class="password-length">Use 8 or more characters with a mix of letters, numbers & symbols</div>
            <div class="password-strength"></div>
            <div class="field-wrapper">
                <input type="password" id="confirmpassword" onfocusout="confirmPassword()" required>
                <div class="field-placeholder"><span>Confirm password*</span></div>
            </div>
            <div class="password-not-matched"></div>
            <div class="password-checkbox form-check">
                <input type="checkbox" id="flexCheckDefault" class="form-check-input" onclick="showPassword()">
                <label class="form-check-label" for="flexCheckDefault">
                    Show password
                </label> 
            </div>
            <div class="fill-empty-details"></div>
            <button class="btn btn-secondary btn-block" onclick="signUp()">Signup</button>
            <div class="account-created">
                <div class="already-have-account">
                    Already have an account?<a href="{{ url('login') }}"> <b>Log in</b></a>
                </div>
            </div>
        </div>
        {{--Email Login--}}

        {{--Verification Section--}}

        <div class="verification-section hide">
            <div class="verification-notice">
                A four digit verification code has been sent to your email.<br>
                <span>Please check your inbox or spam folder.</span>
            </div>
            <div class="verification-error"></div>
            <div class="field-wrapper">
                <input type="text" id="verificationcode" autocomplete="off" required>
                <div class="field-placeholder"><span>Enter 4 digit code</span></div>
            </div>
            <button class="btn btn-secondary btn-block" onclick="verifyCode()">Verify</button>
        </div>
        {{--Verification Section--}}
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{ asset('jquery/user-action.js')}}"></script>

    <script>
    $(function () {
        $(".field-wrapper .field-placeholder").on("click", function () {
            $(this).closest(".field-wrapper").find("input").focus();
        });
        $(".field-wrapper input").on("keyup", function () {
            var value = $.trim($(this).val());
            if (value) {
                $(this).closest(".field-wrapper").addClass("hasValue");
            } else {
                $(this).closest(".field-wrapper").removeClass("hasValue");
            }
        });
    });

        function showPassword() {
          var x = document.getElementById("password");
          var y = document.getElementById("confirmpassword");
          if ((x.type === "password")||(y.type === "password")) {
            x.type = "text";
            y.type = "text";
          } else {
            x.type = "password";
            y.type = "password";
          }
        } 


        // const navMenu = document.getElementById('nav-menu'),
        // toggleMenu = document.getElementById('nav-toggle'),
        // closeMenu = document.getElementById('nav-close')

        // /*SHOW*/ 
        // toggleMenu.addEventListener('click', ()=>{
        //     navMenu.classList.toggle('show')
        // })

        // /*HIDDEN*/
        // closeMenu.addEventListener('click', ()=>{
        //     navMenu.classList.remove('show')
        // })

    </script>
  </body>
</html>

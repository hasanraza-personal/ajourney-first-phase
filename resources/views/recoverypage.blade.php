<!DOCTYPE html>
<html>
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

        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Exo:wght@800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ asset('css/recovery.css') }}" rel="stylesheet">

    
        <title>Recover your account - Ajourney</title><!-- use alt + 0149 to make a dot-->
    </head>

    <body>
  {{-- Navbar --}}
  <header class="header">
    <a href="/" class="header__logo">Ajourney</a>
    <i name="menu-outline" class=" bi bi-list ripple" data-mdb-ripple-color="#5b00ff" id="nav-toggle"></i>
    <nav class="nav" id="nav-menu">
        <div class="nav__content bd-grid">
            <i name="close-outline" class="bi-x ripple" data-mdb-ripple-color="#5b00ff" id="nav-close"></i>
            <div class="nav__perfil">
                {{-- <div class="nav__img">
                    <img src="assets/img/perfil.png" alt="">
                </div> --}}
                <div>
                    <a href="/" class="nav__name">Ajourney</a>
                </div>
            </div>
            <hr style="position: absolute; top: 52px;left: 0; right: 0;">


            <div class="nav__menu" id="nav-item">
                <ul class="nav__list">
                    <li class="nav__item"><a href="{{url('/')}}" class="nav__link">Home</a></li>
                    <li class="nav__item"><a href="{{url('contact')}}" class="nav__link">Contact</a></li>
                    <li class="nav__item"><a href="{{url('about')}}" class="nav__link">About</a></li>
                </ul>
            </div>

            <div class="nav__social">
                <a href="#" class="nav__social-icon"><img src="w-images/instagram.png" width="22px" class="social-img" ></a>
                <a href="#" class="nav__social-icon"><img src="w-images/twitter.png" width="22px" class="social-img" ></a>
                <a href="#" class="nav__social-icon"><img src="w-images/facebook.png" width="22px" class="social-img" ></a>
                
            </div>

            <div class="menu-btm-link">
                <a href="https://Ajourney.in" class="mbl">Ajourney © 2021</a> <br>
                <a href="{{url('privacy-policy')}}" class="pp">Privacy policy</a>
            </div>
        </div>
    </nav>
</header>
{{-- /Navbar --}} 

        <?php
            date_default_timezone_set('Asia/Kolkata');
            if(isset($_GET['l']))
            {
                $time = urldecode(base64_decode($_GET['l']));
                $email_id = urldecode(base64_decode($_GET['i']));
        
                $startTime = date("Y-m-d H:i:s");
        
                if($time>$startTime){ ?>
                    <div class="col-md-4 recovery-form">
                        <div class="recovery-info">
                            <h4 class="recovery-text">Change Password</h4>
                            <h5 class="recovery-subtext">Hello, welcome to MemeSpace Recovery page</h5>
                        </div>

                        <div class="email-login">
                            <form method="post" action="changepassword">
                                @csrf
                                <input type="hidden" name="email" value="<?php echo $email_id;?>" />
                                <div class="field-wrapper">
                                    <input type="password" name="password" id="password" onkeyup="checkPassword()">
                                    <div class="field-placeholder"><span>New password*</span></div>
                                </div>
                                <div class="password-length">Use 8 or more characters with a mix of letters, numbers & symbols</div>
                                <div class="password-strength"></div>
                                @if($errors->first('password'))
                                    <div class="username-error">{{$errors->first('username')}}</div>
                                @endif
                                <div class="field-wrapper">
                                    <input type="password" id="confirmpassword">
                                    <div class="field-placeholder"><span>Confirm password*</span></div>
                                </div>
                                <div class="password-checkbox form-check">
                                    <input type="checkbox" id="flexCheckDefault" class="form-check-input" onclick="showPassword()">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Show password
                                    </label> 
                                </div>
                                <div class="fill-empty-details"></div>
                                <button class="btn btn-secondary btn-block">Change password</button>
                            </form>
                        </div>
                    </div>
        <?php
                }else{
                    echo "<div class='time_out'>Request time out. Please Request a new link</div>";
                }
            } ?>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <script type="text/javascript">
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

            function checkPassword(){
                var password = $('#password').val();
                var strength = 0  
                if(password.length > 5){  
                    if (password.length > 7) strength += 1  
                    // If password contains both lower and uppercase characters, increase strength value.  
                    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1  
                    // If it has numbers and characters, increase strength value.  
                    if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1  
                    // If it has one special character, increase strength value.  
                    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
                    // If it has two special characters, increase strength value.  
                    if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
                    // Calculated strength value, we can return messages  
                    // If value is less than 2  
                    if (strength < 2) {  
                        $('.password-strength').html('Strength: Weak');
                        $('.password-strength').css('color','red');
                    } else if (strength == 2) {  
                        $('.password-strength').html('Strength: Medium');
                        $('.password-strength').css('color','yellow');
                    } else {  
                        $('.password-strength').html('Strength: Strong');
                        $('.password-strength').css('color','green');
                    }
                }else{
                    $('.password-strength').html('Length: Too short');
                    $('.password-strength').css('color','red');
                }
            }

            function changePassword(){
                var password = $('#password').val();
                var confirmpassword = $('#confirmpassword').val();
                if(password == confirmpassword){
                    var strength = 0  
                    if(password.length > 5){  
                        if (password.length > 7) strength += 1  
                        // If password contains both lower and uppercase characters, increase strength value.  
                        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1  
                        // If it has numbers and characters, increase strength value.  
                        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1  
                        // If it has one special character, increase strength value.  
                        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
                        // If it has two special characters, increase strength value.  
                        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
                        // Calculated strength value, we can return messages  
                        // If value is less than 2  
                        if (strength < 2) {  
                            $('.password-strength').html('Strength: Weak');
                            $('.password-strength').css('color','red');
                            return true;
                        } else if (strength == 2) {  
                            $('.password-strength').html('Strength: Medium');
                            $('.password-strength').css('color','yellow');
                            return true;
                        } else {  
                            $('.password-strength').html('Strength: Strong');
                            $('.password-strength').css('color','green');
                            return true;
                        }
                    }else{
                        $('.password-strength').html('Length: Too short');
                        $('.password-strength').css('color','red');
                    }
                }else{
                    $('.password-strength').html('Password does not match');
                }
                return false;
            }


        // // Navbar
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
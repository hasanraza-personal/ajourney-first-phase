<head>
    <style>
    .hide{
        display: none;
    }
    .nav-user-profile-photo {
        height: 25px;
        width: 25px;
        border-radius: 50%;
    }
    .rounded-circle {
        border-radius: 50%!important;
        margin: 5px 10px 0 10px;
    }
    .nav__social{
    }
    .social-img{
        margin-right: 15px;
    }
    .nav__social-icon{
        font-size: 22px;
        color: #757575;
    }
    .nav__social-icon:hover{
        font-size: 22px;
        color: #5b00ff;
    }
    .nav__item{
        width: -moz-fit-content;
    }
    @media screen and (max-width: 767px){
        .user{
            display: flex !important;
            justify-content: center;
            align-items: center;
            padding: 2px !important;
        }
        .sm-links{
            font-size: 18px;
            display: block;
            padding: 15px 10px 5px 10px;
            margin-bottom: .9rem;
            text-align: center;
            color: #000;
            width: -moz-fit-content;
            width: fit-content;
        }
        .sm-links:hover{
            color: #5b00ff;
            font-weight: 600;
        }
        .sm-links:after{
            display: block;
            content: '';
            border-bottom: solid 2px #5b00ff;  
            transform: scaleX(0);  
            transition: transform 250ms ease-in-out;
        }
        .sm-links:hover:after{
             transform: scaleX(1); 
        }
        .sm-links:after{  
            transform-origin:  0% 50%; 
        }
    }
    </style>
</head>
{{-- Navbar --}}
<header class="header">
    <a href="/" class="header__logo"><img src="{{url('/logo/logo_compressed.png')}}" alt="Logo" class="brand-logo"><span class="brand-name">Ajourney</span></a>
    <i name="menu-outline" class="bi bi-list ripple" data-mdb-ripple-color="#5b00ff" id="nav-toggle" onclick="checkSize()"></i>
    <nav class="nav" id="nav-menu">
        <div class="nav__content bd-grid">
            <i name="close-outline" class="bi-x ripple" data-mdb-ripple-color="#5b00ff" id="nav-close"></i>
            <div class="nav__perfil">
                <div class="nav__img">
                    <img src="{{url('/logo/logo_compressed.png')}}" alt="Logo">
                </div>
                <div>
                    <a href="/" class="nav__name">Ajourney</a>
                </div>
            </div>
            <hr style="position: absolute; top: 52px;left: 0; right: 0;">
            <div class="nav__menu" id="nav-item">
                <ul class="nav__list">
                    @if(Request::path()=="/")
                        <li class="nav__item"><a href="{{url('/')}}" class="nav__link active">Home</a></li>
                    @else
                        <li class="nav__item"><a href="{{url('/')}}" class="nav__link">Home</a></li>
                    @endif

                    @if(Request::path()=="contact")
                        <li class="nav__item"><a href="{{url('contact')}}" class="nav__link active">Contact</a></li>
                    @else
                        <li class="nav__item"><a href="{{url('contact')}}" class="nav__link">Contact</a></li>
                    @endif

                    @if(Request::path()=="about")
                        <li class="nav__item"><a href="{{url('about')}}" class="nav__link active">About</a></li>
                    @else
                        <li class="nav__item"><a href="{{url('about')}}" class="nav__link">About</a></li>
                    @endif
                    <span id="desktop-size">
                        @if(session()->has('session_username'))
                            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <img src="{{ session('session_profilephoto') }}" class="rounded-circle" style="margin-top: 10px;" height="25" alt="" loading="lazy"/>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="{{ url(session('session_username')) }}">{{$session = session('session_username')}}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
                                </li>
                            </ul>
                        @endif
                    </span>

                        <li id="mobile-size">
                            @if(session()->has('session_username'))
                                <a class="sm-links user" href="{{ url(session('session_username')) }}">
                                    <img class="nav-user-profile-photo" src="{{ session('session_profilephoto') }}" />
                                    <strong class="d-sm-block ms-1" style="color: #5b00ff; font-weight: 600; padding-left: 3px;  font-size: 22px;">{{$session = session('session_username')}}</strong>
                                </a> 
                                <a href="{{url('logout')}}" class="bi bi-box-arrow-right sm-links"> Logout</a> 
                            @endif  
                        </li>

                </ul>
            </div>
            <div class="nav__social">
                <a href="https://www.instagram.com/ajourney.in/" class="nav__social-icon"><i class="bi bi-instagram social-img"></i></a>
                <a href="https://twitter.com/ajourney16679" class="nav__social-icon"><i class="bi bi-twitter social-img"></i></a>
                <a href="https://www.facebook.com/people/Ajourney-Smallstep/100070404277923/" class="nav__social-icon"><i class="bi bi-facebook social-img"></i></a>
            </div>
            <div class="feedback"></div>
            <div class="menu-btm-link">
                <a href="https://www.ajourney.in" class="mbl">Ajourney © 2021</a> <br>
                <a href="{{url('privacypolicy')}}" class="pp">Privacy policy</a><br>
                <a href="{{url('termsandcondition')}}" class="pp">Terms and Condition</a>
            </div>
        </div>
    </nav>
</header>
{{-- Navbar --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    $(window).resize(function() {
        var size = $(window).width();
        if(size <= 767){
            $('#desktop-size').addClass('hide');
            $('#mobile-size').removeClass('hide');
        }else if(size > 767){
            $('#mobile-size').addClass('hide');
            $('#desktop-size').removeClass('hide');
        }
    });

    jQuery(document).ready(function(){
        var size = $(window).width();
        if(size <= 767){
            $('#desktop-size').addClass('hide');
            $('#mobile-size').removeClass('hide');
        }else if(size > 767){
            $('#mobile-size').addClass('hide');
            $('#desktop-size').removeClass('hide');
        }
    });


    function checkSize(){
        var size = $(window).width();
        if(size <= 767){
            $('#desktop-size').addClass('hide');
            $('#mobile-size').removeClass('hide');
        }else if(size > 767){
            $('#mobile-size').addClass('hide');
            $('#desktop-size').removeClass('hide');
        }
    }

    // function openNav(){
    //     document.getElementById("myNav").style.width = "100%";
    // }
    // function closeNav(){
    //     document.getElementById("myNav").style.width = "0%";
    // }

     // Navbar
    const navMenu = document.getElementById('nav-menu'),
    toggleMenu = document.getElementById('nav-toggle'),
    closeMenu = document.getElementById('nav-close')
    /*SHOW*/ 
    toggleMenu.addEventListener('click', ()=>{
        navMenu.classList.toggle('show')
    })
    /*HIDDEN*/
    closeMenu.addEventListener('click', ()=>{
        navMenu.classList.remove('show')
    })
</script>
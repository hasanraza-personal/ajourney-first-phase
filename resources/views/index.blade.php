<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Startups - See newly formed Indian Startups | Trending Topics - Get the latest specially handpicked information | Memes - Share, react, comment on memes at Ajourney only. - Ajourney.in">
      <link rel="apple-touch-icon" sizes="180x180" href="web-images/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="web-images/favicon-32x32.png">
      {{-- <link rel="icon" type="image/png" sizes="16x16" href="web-images/favicon-16x16.png"> --}}
      <link rel="manifest" href="web-images/site.webmanifest">
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
      <meta property="og:site_name" content="https://www.ajourney.in" />
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.min.css" integrity="sha512-q54FvbV+gGBn+NvgaD4gpJ7w4wrO00DgW7Rx503PIhrf0CuMwLOwbS+bXgOBFSob+6GVy1HDPfaRLJ8w2jiS4g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" />
      <link rel="stylesheet" href="{{ asset('css/google-fonts.css') }}" >
      <link rel="stylesheet" href="{{ asset('css/index.css') }}" >
     
    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-93GHM2WY79"></script>
	<script>
  		window.dataLayer = window.dataLayer || [];
  			function gtag(){dataLayer.push(arguments);}
  			gtag('js', new Date());
			gtag('config', 'G-93GHM2WY79');
	</script>

      {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" > --}}
      {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo:wght@800&display=swap" >  --}}
      {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" /> --}}
     
      <title>Discover Indian Startups | Knowledge on latest trends and topics | Memes, jokes funny tweets etc- Ajourney </title>
   </head>
   <body>
      @if(session('status'))
         @include('popup')
      @endif
      <div class="pre-loader">
         <img class="img-fluid" id="ajourney-loader" src="web-images/preloader-ajy.gif" />
      </div>
      {{-- Navbar --}}
      <div class="all-content hide">
         <header>
            <div class="header-top clearfix">
                  <h1 class="l-left"><a href="/" class="ml"><img src="../logo/logo_compressed.png" class="brand-logo"><span class="brand-name">Ajourney</span></a></h1>
                  <div class="right-menu">
                     <a href="{{url('/')}}" class="lg-menu-links active">Home</a>
                     <a href="{{url('contact')}}" class="lg-menu-links">Contact</a>
                     <a href="{{url('about')}}" class="lg-menu-links">About</a>
                     @if(session()->has('session_username'))
                     <a class="lg-menu-links user" href="{{ url(session('session_username')) }}">
                        <img class="nav-user-profile-photo" src="{{ session('session_profilephoto') }}" />
                        <strong class="d-none d-sm-block ms-1" style="color: #5b00ff; font-weight: 600; font-size: 16px;">{{ session('session_username') }}</strong>
                     </a>  
                     <a href="{{url('logout')}}" class="bi bi-box-arrow-right sm-links" style="font-size:22px; margin-top:4px;"></a>
                     @endif
                  </div>
                  <a class="l-right right-menu toggle-menu">
                     <i></i>
                     <i></i>
                     <i></i>
                  </a>
            </div>
            <nav class="hide" id="menuopen" onclick="opennav()" value="Click">
               <div id="menu" class="sm-menu">
                  <a href="{{url('/')}}" class="sm-links" id="active" >Home</a>
                  <a href="{{url('contact')}}" class="sm-links">Contact</a>
                  <a href="{{url('about')}}" class="sm-links">About</a>   
                  @if(session()->has('session_username'))
                       <a class="sm-links user" href="{{ url(session('session_username')) }}">
                           <img class="nav-user-profile-photo" src="{{ session('session_profilephoto') }}" />
                           <strong class="d-sm-block ms-1" style="color: #5b00ff; font-weight: 600; padding-left: 3px;  font-size: 22px;">{{$session = session('session_username')}}</strong>
                       </a> 
                       <a href="{{url('logout')}}" class="bi bi-box-arrow-right sm-links"> Logout</a> 
                  @endif    
                  <div class="nav__social">
                     <a href="https://www.instagram.com/ajourney.in/" class="nav__social-icon"><i class="fab fa-instagram social-img"></i></a>
                     <a href="https://twitter.com/ajourney16679" class="nav__social-icon"><i class="fab fa-twitter social-img"></i></a>
                     <a href="https://www.facebook.com/people/Ajourney-Smallstep/100070404277923/" class="nav__social-icon"><i class="fab fa-facebook-f social-img"></i></a>
                  </div>
               </div>
               <div class="menu-btm-link">
                  <a href="https://www.ajourney.in" class="mbl">Ajourney © 2021</a> <br>
                  <a href="{{url('privacypolicy')}}" class="privacy_p">Privacy policy</a><br />
                  <a href="{{url('termsandcondition')}}" class="terms_condition">Terms and Condition</a>
               </div>
            </nav>
         </header>
         {{-- /Navbar --}}
         <div id="fullpage" class="full-container">
            <section class="vertical-scrolling">
               <div class="container content-container">
                  <div class="text-cont">
                     <h1 class="h1text">
                        Discover India's newly formed <span>Startups</span>
                     </h1>
                     <p class="paratext">
                        Ajourney is the virtual destination to discover and showcase creative startups and a home for sharing memes along with our personalized collection of information on the latest trends!</p>
                     @if(session()->has('session_username'))
                     <a href="{{url('selectsection')}}" class="btn btn-secondary">Explore All</a>
                     @else
                     <a href="{{url('login')}}" class="btn btn-secondary">Explore All</a>
                     @endif
                  </div>
                  <div class="pic-cont">
                     <img src="../web-images/hp-svg.svg" class="hpic mpg">
                  </div>
               </div>
               <a href="#IndianStartups" class="pg-dn">
                  <span class="fas fa-chevron-down"></span>
               </a>
            </section>
            <section class="vertical-scrolling">
               <div class="container content-container">
                  <div class="stp-content">
                     <div class="pic-cont">
                        <img src="../web-images/stp.svg" class="hpic mpg" loading="lazy">
                     </div>
                     <div class="text-cont stp-text">
                        <h1 class="h1text">
                           <span>Watchout Startups</span>
                        </h1>
                        <p class="paratext">
                           Interested? Check out the pre-eminent startups showcased at Ajourney. Wanna showcase your startup? No problem, contact us.
                        </p>
                        <a href="{{url('startup/allstartup')}}" class="btn btn-secondary stp-btn">Explore all Startup's</a>
                     </div>
                  </div>
               </div>
               <a href="#knowledge-information" class="pg-dn">
                  <span class="fas fa-chevron-down"></span>
               </a>
            </section>
            {{-- <section class="vertical-scrolling">
               <div class="container content-container">
                  <div class="text-cont">
                     <h1 class="h1text">
                        <span>NGO's</span>
                     </h1>
                     <p class="paratext">
                        Get the information on latest trends/topic & about famous persons, specially handpicked information just for you!
                     </p>
                     <a href="{{url('knowledgehome')}}" class="btn btn-secondary stp-btn">Read more</a>
                  </div>
                  <div class="pic-cont">
                     <img src="../web-images/ngo.svg" class="hpic mpg" loading="lazy">
                  </div>
               </div>
               <a href="#knowledge-information" class="pg-dn">
                  <span class="fas fa-chevron-down"></span>
               </a>
            </section> --}}
            <section class="vertical-scrolling">
               <div class="container content-container cont-knowledge">
                  <div class="pic-cont">
                     <img src="../web-images/kd.svg" class="hpic mpg" loading="lazy">
                  </div>
                  <div class="text-cont">
                     <h1 class="h1text">
                        <span>Collective Information</span>
                     </h1>
                     <p class="paratext">
                        Get the information on the latest trends/topic & about well-known individuals, especially handpicked for you.
                     </p>
                     <a href="{{url('knowledgehome')}}" class="btn btn-secondary stp-btn">Read more</a>
                  </div>
               </div>
               <a href="#memes" class="pg-dn">
                  <span class="fas fa-chevron-down"></span>
               </a>
            </section>
            <section class="vertical-scrolling">
               <div class="container content-container cont-meme">
                     <div class="text-cont stp-text mtext">
                        <h1 class="h1text">
                           <span>Checkout Memes</span>
                        </h1>
                        <p class="paratext">
                           Surprised? Get a laugh, laughter helps us heal. Watch our user’s memes and enjoy our humorous content. Explore now, react, comment, and share!
                        </p>
                        <a href="{{url('memes')}}" class="btn btn-secondary stp-btn mbtn">View memes</a>
                     </div>
                     <div class="pic-cont memepg">
                        <img src="../web-images/memes.svg" class="hpic mpg" loading="lazy">
                     </div>
               </div>
               <a href="#footer" class="pg-dn">
                  <span class="fas fa-chevron-down"></span>
               </a>
            </section>
            <section class="vertical-scrolling">
               <div class="container footer-container">
                  <div class="main-footer-content">
                     <div class="brand-name-logo">
                        <a href="/" class="ml brand-ln"><img src="../logo/logo_compressed.png" class="brand-logo"><span class="brand-name">Ajourney</span></a>
                        <div class="brand-tagline">
                           It all begins with a small step.
                        </div>
                     </div>
                     <div class="content-links">
                        <div class="link-container">
                           <div class="link-content">
                              <div class="company-content-heading">
                                 <h5 class="link-heading">Company</h5>
                              </div>
                              <a href="{{url('about')}}" class="ft-lw-link">About</a>
                              <a href="{{url('contact-us')}}" class="ft-lw-link">Contact</a>
                              <a href="{{url('privacypolicy')}}" class="ft-lw-link">Privacy policy</a>
                              <a href="{{url('termsandcondition')}}" class="ft-lw-link">Terms and Conditions</a>
                           </div>
                        </div>
                        <div class="link-container">
                           <div class="link-content">
                              <div class="how-to-content-heading">
                                 <h5 class="link-heading">How to</h5>
                              </div>
                              <a href="{{url('promote')}}" class="ft-lw-link">Promote my Startup</a>
                           </div>
                        </div>
                        <div class="link-container">
                           <div class="link-content">
                              <div class="legal-heading">
                                 <h5 class="link-heading">Help</h5>
                              </div>
                              <a href="{{url('faq')}}" class="ft-lw-link" title="FAQ's">FAQ's</a>
                              <a href="{{url('promote')}}" class="ft-lw-link" title="Live chat with us">Support</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="container lower-footer-content">
                  <div class="ft-lw">
                     <a href="https://www.ajourney.in" class="cc">© 2021 Ajourney</a>
                     <div class="nav__social ft-social-links">
                        <a href="https://www.instagram.com/ajourney.in/" class="nav__social-icon"><i class="bi bi-instagram social-img"></i></a>
                        <a href="https://twitter.com/ajourney16679" class="nav__social-icon"><i class="bi bi-twitter social-img"></i></a>
                        <a href="https://www.facebook.com/people/Ajourney-Smallstep/100070404277923/" class="nav__social-icon"><i class="bi bi-facebook social-img"></i></a>
                    </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.min.js" integrity="sha512-bxzECOBohzcTcWocMAlNDE2kYs0QgwGs4eD8TlAN2vfovq13kfDfp95sJSZrNpt0VMkpP93ZxLC/+WN/7Trw2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

      <script stype="text/javascript">
         setTimeout(function() {
            $('.pre-loader').fadeOut('fast');
            $('.all-content').removeClass('hide');
         }, 2000); // <-- time in milliseconds

         setTimeout(function(){
            $('#successModal').modal('show');
         }, 2000);
        
         // $(window).on('load', function(){ 
         //    $(".pre-loader").fadeOut("30000");
         // });

         var $header_top = $('.header-top');
         var $nav = $('nav');
         $header_top.find('a').on('click', function() {
             $(this).parent().toggleClass('open-menu');
         });
        
        
         $('#fullpage').fullpage({
            sectionsColor: ['#fff', '#fff', '#fff', '#fff', '#fff', '#fff'],
            sectionSelector: '.vertical-scrolling',
            navigation: true,
            slidesNavigation: true,
            controlArrows: false,
            anchors: ['Discover', 'IndianStartups', 'knowledge-information', 'memes', 'footer'],
            menu: '#menu',
      
            afterLoad: function(anchorLink, index) {
            $header_top.css('background', '#fff');
            $nav.css('background', 'rgba(0, 47, 77, .25)');
            if (index == 6) {
               $('#fp-nav').hide();
            }
         },
            onLeave: function(index, nextIndex, direction) {
               if(index == 5) {
                  $('#fp-nav').show();
               }
            },
         });
        
        //menubar
        const element = document.getElementById('menuopen')
        element.classList.remove('hide'); // reset animation
        void element.offsetWidth; // trigger reflow
        element.classList.add('hide'); // start animation

        jQuery(document).ready(function(){
            var myvar='{{ session('session_profilephoto') }}';
            //console.log(myvar);
            if((myvar)!=""){
                $(".sm-menu").css("left", "25%");
            }else{
                //console.log("session not activated");
            }
        });
        
      </script>
   </body>
</html>
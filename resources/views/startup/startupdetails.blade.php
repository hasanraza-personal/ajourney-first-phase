<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Startups - See newly formed Indian Startups at Ajourney only. - ajourney.in">
	
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
    <meta property="og:title" content="See Newly Rising Startups | ajourney.in" />
    <meta property="og:image" content="https://ajourney.in/web-images/aj.jpg" />
    <meta property="og:url" content="https://ajourney.in/startup/allstartup" />
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
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" /> --}}
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ url('css/google-fonts.css') }}" >
    <link href="{{ asset('css/startup-1-hp.css') }}" rel="stylesheet">
    

    <title>Startup details - Ajourney</title>
  </head>
  <body>
    <!--Mail Modal-->
    <div class="modal fade" id="mail-send" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <p>We have registered your email.</p>
                        <p>We will contact you soon.</p>
                    </div>
                </div>
                <div class="account-created-button">
                    <button type="button" class="btn btn-secondary secondary1" data-mdb-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--mail Modal-->

    <!--Empty Email Warning Modal-->
    <div class="modal fade" id="empty-email" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <p>Please provide an email address</p>
                    </div>
                </div>
                <div class="account-created-button">
                    <button type="button" class="btn btn-secondary secondary1" data-mdb-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--Empty Email Warning Modal-->

    <!--Email Exist Modal-->
    <div class="modal fade" id="email-exist" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <p>Your email address has been already registered</p>
                    </div>
                </div>
                <div class="account-created-button">
                    <button type="button" class="btn btn-secondary secondary1" data-mdb-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--Empty Exist Modal-->

    <!--Email Exist Modal-->
    <div class="modal fade" id="wrong-email" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <p>Please provide a valid email address</p>
                    </div>
                </div>
                <div class="account-created-button">
                    <button type="button" class="btn btn-secondary secondary1" data-mdb-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--Empty Exist Modal-->

    {{-- Navbar --}}
        @include('top-navbar')
    {{-- Navbar --}}

    <!--back-link--->
    <div class="bl">
        <a href="{{url('startup/allstartup')}}" class="bi bi-arrow-left bl"> See all Startup's</a>
    </div>
    
    {{-- Lg-screen-share --}}
        <a class="bi bi-share ripple lg-share" onclick="sharestartupdetails()" title="Share this startup"></a>
    {{-- Lg-screen-share --}}

    <!--back-link--->
    <div class="container">
        @foreach($specificdetails as $specificdetail)
            <div class="back-link">
                <a href="{{url('startup/allstartup')}}" class="bi bi-arrow-left ripple"></a>
                <div class="header-startup-name ripple">{{$specificdetail->startupname}}</div>
            </div>

            <!-- Carousel wrapper -->
            <div id="carouselDarkVariant" class="carousel slide carousel-fade carousel-dark" data-mdb-ride="carousel" >

                <!-- Inner -->
                <div class="carousel-inner">
                    <!-- Single item -->
                    <div class="carousel-item active" data-mdb-interval="2500">
                        <img src="{{"../startup/".$specificdetail->startupmainphoto}}" height="400px" class="d-block w-100" alt="..." />
                        <!--<div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                        </div>-->
                    </div>
                    @if($specificdetail->startupfirstphoto!="")
                    <!-- Single item -->
                        <div class="carousel-item">
                            <img src="{{"../startup/".$specificdetail->startupfirstphoto}}" height="400px" class="d-block w-100" alt="..." loading="lazy" />
                        </div>
                    @endif
                    @if($specificdetail->startupsecondphoto!="")
                    <!-- Single item -->
                        <div class="carousel-item">
                            <img src="{{"../startup/".$specificdetail->startupsecondphoto}}" height="400px" class="d-block w-100" alt="..." loading="lazy" />
                        </div>
                    @endif
                    @if($specificdetail->startupthirdphoto!="")
                    <!-- Single item -->
                        <div class="carousel-item">
                            <img src="{{"../startup/".$specificdetail->startupthirdphoto}}" height="400px" class="d-block w-100" alt="..." loading="lazy" />
                        </div>
                    @endif
                    @if($specificdetail->startupfourthphoto!="")
                    <!-- Single item -->
                        <div class="carousel-item">
                            <img src="{{"../startup/".$specificdetail->startupfourthphoto}}" height="400px" class="d-block w-100" alt="..." loading="lazy" />
                        </div>
                    @endif
                </div>
                @if($specificdetail->startupfifthphoto!="")
                <!-- Single item -->
                    <div class="carousel-item">
                        <img src="{{"../startup/".$specificdetail->startupfifthphoto}}" height="400px" class="d-block w-100" alt="..." loading="lazy" />
                    </div>
                @endif
                <!-- Inner -->

                <!-- Controls -->
              	@if($specificdetail->startupfirstphoto!="")
                	<button class="carousel-control-prev" type="button" data-mdb-target="#carouselDarkVariant" data-mdb-slide="prev" >
                		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
                		<span class="visually-hidden">Previous</span>
                	</button>
                	<button class="carousel-control-next" type="button" data-mdb-target="#carouselDarkVariant" data-mdb-slide="next" >
                		<span class="carousel-control-next-icon" aria-hidden="true"></span>
                		<span class="visually-hidden">Next</span>
                	</button>
              	@endif
            </div>
            <!-- Carousel wrapper -->

            <div class="contact-form">
                <p>To promote your startup enter your email</p>
                <div class="form-outline">
                    <input type="email" id="useremail" class="form-control" />
                    <label class="form-label" for="useremail">Enter your email address</label>
                </div>
                <div id="textExample1" class="form-text" style="font-size: 14px">
                    We'll contact you through your email. We'll never share your email with anyone else.
                </div>
                <button type="button" class="btn btn-warning" onclick="promotedesktopStartup()">Submit</button>
                <div class="or-part">Or simply mail your startup details us at:
                    <a href="mailto:info@ajourney.in">info@ajourney.in</a>
                </div>
            </div>
            <div class="all-information">
                <div class="wrapper-tag tagged"><ul><li>{{$specificdetail->startuptype}}</li></ul></div>
                <div class="indetails">
                    <div class="about-startup">
                        <h5 class="details-tag"><b>{{$specificdetail->startupname}}</b> </h5>
                        <div class="details-of-startup">
                            <p class="about-info" id="startupdetails">{{$specificdetail->startupdetails}}</p>
                            <span id="dots">...</span><span id="more">
                            @if($specificdetail->startupadvantages!="")
                                <b>Perks:</b><br>
                                <div id="startupadvantages">
                                    {{$specificdetail->startupadvantages}}
                                </div>
                            @endif
                                <div class="hpfounder-details">
                                    <div class="founder-name">
                                        @if($specificdetail->foundername2!="")
                                            <span class="founder-title">Founders:</span> <br><i class="bi bi-person"></i> {{$specificdetail->foundername1}}<br><i class="bi bi-person"></i> {{$specificdetail->foundername2}}<br>
                                        @elseif($specificdetail->foundername1!="")
                                            <span class="founder-title">Founder:</span> <br><i class="bi bi-person"></i> {{$specificdetail->foundername1}}<br>
                                        @endif

                                        @if($specificdetail->cofoundername!="")
                                           <span class="founder-title">Co-Founder:</span> <br><i class="bi bi-person"></i> {{$specificdetail->cofoundername}}<br>
                                        @endif
                                        
                                        @if($specificdetail->ownername5!="")
                                            <span class="founder-title">Owners:</span> <br><i class="bi bi-person"></i> {{$specificdetail->ownername1}}<br><i class="bi bi-person"></i> {{$specificdetail->ownername2}}<br><i class="bi bi-person"></i> {{$specificdetail->ownername3}}<br><i class="bi bi-person"></i> {{$specificdetail->ownername4}}<br><i class="bi bi-person"></i> {{$specificdetail->ownername5}}<br>
                                        @elseif($specificdetail->ownername4!="")
                                            <span class="founder-title">Owners:</span> <br><i class="bi bi-person"></i> {{$specificdetail->ownername1}}<br><i class="bi bi-person"></i> {{$specificdetail->ownername2}}<br><i class="bi bi-person"></i> {{$specificdetail->ownername3}}<br><i class="bi bi-person"></i> {{$specificdetail->ownername4}}<br>
                                        @elseif($specificdetail->ownername3!="")
                                            <span class="founder-title">Owners:</span> <br><i class="bi bi-person"></i> {{$specificdetail->ownername1}}<br><i class="bi bi-person"></i> {{$specificdetail->ownername2}}<br><i class="bi bi-person"></i> {{$specificdetail->ownername3}}<br>
                                        @elseif($specificdetail->ownername2!="")
                                            <span class="founder-title">Owners:</span> <br><i class="bi bi-person"></i> {{$specificdetail->ownername1}}<br><i class="bi bi-person"></i> {{$specificdetail->ownername2}}<br>
                                        @elseif($specificdetail->ownername1!="")
                                            <span class="founder-title">Owner:</span> <br><i class="bi bi-person"></i> {{$specificdetail->ownername1}}<br>
                                        @endif
                                    </div>
                                    <div class="founder-clgname">
                                        @if($specificdetail->studyingin!="")
                                            Studying in <b>{{$specificdetail->studyingin}}</b><br>
                                        @endif
                                        @if($specificdetail->studiedat!="")
                                            Studied at <b>{{$specificdetail->studiedat}}</b><br>
                                        @endif
                                        @if($specificdetail->selftaught!="")
                                            Self taught <b>{{$specificdetail->selftaught}}</b><br>
                                        @endif
                                        @if($specificdetail->dropoutfrom!="")
                                            Dropout from <b>{{$specificdetail->dropoutfrom}}</b><br>
                                        @endif

                                        @if($specificdetail->founderdetails!="")
                                            <b>{{$specificdetail->founderdetails}}</b>
                                        @endif
                                        @if($specificdetail->ownerdetails!="")
                                            <b>{{$specificdetail->ownerdetails}}</b>
                                        @endif
                                    </div>
                                </div>
                            <h5 class="startup-social-media-links">
                                @if($specificdetail->facebooklink!="")
                                    <div class="facebook-link"><i class="fab fa-facebook mrdt-facebook"></i> Facebook<br>
                                        <a href="{{$specificdetail->facebooklink}}" target="_blank" class="dt-facebook">Click here to join on facebook</a>
                                    </div>
                                @endif
                                @if($specificdetail->telegramlink!="")
                                    <div class="telegram-link"><i class="fab fa-telegram"></i> Telegram<br>
                                        <a href="{{$specificdetail->telegramlink}}" target="_blank" class="dt-telegram">Click here to join on telegram</a>
                                    </div>
                                @endif
                                @if($specificdetail->instagramlink!="")
                                    <div class="instagram-link"><i class="fab fa-instagram mrdt-instagram"></i> Instagram<br>
                                        <a href="{{$specificdetail->instagramlink}}" target="_blank" class="dt-instagram">Click here to join on instagram</a>
                                    </div>
                                @endif
                                @if($specificdetail->twitterlink!="")
                                    <div class="twitter-link"><i class="fab fa-twitter mrdt-twitter"></i> Twitter<br>
                                        <a href="{{$specificdetail->twitterlink}}" target="_blank" class="dt-twitter">Click here to join on twitter</a>
                                    </div>
                                @endif
                                @if($specificdetail->linkedinlink!="")
                                    <div class="linkedin-link"><i class="fab fa-linkedin-in"></i> LinkedIn:<br>
                                        <a href="{{$specificdetail->linkedinlink}}" target="_blank" class="dt-linkedin">Click here to join on LinkedIn</a>
                                    </div>
                                @endif
                                @if($specificdetail->pinterestlink!="")
                                    <div class="linkedin-link"><i class="fab fa-pinterest mrdt-pinterest"></i> Pinterest:<br>
                                        <a href="{{$specificdetail->linkedinlink}}" target="_blank" class="dt-pinterest">Click here to join on Pinterest</a>
                                    </div>
                                @endif
                                @if($specificdetail->whatsapplink1!="")
                                    <div class="whatsapp-link"><i class="fab fa-whatsapp"></i> Whatsapp:<br>
                                        <a href="//api.whatsapp.com/send?phone={{$specificdetail->whatsapplink1}}" target="_blank" class="whatsapp">Click here to join on Whatsapp</a>
                                    </div>
                                @endif
                                @if($specificdetail->whatsapplink2!="")
                                    <div class="whatsapp-link"><i class="fab fa-whatsapp"></i> Whatsapp:<br>
                                        <a href="//api.whatsapp.com/send?phone={{$specificdetail->whatsapplink2}}" target="_blank" class="whatsapp">Click here to join on Whatsapp</a>
                                    </div>
                                @endif
                                @if($specificdetail->youtubelink!="")
                                    <div class="youtube-link"><i class="bi bi-youtube"></i> Youtube:<br>
                                        <a href="{{$specificdetail->youtubelink}}" target="_blank" class="dt-youtube">Click here to join on Youtube</a>
                                    </div>
                                @endif
                                @if($specificdetail->flipcartlink!="")
                                    <div class="youtube-link"><i class="fas fa-shopping-bag" style="background-color: #f7a200;"></i> Flipcart:<br>
                                        <a href="{{$specificdetail->flipcartlink}}" target="_blank" class="dt-youtube">Click here to buy on Flipcart</a>
                                    </div>
                                @endif
                                @if($specificdetail->amazonlink!="")
                                    <div class="youtube-link"><i class="fab fa-amazon" style="background-color: #000000;"></i> Amazon:<br>
                                        <a href="{{$specificdetail->youtubelink}}" target="_blank" class="dt-youtube">Click here to buy on Amazon</a>
                                    </div>
                                @endif
                                @if($specificdetail->swiggylink!="")
                                    <div class="youtube-link"><i class="fas fa-pizza-slice" style="color:#FC8019;"></i> Swiggy:<br>
                                        <a href="{{$specificdetail->swiggylink}}" target="_blank" class="dt-youtube">Click here to order on Swiggy</a>
                                    </div>
                                @endif
                                @if($specificdetail->zomatolink!="")
                                    <div class="youtube-link"><i class="fas fa-pizza-slice" style="color:red;"></i> Zomato:<br>
                                        <a href="{{$specificdetail->zomatolink}}" target="_blank" class="dt-youtube">Click here to order on Zomato</a>
                                    </div>
                                @endif
                                @if($specificdetail->magicpinlink!="")
                                    <div class="linkedin-link"><i class="fas fa-thumbtack"></i> Magicpin:<br>
                                        <a href="{{$specificdetail->magicpinlink}}" target="_blank" class="dt-linkedin">Click here to order on Magicpin</a>
                                    </div>
                                @endif

                                @if($specificdetail->startupmaplink!="")
                                    <div class="map-link"><i class="bi bi-geo-alt-fill"></i> Map:<br>
                                        <a href="{{$specificdetail->startupmaplink}}" target="_blank" class="dt-map">Click here to navigate</a>
                                    </div>
                                @endif
                            </h5>
                    <div class="startups-contact-us">
                        @if($specificdetail->startupemail!="")
                            <div class="startup-mail"><b>Mail us at:</b> {{$specificdetail->startupemail}}<br>
                                <a href="mailto:{{$specificdetail->startupemail}}">Click here to Send mail to {{$specificdetail->startupname}}</a>
                            </div>
                        @endif
                        @if($specificdetail->contactno1!="")
                            <div class="startup-mail">
                                  @if($specificdetail->contactno2!="")
                                    <b>Contact us at:</b><br> <span style="color:#000">{{$specificdetail->contactno1}} <br>{!!$specificdetail->contactno2!!}</span>
                                @else
                                      <b>Contact us at:</b><br> <span style="color:#000">{{$specificdetail->contactno1}}</span>
                                  @endif
                              </div>
                        @endif
                        @if($specificdetail->contactemail1!="")
                            <div class="startup-mail"><b>Mail us at:</b> <br>
                                <span style="color:#373838"><i class="bi bi-envelope"></i> - {{$specificdetail->contactemail1}}</span>
                                @if($specificdetail->contactemail2!="")
                                    <br><span style="color:#373838"><i class="bi bi-envelope"></i> - {{$specificdetail->contactemail2}}</span>
                                @endif
                            </div>
                        @endif
                        @if($specificdetail->websitelink1!="")
                            <div class="startup-mail">
                                  @if($specificdetail->websitelink2!="")
                                      <span style="color:#373838"><i class="bi bi-link-45deg" style="color:#373838; font-size:20px"></i> - <a style="color:#373838; text-decoration: underline;" href="{{url($specificdetail->websitelink1)}}" target="_blank"><b>{{$specificdetail->websitelink1}}</b></a></span>
                                      <br>
                                      <span style="color:#373838"><i class="bi bi-link-45deg" style="color:#373838; font-size:20px"></i> - <a style="color:#373838; text-decoration: underline;" href="{{url($specificdetail->websitelink2)}}" target="_blank"><b>{{$specificdetail->websitelink2}}</b></a></span>
                                  @else
                                      <span style="color:#373838"><i class="bi bi-link-45deg" style="color:#373838; font-size:20px"></i> - <a style="color:#373838; text-decoration: underline;" href="{{url($specificdetail->websitelink1)}}" target="_blank"><b>{{$specificdetail->websitelink1}}</b></a></span>
                                  @endif
                              </div>
                        @endif
                        @if($specificdetail->applink!="")
                            <div class="startup-address"><i class="bi bi-link-45deg"></i> - <a style="color:#373838; text-decoration: underline;" href="{{url($specificdetail->applink)}}" target="_blank"><b>{{$specificdetail->applink}}</b></a></div>
                        @endif
                        @if($specificdetail->startupaddress!="")
                            <div class="startup-address"><i class="bi bi-house-door-fill"></i> - {{$specificdetail->startupaddress}}</div>
                        @endif
                            </div>
                            </span>
                            <button onclick="myFunction()" id="myreadBtn" class="btn btn-link" data-mdb-ripple-color="dark">See more</button>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="contact-form-tab">
        <p>To promote your startup enter your mail</p>
        <div class="form-outline">
            <input type="email" id="useremail1" class="form-control" />
            <label class="form-label" for="useremail1">Enter your mail</label>
        </div>
        <div id="textExample1" class="form-text" style="font-size: 14px">
            We'll contact you through your email. We'll never share your email with anyone else.
        </div>
        <button type="button" class="btn btn-warning" onclick="promotemobileStartup()">Submit</button>
        <div class="or-part">Or simply mail your startup details us at:
            <a href="mailto:admin@ajourney.in">admin@ajourney.in</a>
        </div>
    </div>
   
    @include('startup.sharestartupdetails') 
    @include('footer')
        
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            var old_link = window.location.href;
            $("head").append('<meta property=og:url content='+old_link+' />');
        });

        function openNav(){
            document.getElementById("myNav").style.width = "100%";
        }
        function closeNav(){
            document.getElementById("myNav").style.width = "0%";
        }
        function myFunction(){
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myreadBtn");
            
            if(dots.style.display === "none"){
                dots.style.display = "inline";
                btnText.innerHTML = "See more"; 
                moreText.style.display = "none";
            }else{
                dots.style.display = "none";
                btnText.innerHTML = "See less"; 
                moreText.style.display = "inline";
            }
        }
        
        $(document).ready(function(){
            var stringAsHtml = $('#startupadvantages').text();
            var text = stringAsHtml.split(".+");
            var str = text.join('.</br>');
            $('#startupadvantages').html(str)

            var stringAsHtml1 = $('#startupdetails').text();
            var text1 = stringAsHtml1.split(".++");
            var str1 = text1.join('.<br><br>');
          
            var text2 = str1.split(".+");
            var str1 = text2.join('.<br>');
        });

        function promotedesktopStartup(){
            var useremail = $('#useremail').val();
            if(useremail!=""){
                var check_email = /^[A-Za-z0-9_.]{3,}@[A-za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/
                if(check_email.test(useremail)){
                    $.ajax({
                        url : "../promote",
                        method : "POST",
                        data : {postpromoteemail:useremail},
                        headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success : function(data){
                            if(data!=""){
                                $('#email-exist').modal('show');
                            }else{
                                $('#mail-send').modal('show');
                          	    $('#useremail').val("");
                            }
                        }
                    }); 
                }else{
                    $('#wrong-email').modal('show');
                }
            }else{
                $('#empty-email').modal('show');
            }
        }

        function promotemobileStartup(){
            var useremail1 = $('#useremail1').val();
            if(useremail1!=""){
                var check_email = /^[A-Za-z0-9_.]{3,}@[A-za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/
                if(check_email.test(useremail1)){
                    $.ajax({
                        url : "../promote",
                        method : "POST",
                        data : {postpromoteemail:useremail1},
                        headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success : function(data){
                            if(data!=""){
                                $('#email-exist').modal('show');
                            }else{
                                $('#mail-send').modal('show');
                          	    $('#useremail1').val("");
                            }
                        }
                    }); 
                }else{
                    $('#wrong-email').modal('show');
                }
            }else{
                $('#empty-email').modal('show');
            }
        }

        function sharestartupdetails(){
            $('#sharestartupdetailsModal').modal('show');
        }

        function whatsappShare(){
            var old_link = window.location.href;
            var link = encodeURIComponent(old_link); 
            document.getElementById("whatsapplink").href="https://api.whatsapp.com/send?phone=&text={{urlencode('Hey, here is my startup Showcased at Ajourney you can view it by clicking the below link')}} "+link;
        }
        
        function twitterShare(){
            var old_link = window.location.href;
            var link = encodeURIComponent(old_link); 
            document.getElementById("twitterlink").href="http://twitter.com/share?text=It's a World that you have never seen before&url="+link+"&hastags=startup"
        }

        function facebookShare(){
            var old_link = window.location.href;
            // var link = encodeURIComponent(old_link); 
            // console.log(link);
            document.getElementById("link").href="https://www.facebook.com/sharer.php?u="+old_link;
        }
    </script>

</body>
</html>

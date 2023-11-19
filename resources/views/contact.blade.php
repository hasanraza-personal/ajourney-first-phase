<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Startups - See newly formed Indian Startups | Trending Topics - Get the latest specially handpicked information | Memes - Share, react, comment on memes at Ajourney only. - Ajourney.in">
    <link rel="apple-touch-icon" sizes="180x180" href="web-images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="web-images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="web-images/favicon-16x16.png">
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
    <meta property="og:title" content="Contact us | Ajourney.in" />
    <meta property="og:image" content="https://www.ajourney.in/web-images/aj.jpg" />
    <meta property="og:url" content="https://www.ajourney.in/contact" />
    <meta property="og:site_name" content="https://www.ajourney.in" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-93GHM2WY79"></script>
	<script>
  		window.dataLayer = window.dataLayer || [];
  			function gtag(){dataLayer.push(arguments);}
  			gtag('js', new Date());
			gtag('config', 'G-93GHM2WY79');
	</script>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/contact-us.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about-us.css') }}" >
 
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <title>Contact us - Ajourney</title>
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

    <!--Empty Warning Modal-->
    <div class="modal fade" id="empty-email" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <p>Please provide name and email address.</p>
                        <p>Name and email address cannot be empty</p>
                    </div>
                </div>
                <div class="account-created-button">
                    <button type="button" class="btn btn-secondary secondary1" data-mdb-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--Empty Warning Modal-->

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

    <!--Wrong Email Modal-->
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
    <!--Wrong Email Modal-->

    <!-- Navbar -->
    @include('top-navbar')
    <!-- Navbar -->
    <section>
        <div class="container">
            <div class="cs1">
                <div class="cu">
                    Contact Us
                </div>
                <div class="cs-flex">
                    <div class="c-text">
                        <p><span>You've got a startup? </span> 
                            Let us know if you'd like to show up here! We'll get in touch with you soon! It's 
                            <span>absolutely free!</span>
                        </p>
                        <div class="s-mail">
                            <div class="s-mail-text">Or simply contact us at:</div>
                            <span class="s-mail-email"><i class="far fa-envelope"></i> <span class="email-divider">-</span> <a href="mailto:admin@ajourney.in" class="email-to" title="Mail us">info@ajourney.in</a></span>
                        </div>
                    </div>
                    <div class="main-cs">
                        <div class="share-details-text">Share your details!</div>
                        <div class="inputWithIcon">
                            <input type="text" id="name" placeholder="Your name" required>
                            <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                        </div>
                        <div class="inputWithIcon">
                            <input type="text" id="email" placeholder="Email" required>
                            <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
                        </div>
                        <div class="inputWithIcon">
                            <input type="text" id="number" placeholder="Phone Number">
                            <i class="fa fa-phone fa-lg fa-fw" aria-hidden="true"></i>
                        </div>
                        <div class="inputWithIcon">
                            <textarea  placeholder="Message" id="textArea" rows="4"></textarea>
                            <i class="fas fa-pen fa-lg fa-fw" aria-hidden="true"></i>
                        </div>
                        <button type="submit" onclick="submitDetails();" class="btn btn-secondary btn-block">Send <i class="far fa-paper-plane"></i></button>
                    </div>    
                </div>
            </div>
        </div>
    </section> 
    @include('footer')

    <script type="text/javascript">
        function submitDetails(){
            var name = $('#name').val();
            var email = $('#email').val();
            var number = $('#number').val();
            var message = $('#textArea').val();

            if((name!="")&&(email!="")){
                var check_email = /^[A-Za-z0-9_.]{3,}@[A-za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/
                if(check_email.test(email)){
                    $.ajax({
                        url : "../promote",
                        method : "POST",
                        data : {name:name,email:email,number:number,message:message},
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success : function(data){
                            if(data!=""){
                                $('#email-exist').modal('show');
                            }else{
                                $('#mail-send').modal('show');
                          	    $('#name').val("");
                          	    $('#email').val("");
                          	    $('#number').val("");
                          	    $('#textArea').val("");
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
    </script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Startups - Register your Startup at Ajourney. - Ajourney.in">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('web-images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('web-images/favicon-32x32.png') }}">
    <link rel="manifest" href="{{ url('web-images/site.webmanifest') }}">
    <meta name="theme-color" content="#5b00ff">
    <meta name="msapplication-navbutton-color" content="#5b00ff">
    <meta name="apple-mobile-web-app-status-bar-style" content="#5b00ff">
    <meta name="msapplication-navbutton-color" content="#5b00ff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="translucent-black">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" integrity="sha512-xnP2tOaCJnzp2d2IqKFcxuOiVCbuessxM6wuiolT9eeEJCyy0Vhcwa4zQvdrZNVqlqaxXhHqsSV1Ww7T2jSCUQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('css/google-fonts.css') }}" >
    <link rel="stylesheet" href="{{ url('css/form/startupregistrationform.css') }}" >
    <style>
        .registeredstartup-image{
            text-align: center;
            margin-bottom: 20px;
        }
        .image{
            width: 486px;
            height: 500px;
        }
        .svg-image{
            margin: 5px 0 25px 0;
        }
        #previewiamge_7{
            width: 300px;
            height: 200px;
        }
    </style>
    <title>Ajourney • Register Startup</title>
</head>
<body>
    {{-- Navbar --}}
    <header class="header">
        <a href="/" class="header__logo">
            <img src="{{url('/logo/logo_compressed.png')}}" alt="Logo" class="brand-logo">
            <span class="brand-name">Ajourney</span>
        </a>
    </header>
    {{-- Navbar --}}
    <div class="container-fluid col-md-6">
        @include('form.formmodal')
        <div class="form-data">
            <h1 class="form-heading">
                Check and upload Startup details
            </h1>
            <div class="form-image">
                <img src="{{ url('web-images/form.svg') }}" class="img-fluid">
            </div>
            <div class="startup-form">
                <form method="post" action="#" enctype="multipart/form-data">
                    @csrf
                    @foreach($startups as $startup)
                        <input type="hidden" id='srno' value="{{$startup->registered_startupsrno}}">
                        <div class="form-outline mb-4">
                            <input type="text" id="startupname" name="startupname" value="{{htmlspecialchars_decode($startup->registered_startupname)}}" class="form-control" required />
                            <label class="form-label" for="startupname">Startup Name*</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" id="name" name="name" class="form-control" value="{{htmlspecialchars_decode($startup->registered_startuppeople)}}" required />
                            <label class="form-label" for="name">Founder/Owner*</label>
                        </div>

                        <!-- More Founder/Owner -->
                        @if($startup->registered_startuppeople1!="")
                            <div class="form-outline mb-4">
                                <input type="text" id="name1" name="name1" class="form-control" value="{{htmlspecialchars_decode($startup->registered_startuppeople1)}}" />
                                <label class="form-label" for="name1">Another founder/owner</label>
                            </div>
                        @endif
                        
                        <div class="form-outline mb-4">
                            <input type="text" id="designation" name="designation" class="form-control" value="{{htmlspecialchars_decode($startup->registered_startupdesignation)}}" required />
                            <label class="form-label" for="name">Designation</label>
                        </div>

                        @if($startup->registered_startupcollegename!="")
                            <div class="form-outline mb-4">
                                <input type="text" id="collegename" name="collegename" class="form-control" value="{{htmlspecialchars_decode($startup->registered_startupcollegename)}}" />
                                <label class="form-label" for="collegename">College name</label>
                            </div>
                        @endif

                        <!-- More College -->
                        @if($startup->registered_startupcollegename1!="")
                            <div class="form-outline mb-4">
                                <input type="text" id="collegename1" name="collegename1" class="form-control" value="{{htmlspecialchars_decode($startup->registered_startupcollegename1)}}"/>
                                <label class="form-label" for="collegename1">Another college name</label>
                            </div>
                        @endif

                        <div class="form-outline mb-4">
                            <input type="text" id="establishment" name="establishment" class="form-control" value="{{htmlspecialchars_decode($startup->registered_startuplocation)}}" required />
                            <label class="form-label" for="form1Example1">Place of establishment*</label>
                        </div>
                        
                        <div class="registeredstartup-image">
                            <img class="image img-fluid" src="{{url('registered-startup-images/'.$startup->registered_startuplogo)}}" />
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" id="startuptype" name="startuptype" class="form-control" value="{{htmlspecialchars_decode($startup->registered_startuptype)}}" />
                            <label class="form-label" id="required" for="startuptype">Startup type*</label>
                        </div>
                        <div class="form-outline form-outline">
                            <textarea class="form-control" id="startupdetails" name="startupdetails" rows="4" value="{{htmlspecialchars_decode($startup->registered_startupdescription)}}">{{htmlspecialchars_decode($startup->registered_startupdescription)}}</textarea>
                            <label class="form-label" for="startupdetails">Describe your Startup in few words*</label>
                        </div>

                        @if($startup->registered_startupbenefit)
                            <div class="form-outline form-outline-modify">
                                <textarea class="form-control" id="textAreaExample" name="startupbenefit" rows="4" value="{{htmlspecialchars_decode($startup->registered_startupdescription)}}">{{htmlspecialchars_decode($startup->registered_startupdescription)}}</textarea>
                                <label class="form-label" for="textAreaExample">User benefit from your service/product</label>
                            </div>
                        @endif

                        @if($startup->registered_startupaddress)
                            <div class="form-outline mb-4-info">
                                <textarea class="form-control" id="textAreaExample" name="startupaddress" rows="3" value="{{htmlspecialchars_decode($startup->registered_startupaddress)}}">{{htmlspecialchars_decode($startup->registered_startupaddress)}}</textarea>
                                <label class="form-label" for="textAreaExample">Startup address</label>
                            </div>
                        @endif

                        @if(($startup->registered_email!="")&&($startup->registered_contact!="")&&($startup->registered_whatsapp!=""))
                            <div class="form-contact-details">Contact Details</div>
                        @endif

                        @if($startup->registered_email!="")
                            <div class="col-12">
                                <div class="label">Email Address</div>
                                <label class="visually-hidden" for="email">Email address</label>
                                <div class="input-group">
                                  <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                  <input type="email" class="form-control" id="email" name="email" placeholder="Email address" value="{{htmlspecialchars_decode($startup->registered_email)}}"/>
                                </div>
                            </div>
                        @elseif($startup->registered_email1!="")
                            <!-- More Email -->
                            <div class="col-12">
                                <div class="label">Extra Email Address</div>
                                <label class="visually-hidden" for="email1">Extra email address</label>
                                <div class="input-group">
                                  <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                  <input type="email" class="form-control" id="email1" name="email1" placeholder="Extra email address" value="{{htmlspecialchars_decode($startup->registered_email1)}}"/>
                                </div>
                            </div>
                        @endif
                        
                        @if($startup->registered_contact)
                            <div class="col-12">
                                <div class="label">Contact Number</div>
                                <label class="visually-hidden" for="contact">Contact no</label>
                                <div class="input-group">
                                  <div class="input-group-text">+91</div>
                                  <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact no" value="{{htmlspecialchars_decode($startup->registered_contact)}}" />
                                </div>
                            </div>
                        @elseif($startup->registered_contact1)
                            <!-- More Contact -->
                            <div class="col-12">
                                <div class="label">Extra Contact Number</div>
                                <label class="visually-hidden" for="contact1">Extra contact no</label>
                                <div class="input-group">
                                  <div class="input-group-text">+91</div>
                                  <input type="text" class="form-control" id="contact1" name="contact1" placeholder="Extra contact no" value="{{htmlspecialchars_decode($startup->registered_contact1)}}" />
                                </div>
                            </div>
                        @endif

                        @if($startup->registered_whatsapp)
                            <div class="col-12">
                                <div class="label">Whatsapp Number</div>
                                <label class="visually-hidden" for="whatsapp">Whatsapp number</label>
                                <div class="input-group">
                                  <div class="input-group-text">+91</div>
                                  <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="Whatsapp number" value="{{htmlspecialchars_decode($startup->registered_whatsapp)}}" />
                                </div>
                            </div>
                        @elseif($startup->registered_whatsapp1)
                            <!-- More Whatsapp -->
                            <div class="col-12">
                                <div class="label">Whatsapp Number 1</div>
                                <label class="visually-hidden" for="whatsapp">Extra whatsapp number</label>
                                <div class="input-group">
                                  <div class="input-group-text">+91</div>
                                  <input type="text" class="form-control" id="whatsapp1" name="whatsapp1" placeholder="Extra whatsapp number" value="{{htmlspecialchars_decode($startup->registered_whatsapp1)}}" />
                                </div>
                            </div>
                        @endif

                        <!--Here all the Social Links are present-->
                        <div class="form-contact-details">Social Handles</div>

                        <div class="form-outline mb-4">
                            <input type="text" id="instagramlink" name="instagramlink" class="form-control" value="{{htmlspecialchars_decode($startup->registered_instagramlink)}}"/>
                            <label class="form-label" for="instagramlink">Instagram Link*</label>
                        </div>

                        @if($startup->registered_facebooklink!="")
                            <!-- Add Facebook -->
                            <div class="form-outline mb-4 mb-4-info-top-p">
                                <input type="text" id="facebookfield" name="facebooklink" class="form-control" value="{{htmlspecialchars_decode($startup->registered_facebooklink)}}" />
                                <label class="form-label" for="form1Example1">Facebook Link</label>
                            </div>
                        @endif
                        @if($startup->registered_twitterlink!="")
                            <!-- Add Twitter -->
                            <div class="form-outline mb-4 mb-4-info-top-p">
                                <input type="text" id="twitterfield" name="twitterlink" class="form-control" value="{{htmlspecialchars_decode($startup->registered_twitterlink)}}" />
                                <label class="form-label" for="form1Example1">Twitter Link</label>
                            </div>
                        @endif
                        @if($startup->registered_linkedinlink!="")
                            <!-- Add Linkedin -->
                            <div class="form-outline mb-4 mb-4-info-top-p">
                                <input type="text" id="linkedinfield" name="linkedinlink" class="form-control" value="{{htmlspecialchars_decode($startup->registered_linkedinlink)}}" />
                                <label class="form-label" for="form1Example1">Linkedin Link</label>
                            </div>
                        @endif
                        @if($startup->registered_youtubelink!="")
                            <!-- Add Youtube -->
                            <div class="form-outline mb-4 mb-4-info-top-p">
                                <input type="text" id="youtubefield" name="youtubelink" class="form-control" value="{{htmlspecialchars_decode($startup->registered_youtubelink)}}" />
                                <label class="form-label" for="form1Example1">Youtube Link</label>
                            </div>
                        @endif
                        @if($startup->registered_flipcartlink!="")
                            <!-- Add Flipcart -->
                            <div class="form-outline mb-4 mb-4-info-top-p">
                                <input type="text" id="flipcartfield" name="flipcartlink" class="form-control" value="{{htmlspecialchars_decode($startup->registered_flipcartlink)}}" />
                                <label class="form-label" for="form1Example1">Flipcart Link</label>
                            </div>
                        @endif
                        @if($startup->registered_amazonlink!="")
                            <!-- Add Amazon -->
                            <div class="form-outline mb-4 mb-4-info-top-p">
                                <input type="text" id="amazonfield" name="amazonlink" class="form-control" value="{{htmlspecialchars_decode($startup->registered_amazonlink)}}" />
                                <label class="form-label" for="form1Example1">Amazon Link</label>
                            </div>
                        @endif
                        @if($startup->registered_swiggylink!="")
                            <!-- Add Swiggy -->
                            <div class="form-outline mb-4 mb-4-info-top-p">
                                <input type="text" id="swiggyfield" name="swiggylink" class="form-control" value="{{htmlspecialchars_decode($startup->registered_swiggylink)}}" />
                                <label class="form-label" for="form1Example1">Swiggy Link</label>
                            </div>
                        @endif
                        @if($startup->registered_zomatolink!="")
                            <!-- Add Zomato -->
                            <div class="form-outline mb-4 mb-4-info-top-p">
                                <input type="text" id="zomatofield" name="zomatolink" class="form-control" value="{{htmlspecialchars_decode($startup->registered_zomatolink)}}" />
                                <label class="form-label" for="form1Example1">Zomato Link</label>
                            </div>
                        @endif
                        @if($startup->registered_magicpinlink!="")
                            <!-- Add Magicpin -->
                            <div class="form-outline mb-4 mb-4-info-top-p">
                                <input type="text" id="magicpinfield" name="magicpinlink" class="form-control" value="{{htmlspecialchars_decode($startup->registered_magicpinlink)}}" />
                                <label class="form-label" for="form1Example1">Magicpin Link</label>
                            </div>
                        @endif
                        @if($startup->registered_maplink!="")
                            <!-- Add Map -->
                            <div class="form-outline mb-4 mb-4-info-top-p">
                                <input type="text" id="mapfield" name="maplink" class="form-control" value="{{htmlspecialchars_decode($startup->registered_maplink)}}" />
                                <label class="form-label" for="form1Example1">Map Link</label>
                            </div>
                        @endif
                        @if($startup->registered_otherlink!="")
                            <!-- Add Other -->
                            <div class="form-outline mb-4 mb-4-info-top-p">
                                <input type="text" id="otherfield" name="otherlink" class="form-control" value="{{htmlspecialchars_decode($startup->registered_otherlink)}}" />
                                <label class="form-label" for="form1Example1">Other Link</label>
                            </div>
                        @endif

                        @if(($startup->registered_websitelink!="")&&($startup->registered_applink!=""))
                            <div class="form-contact-details">Website and App Link</div>
                        @endif
                        
                        @if($startup->registered_websitelink!="")
                        <div class="form-outline mb-4 mb-4-info-top-p">
                            <input type="text" id="form1Example1" name="websitelink" class="form-control" value="{{htmlspecialchars_decode($startup->registered_websitelink)}}" />
                            <label class="form-label" for="form1Example1">Website Link</label>
                        </div>
                        @endif
                        @if($startup->registered_applink!="")
                        <div class="form-outline mb-4 mb-4-info-top-p">
                            <input type="text" id="form1Example1" name="applink" class="form-control" value="{{htmlspecialchars_decode($startup->registered_applink)}}" />
                            <label class="form-label" for="form1Example1">App Link</label>
                        </div>
                        @endif

                        <div class="submit-btn">
                            <button type="button" class="btn btn-secondary" id="upload">Done</button>
                            <button type="button" class="btn btn-danger" id="delete">Delete</button>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
    @include('footer')

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ url('jquery/form/startupform.js') }}"></script>

    <script type="text/javascript">
        $('#delete').click(function(){
            let id = $('#srno').val();
            console.log(id);
            $.ajax({
                url : "../../../trash",
                method : "POST",
                data : {id:id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(){
                    window.location.href = "https://ajourney.in/form/startup/jhdjkzmxcbhsjdzdgfhzdrgfv";
                }
            });
        });

        $('#upload').click(function(){
            let id = $('#srno').val();
            console.log(id);
            $.ajax({
                url : "../../../uploaded",
                method : "POST",
                data : {id:id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(){
                    window.location.href = "https://ajourney.in/form/startup/jhdjkzmxcbhsjdzdgfhzdrgfv";
                }
            });
        });
        
    </script>

    
</body>
</html>

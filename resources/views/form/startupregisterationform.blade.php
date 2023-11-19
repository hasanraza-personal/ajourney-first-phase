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
    <meta property="og:title" content="Register your Startup | ajourney.in" />
    <meta property="og:image" content="https://www.ajourney.in/web-images/aj.jpg" />
    <meta property="og:url" content="https://www.ajourney.in/form/startup/filldetails" />
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

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" integrity="sha512-xnP2tOaCJnzp2d2IqKFcxuOiVCbuessxM6wuiolT9eeEJCyy0Vhcwa4zQvdrZNVqlqaxXhHqsSV1Ww7T2jSCUQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('css/google-fonts.css') }}" >
    <link rel="stylesheet" href="{{ url('css/form/startupregistrationform.css') }}" >

    <title>Ajourney • Register Startup</title>
</head>
<body>
    {{-- Navbar --}}
    <header class="header">
        <a href="/" class="header__logo">
            <img src="{{url('/logo/logo_compressed.png')}}" alt="Logo" class="brand-logo">
            <span class="brand-name">Ajourney</span>
        </a>
        <span class="formfeedback" id="feedback">
            <i class="far fa-edit"></i>
        </span>
    </header>
    {{-- Navbar --}}
    <div class="container-fluid col-md-6">
        @include('form.formmodal')
        <div class="form-data">
            <h1 class="form-heading">
                Fill Startup details
            </h1>
            <div class="form-image">
                <img src="{{ url('web-images/form.svg') }}" class="img-fluid">
            </div>
            <div class="form-description">
                Please fill the details very carefully and provide correct details. 
                We will verify your details through your social media.
            </div>
            <div class="startup-form">
                <form method="post" action="{{ url('registerstartup') }}" enctype="multipart/form-data">
                    @csrf
                    <div id="startupnamerequired" class="form-text">
                        Required*
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="startupname" name="startupname" class="form-control" required />
                        <label class="form-label" for="startupname">Startup Name*</label>
                    </div>
                    <div id="peoplenamerequired" class="form-text">
                        Required*
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="name" name="name" class="form-control" required />
                        <label class="form-label" for="name">Founder/Owner*</label>
                    </div>

                    <!-- Button to add more Founder/Owner -->
                    <div class="add-btn" id="addpeople-div">
                        <button type="button" id="addpeople" class="btn btn-secondary btn-sm">
                            Add more <i class="fas fa-user-alt"></i>
                        </button>
                    </div>
                    <!-- Button to add more Founder/Owner -->

                    <!-- More Founder/Owner -->
                    <div class="addfield hide" id="morepeople">
                        <div class="form-outline mb-4">
                            <input type="text" id="name1" name="name1" class="form-control" />
                            <label class="form-label" for="name1">Another founder/owner</label>
                        </div>
                        <!-- Button to remove more Founder/Owner -->
                        <div class="add-btn">
                            <button type="button" id="removepeople" class="btn btn-danger btn-sm">
                                Remove <i class="fas fa-user-alt"></i>
                            </button>
                        </div>
                        <!-- Button to remove more Founder/Owner -->
                    </div>
                    <!-- More Founder/Owner -->
                    
                    <div id="designationrequired" class="form-text">
                        Required*
                    </div>
                    <select class="form-select" aria-label="Default select example" id="designation" name="designation" required>
                        <option selected disabled>Select designation*</option>
                        <option value="founder">Founder</option>
                        <option value="owner">Owner</option>
                    </select>
                    <div class="form-outline mb-4 collegename">
                        <input type="text" id="form1Example1" name="collegename" class="form-control" />
                        <label class="form-label" for="form1Example1">College name</label>
                    </div>

                    <!-- Button to add more College -->
                    <div class="add-btn" id="addcollege-div">
                        <button type="button" id="addcollege" class="btn btn-secondary btn-sm">
                            Add more <i class="fas fa-university"></i>
                        </button>
                    </div>
                    <!-- Button to add more College -->

                    <!-- More College -->
                    <div class="addfield hide" id="morecollege">
                        <div class="form-outline mb-4">
                            <input type="text" id="collegename1" name="collegename1" class="form-control" />
                            <label class="form-label" for="collegename1">Another college name</label>
                        </div>
                        <!-- Button to remove more College -->
                        <div class="add-btn">
                            <button type="button" id="removecollege" class="btn btn-danger btn-sm">
                                Remove <i class="fas fa-university"></i>
                            </button>
                        </div>
                        <!-- Button to remove more College -->
                    </div>
                    <!-- More College -->

                    <div id="establishmentrequired" class="form-text">
                        Required*
                    </div>
                    <div class="form-outline mb-4-bottom">
                        <input type="text" id="establishment" name="establishment" class="form-control" required />
                        <label class="form-label" for="form1Example1">Place of establishment*</label>
                    </div>
                    <div class="info">Place of Establishment of your startup ex. Mumbai</div>

                    <!--Image Div-->
                    <div id="logorequired" class="form-text">
                        Required*
                    </div>
                    <div class="file-upload">
                        <button class="file-upload-btn btn btn-sm" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                        <div class="image-upload-wrap">
                            <input class="file-upload-input" id="logo" type='file' name="logo" onchange="readURL(this);" accept="image/*" />
                            <div class="drag-text">
                                <h3>Drag and drop a file or select add Image</h3>
                            </div>
                        </div>
                        <div class="file-upload-content">
                            <img class="file-upload-image img-fluid" src="#" alt="your image" />
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload()" class="remove-image btn btn-small">Remove <span class="image-title">Uploaded Image</span></button>
                            </div>
                        </div>
                    </div>
                    <!--Image Div-->

                    <div id="startuptyperequired" class="form-text">
                        Required*
                    </div>
                    <div class="form-outline mb-4-bottom">
                        <input type="text" id="startuptype" name="startuptype" class="form-control" />
                        <label class="form-label" id="required" for="startuptype">Startup type*</label>
                    </div>
                    <div class="info">Describe in one word ex. Food, beauty, craft, art, etc</div>
                    <div id="startupdetailsrequired" class="form-text">
                        Required*
                    </div>
                    <div class="form-outline form-outline">
                        <textarea class="form-control" id="startupdetails" name="startupdetails" rows="4"></textarea>
                        <label class="form-label" for="startupdetails">Describe your Startup in few words*</label>
                    </div>
                    <div class="form-outline form-outline-modify">
                        <textarea class="form-control" id="textAreaExample" name="startupbenefit" rows="4"></textarea>
                        <label class="form-label" for="textAreaExample">User benefit from your service/product</label>
                    </div>
                    <div class="form-outline mb-4-info">
                        <textarea class="form-control" id="textAreaExample" name="startupaddress" rows="3"></textarea>
                        <label class="form-label" for="textAreaExample">Startup address</label>
                    </div>
                    <div class="info">If you have physical office/shop</div>
                    
                    <div class="form-contact-details">Contact Details</div>
                    <div class="contact-warning">
                        The contacts you provide will be available to all the users. 
                    </div>

                    <div class="col-12">
                        <label class="visually-hidden" for="email">Email address</label>
                        <div class="input-group">
                          <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email address"/>
                        </div>
                    </div>

                    <!-- Button to add more Email -->
                    <div class="add-btn" id="addemail-div">
                        <button type="button" id="addemail" class="btn btn-secondary btn-sm">
                            Add more <i class="fas fa-envelope"></i>
                        </button>
                    </div>
                    <!-- Button to add more Email -->

                    <!-- More Email -->
                    <div class="addfield hide" id="moreemail">
                        <div class="col-12">
                            <label class="visually-hidden" for="email1">Extra email address</label>
                            <div class="input-group">
                              <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                              <input type="email" class="form-control" id="email1" name="email1" placeholder="Extra email address"/>
                            </div>
                        </div>
                        <!-- Button to remove more Email -->
                        <div class="add-btn">
                            <button type="button" id="removeemail" class="btn btn-danger btn-sm">
                                Remove <i class="fas fa-envelope"></i>
                            </button>
                        </div>
                        <!-- Button to remove more Email -->
                    </div>
                    <!-- More Email -->

                    <div class="col-12">
                        <label class="visually-hidden" for="contact">Contact no</label>
                        <div class="input-group">
                          <div class="input-group-text">+91</div>
                          <input type="text" class="form-control" id="contact" name="contact" onkeypress="isInputNumber(event)" placeholder="Contact no"/>
                        </div>
                    </div>

                    <!-- Button to add more Contact -->
                    <div class="add-btn" id="addcontact-div">
                        <button type="button" id="addcontact" class="btn btn-secondary btn-sm">
                            Add more <i class="fas fa-phone"></i>
                        </button>
                    </div>
                    <!-- Button to add more Contact -->

                    <!-- More Contact -->
                    <div class="addfield hide" id="morecontact">
                        <div class="col-12">
                            <label class="visually-hidden" for="contact1">Extra contact no</label>
                            <div class="input-group">
                              <div class="input-group-text">+91</div>
                              <input type="text" class="form-control" id="contact1" name="contact1" onkeypress="isInputNumber(event)" placeholder="Extra contact no"/>
                            </div>
                        </div>

                        <!-- Button to remove more Contact -->
                        <div class="add-btn">
                            <button type="button" id="removecontact" class="btn btn-danger btn-sm">
                                Remove <i class="fas fa-phone"></i>
                            </button>
                        </div>
                        <!-- Button to remove more Contact -->
                    </div>
                    <!-- More Contact -->

                    <div class="col-12">
                        <label class="visually-hidden" for="whatsapp">Whatsapp number</label>
                        <div class="input-group">
                          <div class="input-group-text">+91</div>
                          <input type="text" class="form-control" id="whatsapp" name="whatsapp" onkeypress="isInputNumber(event)" placeholder="Whatsapp number"/>
                        </div>
                    </div>

                    <!-- Button to add more Whatsapp -->
                    <div class="add-btn" id="addwhatsapp-div">
                        <button type="button" id="addwhatsapp" class="btn btn-secondary btn-sm">
                            Add more <i class="fab fa-whatsapp"></i>
                        </button>
                    </div>
                    <!-- Button to add more Whatsapp -->

                    <!-- More Whatsapp -->
                    <div class="addfield hide" id="morewhatsapp">
                        <div class="col-12">
                            <label class="visually-hidden" for="whatsapp">Extra whatsapp number</label>
                            <div class="input-group">
                              <div class="input-group-text">+91</div>
                              <input type="text" class="form-control" id="whatsapp1" name="whatsapp1" onkeypress="isInputNumber(event)" placeholder="Extra whatsapp number"/>
                            </div>
                        </div>

                        <!-- Button to remove more Whatsapp -->
                        <div class="add-btn">
                            <button type="button" id="removewhatsapp" class="btn btn-danger btn-sm">
                                Remove <i class="fab fa-whatsapp"></i>
                            </button>
                        </div>
                        <!-- Button to remove more Whatsapp -->
                    </div>
                    <!-- More Whatsapp -->

                    <!--Here all the Social Links are present-->
                    <div class="form-contact-details">Social Handles</div>

                    <div id="instagramlinkrequired" class="form-text">
                        Required*
                    </div>
                    <div class="form-outline mb-4" style="margin-bottom: 0rem !important;">
                        <input type="text" id="instagramlink" name="instagramlink" class="form-control" />
                        <label class="form-label" for="instagramlink">Instagram Link*</label>
                    </div>

                    <!-- Add Facebook -->
                    <div class="addfield hide" id="facebooklink">
                        <div class="form-outline mb-4 mb-4-info-top-p">
                            <input type="text" id="facebookfield" name="facebooklink" class="form-control" />
                            <label class="form-label" for="form1Example1">Facebook Link</label>
                        </div>

                        <div class="add-btn">
                            <button type="button" id="removefacebooklink" class="btn btn-danger btn-sm" onclick="removeLink('facebook')">
                                Remove <i class="fab fa-facebook"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Add Twitter -->
                    <div class="addfield hide" id="twitterlink">
                        <div class="form-outline mb-4 mb-4-info-top-p">
                            <input type="text" id="twitterfield" name="twitterlink" class="form-control" />
                            <label class="form-label" for="form1Example1">Twitter Link</label>
                        </div>

                        <div class="add-btn">
                            <button type="button" id="removetwitterlink" class="btn btn-danger btn-sm" onclick="removeLink('twitter')">
                                Remove <i class="fab fa-twitter twitter-modify"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Add Linkedin -->
                    <div class="addfield hide" id="linkedinlink">
                        <div class="form-outline mb-4 mb-4-info-top-p">
                            <input type="text" id="linkedinfield" name="linkedinlink" class="form-control" />
                            <label class="form-label" for="form1Example1">Linkedin Link</label>
                        </div>

                        <div class="add-btn">
                            <button type="button" id="removelinkedinlink" class="btn btn-danger btn-sm" onclick="removeLink('linkedin')">
                                Remove <i class="fab fa-linkedin-in linkedin-in-modify"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Add Youtube -->
                    <div class="addfield hide" id="youtubelink">
                        <div class="form-outline mb-4 mb-4-info-top-p">
                            <input type="text" id="youtubefield" name="youtubelink" class="form-control" />
                            <label class="form-label" for="form1Example1">Youtube Link</label>
                        </div>

                        <div class="add-btn">
                            <button type="button" id="removeyoutubelink" class="btn btn-danger btn-sm" onclick="removeLink('youtube')">
                                Remove <i class="fab fa-youtube youtube-modify"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Add Flipcart -->
                    <div class="addfield hide" id="flipcartlink">
                        <div class="form-outline mb-4 mb-4-info-top-p">
                            <input type="text" id="flipcartfield" name="flipcartlink" class="form-control" />
                            <label class="form-label" for="form1Example1">Flipcart Link</label>
                        </div>

                        <div class="add-btn">
                            <button type="button" id="removeflipcartlink" class="btn btn-danger btn-sm" onclick="removeLink('flipcart')">
                                Remove <i class="fas fa-shopping-bag"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Add Amazon -->
                    <div class="addfield hide" id="amazonlink">
                        <div class="form-outline mb-4 mb-4-info-top-p">
                            <input type="text" id="amazonfield" name="amazonlink" class="form-control" />
                            <label class="form-label" for="form1Example1">Amazon Link</label>
                        </div>

                        <div class="add-btn">
                            <button type="button" id="removeamazonlink" class="btn btn-danger btn-sm" onclick="removeLink('amazon')">
                                Remove <i class="fab fa-amazon amazon-modify"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Add Swiggy -->
                    <div class="addfield hide" id="swiggylink">
                        <div class="form-outline mb-4 mb-4-info-top-p">
                            <input type="text" id="swiggyfield" name="swiggylink" class="form-control" />
                            <label class="form-label" for="form1Example1">Swiggy Link</label>
                        </div>

                        <div class="add-btn">
                            <button type="button" id="removeswiggylink" class="btn btn-danger btn-sm" onclick="removeLink('swiggy')">
                                Remove <i class="fas fa-pizza-slice pizza-slice-modify"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Add Zomato -->
                    <div class="addfield hide" id="zomatolink">
                        <div class="form-outline mb-4 mb-4-info-top-p">
                            <input type="text" id="zomatofield" name="zomatolink" class="form-control" />
                            <label class="form-label" for="form1Example1">Zomato Link</label>
                        </div>

                        <div class="add-btn">
                            <button type="button" id="removezomatolink" class="btn btn-danger btn-sm" onclick="removeLink('zomato')">
                                Remove <i class="fas fa-pizza-slice pizza-slice-modify"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Add Magicpin -->
                    <div class="addfield hide" id="magicpinlink">
                        <div class="form-outline mb-4 mb-4-info-top-p">
                            <input type="text" id="magicpinfield" name="magicpinlink" class="form-control" />
                            <label class="form-label" for="form1Example1">Magicpin Link</label>
                        </div>

                        <div class="add-btn">
                            <button type="button" id="removemagicpinlink" class="btn btn-danger btn-sm" onclick="removeLink('magicpin')">
                                Remove <i class="fas fa-thumbtack thumbtack-modify"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Add Map -->
                    <div class="addfield hide" id="maplink">
                        <div class="form-outline mb-4 mb-4-info-top-p">
                            <input type="text" id="mapfield" name="maplink" class="form-control" />
                            <label class="form-label" for="form1Example1">Map Link</label>
                        </div>

                        <div class="add-btn">
                            <button type="button" id="removemaplink" class="btn btn-danger btn-sm" onclick="removeLink('map')">
                                Remove <i class="fas fa-map-marker-alt map-marker-alt-modify"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Add Other -->
                    <div class="addfield hide" id="otherlink">
                        <div class="form-outline mb-4 mb-4-info-top-p">
                            <input type="text" id="otherfield" name="otherlink" class="form-control" />
                            <label class="form-label" for="form1Example1">Other Link</label>
                        </div>

                        <div class="add-btn">
                            <button type="button" id="removeotherlink" class="btn btn-danger btn-sm" onclick="removeLink('other')">
                                Remove <i class="fas fa-unlink unlink-modify"></i>
                            </button>
                        </div>
                    </div>
			
			<div class="social-notify">
                       	You can add another link, for ex. Facebook, Twitter, etc. by clicking on the
                       	button below.
                    	</div>
                    <!-- Button to add more Social Link -->
                    <div class="add-btn" id="addlink-div">
                        <button type="button" id="addlink" class="btn btn-secondary btn-sm" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                            Add more <i class="fas fa-link"></i>
                        </button>
                    </div>
                    <!-- Button to add more Social Link -->

                     <!-- Button to Register Social Link -->
                     {{-- <div class="add-btn hide" id="registerlink-div">
                        <button type="button" id="addlink" class="btn btn-secondary btn-sm" data-mdb-toggle="modal" data-mdb-target="#exampleModal1">Did't find your Link</button>
                    </div> --}}
                    <!-- Button to Register Social Link -->

                    <!--Here all the Social Links are present-->

                    <div class="form-contact-details">Website and App Link</div>

                    <div class="form-outline mb-4 mb-4-info-top-p">
                        <input type="text" id="form1Example1" name="websitelink" class="form-control" />
                        <label class="form-label" for="form1Example1">Website Link</label>
                    </div>
                    <div class="form-outline mb-4 mb-4-info-top-p">
                        <input type="text" id="form1Example1" name="applink" class="form-control" />
                        <label class="form-label" for="form1Example1">App Link</label>
                    </div>
                    
                    <div class="submit-btn">
                        <button type="button" class="btn btn-secondary btn-lg" id="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- share --}}
        <a class="bi bi-share ripple lg-share" onclick="shareStartupform()" title="Share this startup"></a>
        {{-- share --}}
    </div>
    @include('footer')

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ url('jquery/form/startupform.js') }}"></script>

    <script type="text/javascript">
        function addLink(link){
            if(link == 'facebook'){
                $('#facebook').addClass('hide'); //Hide Facebook button in Modal 
                $('#facebooklink').removeClass('hide'); //Display Facebook input field
            }
            else if(link == 'twitter'){
                $('#twitter').addClass('hide'); //Hide Twitter button in Modal 
                $('#twitterlink').removeClass('hide'); //Display Twitter input field
            }
            else if(link == 'linkedin'){
                $('#linkedin').addClass('hide'); //Hide Linkedin button in Modal 
                $('#linkedinlink').removeClass('hide'); //Display Linkedin input field
            }
            else if(link == 'youtube'){
                $('#youtube').addClass('hide'); //Hide Youtube button in Modal 
                $('#youtubelink').removeClass('hide'); //Display Youtube input field
            }
            else if(link == 'flipcart'){
                $('#flipcart').addClass('hide'); //Hide Flipcart button in Modal 
                $('#flipcartlink').removeClass('hide'); //Display Flipcart input field
            }
            else if(link == 'amazon'){
                $('#amazon').addClass('hide'); //Hide Amazon button in Modal 
                $('#amazonlink').removeClass('hide'); //Display Amazon input field
            }
            else if(link == 'swiggy'){
                $('#swiggy').addClass('hide'); //Hide Swiggy button in Modal 
                $('#swiggylink').removeClass('hide'); //Display Swiggy input field
            }
            else if(link == 'zomato'){
                $('#zomato').addClass('hide'); //Hide Zomato button in Modal 
                $('#zomatolink').removeClass('hide'); //Display Zomato input field
            }
            else if(link == 'magicpin'){
                $('#magicpin').addClass('hide'); //Hide Magicpin button in Modal 
                $('#magicpinlink').removeClass('hide'); //Display Magicpin input field
            }
            else if(link == 'map'){
                $('#map').addClass('hide'); //Hide Map button in Modal 
                $('#maplink').removeClass('hide'); //Display Map input field
            }
            else if(link == 'other'){
                $('#other').addClass('hide'); //Hide Other button in Modal 
                $('#otherlink').removeClass('hide'); //Display Other input field
            }
            var height = $('.modal-body').height();
            if(height < 25){
                $('#addlink-div').addClass('hide');
                $('.social-notify').addClass('hide');
                // $('#registerlink-div').removeClass('hide');
            }
            $('#exampleModal').modal('hide');
        }

        function removeLink(link){
            // console.log(link)
            if(link == 'facebook'){
                $('#facebookfield').val("");
                $('#facebooklink').addClass('hide'); //Hide Facebook input field
                $('#facebook').removeClass('hide'); //Display Facebook button in Modal 
            }
            else if(link == 'twitter'){
                $('#twitterfield').val("");
                $('#twitterlink').addClass('hide'); //Hide Twitter input field
                $('#twitter').removeClass('hide'); //Display Twitter button in Modal 
            }
            else if(link == 'linkedin'){
                $('#linkedinfield').val("");
                $('#linkedinlink').addClass('hide'); //Hide Linkedin input field
                $('#linkedin').removeClass('hide'); //Display Linkedin button in Modal 
            }
            else if(link == 'youtube'){
                $('#youtubefield').val("");
                $('#youtubelink').addClass('hide'); //Hide Youtube input field
                $('#youtube').removeClass('hide'); //Display Youtube button in Modal 
            }
            else if(link == 'flipcart'){
                $('#flipcartfield').val("");
                $('#flipcartlink').addClass('hide'); //Hide Flipcart input field
                $('#flipcart').removeClass('hide'); //Display Flipcart button in Modal 
            }
            else if(link == 'amazon'){
                $('#amazonfield').val("");
                $('#amazonlink').addClass('hide'); //Hide Amazon input field
                $('#amazon').removeClass('hide'); //Display Amazon button in Modal 
            }
            else if(link == 'swiggy'){
                $('#swiggyfield').val("");
                $('#swiggylink').addClass('hide'); //Hide Swiggy input field
                $('#swiggy').removeClass('hide'); //Display Swiggy button in Modal 
            }
            else if(link == 'zomato'){
                $('#zomatofield').val("");
                $('#zomatolink').addClass('hide'); //Hide Zomato input field
                $('#zomato').removeClass('hide'); //Display Zomato button in Modal 
            }
            else if(link == 'magicpin'){
                $('#magicpinfield').val("");
                $('#magicpinlink').addClass('hide'); //Hide Magicpin input field
                $('#magicpin').removeClass('hide'); //Display Magicpin button in Modal 
            }
            else if(link == 'map'){
                $('#mapfield').val("");
                $('#maplink').addClass('hide'); //Hide Map input field
                $('#map').removeClass('hide'); //Display Map button in Modal 
            }
            else if(link == 'other'){
                $('#otherfield').val("");
                $('#otherlink').addClass('hide'); //Hide Other input field
                $('#other').removeClass('hide'); //Display Other button in Modal 
            }
            if($("#addlink-div").hasClass("hide")){
                $("#addlink-div").removeClass("hide");
                $('.social-notify').removeClass('hide');
            }
        }

        // Founder Name
        $('#addpeople').click(function(){
            $('#name1').val("");
            $('#addpeople-div').hide();
            $('#morepeople').removeClass('hide');
        });
        $('#removepeople').click(function(){
            $('#morepeople').addClass('hide');
            $('#addpeople-div').show();
        });

        // College Name
        $('#addcollege').click(function(){
            $('#addcollege-div').hide();
            $('#morecollege').removeClass('hide');
        });
        $('#removecollege').click(function(){
            $('#collegename1').val("");
            $('#morecollege').addClass('hide');
            $('#addcollege-div').show();
        });

        // Email
        $('#addemail').click(function(){
            $('#addemail-div').hide();
            $('#moreemail').removeClass('hide');
        });
        $('#removeemail').click(function(){
            $('#email1').val("");
            $('#moreemail').addClass('hide');
            $('#addemail-div').show();
        });

        // Contact
        $('#addcontact').click(function(){
            $('#addcontact-div').hide();
            $('#morecontact').removeClass('hide');
        });
        $('#removecontact').click(function(){
            $('#contact1').val("");
            $('#morecontact').addClass('hide');
            $('#addcontact-div').show();
        });

        // Whatsapp
        $('#addwhatsapp').click(function(){
            $('#addwhatsapp-div').hide();
            $('#morewhatsapp').removeClass('hide');
        });
        $('#removewhatsapp').click(function(){
            $('#whatsapp1').val("");
            $('#morewhatsapp').addClass('hide');
            $('#addwhatsapp-div').show();
        });

        //Image JS
        function readURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#logorequired').css("color", "white"); 
                    $('.image-upload-wrap').hide();
                    $('.file-upload-image').attr('src', e.target.result);
                    $('.file-upload-content').show();
                    // $('.image-title').html(input.files[0].name);
                };
                reader.readAsDataURL(input.files[0]);
            }else{
                removeUpload();
            }
        }

        function removeUpload(){
            $("#logo").val(null); 
            $('#logorequired').css("color", "red");
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
        }
        $('.image-upload-wrap').bind('dragover', function (){
            $('.image-upload-wrap').addClass('image-dropping');
        });
        $('.image-upload-wrap').bind('dragleave', function () {
            $('.image-upload-wrap').removeClass('image-dropping');
        });

        function registerLink(){
            $('#exampleModal1').modal('hide');
        }

        $('#submit').click(function(){
            checkemptyField();
        });

        function shareStartupform(){
            $('#sharestartupformModal').modal('show');
        }

        $('#feedback').click(function(){
            $('#feedbackModal').modal('show');
        });
    </script>
</body>
</html>

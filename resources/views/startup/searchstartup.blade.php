<!doctype html>
<html lang="en">
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Startups - See newly formed Indian Startups at Ajourney only. - ajourney.in">
		<link rel="apple-touch-icon" sizes="180x180" href="../web-images/apple-touch-icon.png">
		{{-- <link rel="icon" type="image/png" sizes="32x32" href="../web-images/favicon-32x32.png"> --}}
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
		<meta property="og:url" content="https://www.ajourney.in/startup/search" />
		<meta property="og:site_name" content="ajourney.in" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		{{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}
		{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" > --}}
		{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" > --}}
		{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" /> --}}
		{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
		<!-- Bootstrap core CSS -->
		{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"> --}}
      
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" />

      <link rel="stylesheet" href="{{ url('css/google-fonts.css') }}" >
		<link rel="stylesheet" href="{{ url('css/all-startup.css') }}" >
		<link rel="stylesheet" href="{{ url('css/search.css') }}" >
		<title>Search | All Indian Startups - Ajourney</title>
   </head>
   <body>
      @include('top-navbar')
      <div class="container-lg">
         <div class="search-option">
            <div class="breadcrumb-wrapper">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ url('/') }}" class="breadcrumb-item-link">Home</a></li>
                     <li class="breadcrumb-item"><a href="{{ url('startup/allstartup') }}" class="breadcrumb-item-link">Startups</a></li>
                     <li class="breadcrumb-item breadcrumb-active" aria-current="page">Search</li>
                  </ol>
               </nav>
            </div>
            <div class="container">
               <div class="main-search-div"> 
                  <div class="input-group rounded search-div">
                     <div class="form" id="search-form-div"> 
                        <i class="bi bi-search"></i> 
                        <input type="text" class="form-control form-input" placeholder="Start typing to filter...." id="searchkey" onclick="changeSearchbox();" onkeyup="Serach();"> 
                     </div>
                        <i class="bi bi-x-lg hide" id="cancel-search" onclick="cancelSearch()"></i> 
                  </div>
                 
                  <div class="serach-result"></div>
               </div>
            </div>
            <div class="container-lg container-lg-search">
               <div class="all-startup-images" id="all-startup-images">
                  @include('startup.searchstartup-data')
               </div>
               <div class="ajax-load text-center" style="display:none">
						<p><img src="{{url('images/loader.gif')}}" /></p>
					</div>
            </div>
         </div>
      </div>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/underscore@1.13.1/underscore-umd-min.js"></script>

      <script src="{{ url('jquery/search.js') }}"></script>
      <script src="{{ url('jquery/highlight.js') }}"></script>
      
      <script type="text/javascript">
         
      </script>
   </body>
</html>



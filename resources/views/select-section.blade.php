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
      <meta property="og:title" content="See Newly Rising Startups, Trending Topics and Share memes | ajourney.in" />
      <meta property="og:image" content="https://www.ajourney.in/web-images/aj.jpg" />
      <meta property="og:url" content="https://www.ajourney.in/selectsection" />
      <meta property="og:site_name" content="ajourney.in" />
     
     <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-93GHM2WY79"></script>
	<script>
  		window.dataLayer = window.dataLayer || [];
  			function gtag(){dataLayer.push(arguments);}
  			gtag('js', new Date());
			gtag('config', 'G-93GHM2WY79');
	</script>

      <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> 
      <link href="https://fonts.googleapis.com/css2?family=Exo:wght@800&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">      
      
      <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />     
      <link href="{{ asset('css/login.css') }}" rel="stylesheet">
      <link href="{{ asset('css/select-section.css') }}" rel="stylesheet">
      <link href="{{ asset('css/contact-us.css') }}" rel="stylesheet">
      <!-- MDB -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <title>Select Section - Ajourney</title>
   </head>
   <body>
      <!-- Navbar -->
      @include('top-navbar')
      <!-- Navbar -->
      <div class="container">
         <div class="head-part">
            <h2>Choose anyone to view</h2>
            <i class="bi bi-exclamation-octagon" data-mdb-toggle="tooltip" data-mdb-placement="left" title="Click on anyone to see"></i>
         </div>
         <div class="center-section">
            <div class="sections-1">
               <a href="{{url('startup/allstartup')}}" class="view-startup">
                  <div class="sec-img">
                     <img src="../web-images/view-stp.svg" class="sec-img">
                  </div>
                  <div class="vs-text">
                     <p>Startup's</p>
                     Here are the noteworthy startups from India, get an overview of startups nationwide.
                  </div>
               <a href="{{ url('startup/allstartup') }}" class="arrow-right-btn"><i class="bi bi-arrow-right"></i></a>
               </a>
            </div>
            <div class="sections-2">
               <a href="{{url('knowledgehome')}}" class="view-information">
                  <div class="sec-img">
                     <img src="../web-images/view-information.svg" class="sec-img">
                  </div>
                  <div class="vs-text">
                     <p>Knowledge</p>
                     Keep up to date with the latest trends, topics and famous personalities with our handpicked information.
                  </div>
               <a href="{{url('knowledgehome')}}" class="arrow-right-btn"><i class="bi bi-arrow-right"></i></a>
               </a>
            </div>
            <div class="sections-3">
               <a href="{{url('memes')}}" class="view-meme">
                  <div class="sec-img">
                     <img src="../web-images/view-meme.png" class="sec-img">
                  </div>
                  <div class="vs-text">
                     <p>Memes</p>
                     Woah! Here you can watch memes react, leave comments, and even post your own!
                  </div>
               <a href="{{ url('memes') }}" class="arrow-right-btn"><i class="bi bi-arrow-right"></i></a>
               </a>
            </div>
         </div>
      </div>
      @include('footer')
   </body>
</html>


<!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="Startups - See newly formed Indian Startups | Trending Topics - Get the latest specially handpicked information | Memes - Share, react, comment on memes at Ajourney only. - ajourney.in">
  
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
   <meta property="og:title" content="About us | ajourney.in" />
   <meta property="og:image" content="https://www.ajourney.in/web-images/aj.jpg" />
   <meta property="og:url" content="https://www.ajourney.in/about" />
   <meta property="og:site_name" content="https://www.ajourney.in" />
    
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
   <link rel="stylesheet" href="{{ asset('css/about-us.css') }}" >

   
   <!-- MDB -->
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js" ></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

   <title>About us - Ajourney</title>
   </head>
   <body>
    <!-- Navbar-->
      @include('top-navbar') 
    <!-- Navbar --> 
    <section>
        <div class="container ab-section">
            <div class="about-wrapper">
                <h1 class="about-heading">About Us</h1>
                <div class="wc-heading">Welcome to <span>AJOURNEY,</span></div>
				<div class="ab-para-wrapper">
					<p class="ab-paratext">Ajourney is a professional platform for startups, memes, and knowledge sharing. Our goal is to provide you only with interesting content, which you will love.<br>
						<p class="ab-paratext">Our goal is to help people show up here with their startups, regardless of their size. Our team has taken the initiative of highlighting all small startups on our website. You can reach us at any time if you have a startup, please send an email to <a href="mailto:info@ajourney.in">info@ajourney.in</a></p>
						<p class="ab-paratext">We’re dedicated to offering you with exceptional Indian startups, memes, knowledge, with a focus on reliability, and to offer valuable content. <br />
						<p class="ab-paratext">We're working to turn our passion for sharing startups, memes and knowledge into a booming online website. Were hoping you enjoy our shared startups, memes, and knowledge as much as we enjoy offering them to you.</p>
						<div class="lw-ab">Keep visiting our website as we will continue to post important information. Your love and support are greatly appreciated.</div>
						<div class="query-ab">For any query contact us on: <a href="mailto:info@ajourney.in"><span><i class="bi bi-envelope"></i></span>info@ajourney.in</a></div>
						<div class="thanking-ab">We're glad you stopped by!</div>
						<p class="make-ab">Made in India with <span style="color: red; font-size: 24px;">&#9829;</span></p>
				</div>
            </div>
    </section> 
    @include('footer')
  </body>
</html>
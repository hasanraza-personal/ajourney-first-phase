<!doctype html>
<html lang="en">
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Startups - See newly formed Indian Startups at Ajourney only. - ajourney.in">
		<link rel="apple-touch-icon" sizes="180x180" href="../web-images/apple-touch-icon.png">
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
		{{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}
		{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" >
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" > --}}
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
		{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		
		<link rel="stylesheet" href="{{ url('css/google-fonts.css') }}" >
		<link rel="stylesheet" href="{{ url('css/all-startup.css') }}" >
		<title>Startups | All Indian Startups - Ajourney</title>
   	</head>
   	<body>
		{{-- Navbar --}}
		@include('top-navbar')
		{{-- Navbar --}}
		<div class="container">
			<h4 class="header-page-title">Check out the Future unicorn <span>Indian</span> Startups</h4>
			<div id="carouselInterval" class="carousel slide" data-mdb-ride="carousel">
				<div class="carousel-inner">
				<?php $count = 1; ?>
				@foreach($randomstartups as $randomstartup)
					@if($count == 1)
						<div class="carousel-item active" data-mdb-interval="50000">
							<div class="display-short">
								<div class="startup-mainphoto w-50">
									<img src="{{"../startup/".$randomstartup->startupmainphoto}}" class="d-block" height="500px" width="100%" alt="Startup Image"/>
								</div>
								<div class="startup-info w-50">
									<div class="startup-name">{{$randomstartup->startupname}}</div>
									<div class="startup-about">
									<p id="crousalstartupdetails">{!! \Illuminate\Support\Str::limit($randomstartup->startupdetails,125,"...") !!}</p>
										<div class="founder-details">
											<div class="founder-name">
												@if($randomstartup->foundername2!="")
													<span>Founders:</span> <br><i class="bi bi-person"></i> {{$randomstartup->foundername1}}<br><i class="bi bi-person"></i> {{$randomstartup->foundername2}}<br>
												@elseif($randomstartup->foundername1!="")
													<span>Founder:</span> <br><i class="bi bi-person"></i> {{$randomstartup->foundername1}}<br>
												@endif

												@if($randomstartup->cofoundername!="")
													<span>Co-founder:</span> <br><i class="bi bi-person"></i> {{$randomstartup->cofoundername}}<br>
												@endif

												@if($randomstartup->ownername5!="")
													<span>Owners:</span> <br><i class="bi bi-person"></i> {{$randomstartup->ownername1}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername2}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername3}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername4}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername5}}<br>
												@elseif($randomstartup->ownername4!="")
													<span>Owners:</span> <br><i class="bi bi-person"></i> {{$randomstartup->ownername1}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername2}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername3}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername4}}<br>
												@elseif($randomstartup->ownername3!="")
													<span>Owners:</span> <br><i class="bi bi-person"></i> {{$randomstartup->ownername1}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername2}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername3}}<br>
												@elseif($randomstartup->ownername2!="")
													<span>Owners:</span> <br><i class="bi bi-person"></i> {{$randomstartup->ownername1}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername2}}<br>
												@elseif($randomstartup->ownername1!="")
													<span>Owner:</span> <br><i class="bi bi-person"></i> {{$randomstartup->ownername1}}<br>
												@endif
											</div>
										</div>
									<?php //$special = array(" ", "'");$replace = array('%', '&');$startuplink = str_replace($special,$replace,$randomstartup->startupname);
										$startuplink = str_replace(' ', '+', $randomstartup->startupname);?>
										<a class="btn btn-secondary rm-btn" href="{{url('startup/'.$startuplink)}}">Read more</a>
									</div>
									<div class="share-w-svg">
										<div class="share" onclick="shareStartup()"><i class="bi bi-share ripple"></i></div>
										<img src="{{"../startup-svg/".$randomstartup->startupsvg}}" class="svg"  alt="Startup related SVG"/>
									</div>
								</div>
							</div>
						</div>
					<?php $count++; ?>
					@else
						<div class="carousel-item">
							<div class="display-short">
								<div class="startup-mainphoto w-50">
									<img src="{{"../startup/".$randomstartup->startupmainphoto}}" class="d-block" height="500px" width="100%" loading="lazy" alt="Startup Image"/>
								</div>
								<div class="startup-info w-50">
									<div class="startup-name">{{$randomstartup->startupname}}</div>
									<div class="startup-about">
									<p id="secondcarouseldata">{!! \Illuminate\Support\Str::limit($randomstartup->startupdetails,125,"...") !!}</p>
									<div class="founder-details">
										<div class="founder-name">
										@if($randomstartup->foundername2!="")
											<span>Founders:</span> <br><i class="bi bi-person"></i> {{$randomstartup->foundername1}}<br><i class="bi bi-person"></i> {{$randomstartup->foundername2}}<br>
										@elseif($randomstartup->foundername1!="")
											<span>Founder:</span> <br><i class="bi bi-person"></i> {{$randomstartup->foundername1}}<br>
										@endif
										
										@if($randomstartup->cofoundername!="")
											<span>Co-Founder:</span> <br><i class="bi bi-person"></i> {{$randomstartup->cofoundername}}<br>
										@endif

										@if($randomstartup->ownername5!="")
											<span>Owners:</span> <br><i class="bi bi-person"></i> {{$randomstartup->ownername1}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername2}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername3}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername4}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername5}}<br>
										@elseif($randomstartup->ownername4!="")
											<span>Owners:</span> <br><i class="bi bi-person"></i> {{$randomstartup->ownername1}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername2}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername3}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername4}}<br>
										@elseif($randomstartup->ownername3!="")
											<span>Owners:</span> <br><i class="bi bi-person"></i> {{$randomstartup->ownername1}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername2}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername3}}<br>
										@elseif($randomstartup->ownername2!="")
											<span>Owners:</span> <br><i class="bi bi-person"></i> {{$randomstartup->ownername1}}<br><i class="bi bi-person"></i> {{$randomstartup->ownername2}}<br>
										@elseif($randomstartup->ownername1!="")
											<span>Owner:</span> <br><i class="bi bi-person"></i> {{$randomstartup->ownername1}}<br>
										@endif
										</div>
									</div>
									<?php //$special = array(" ", "'");$replace = array('%', '&');$startuplink = str_replace($special,$replace,$randomstartup->startupname);
										$startuplink = str_replace(' ', '+', $randomstartup->startupname);?>
										<a class="btn btn-secondary rm-btn" href="{{url('startup/'.$startuplink)}}">Read more</a>
									</div>
									<div class="share-w-svg">
										<div class="share" onclick="shareStartup()"><i class="bi bi-share"></i></div>
										<img src="{{"../startup-svg/".$randomstartup->startupsvg}}" class="svg" loading="lazy" alt="Startup related SVG"/>
									</div>
								</div>
							</div>
						</div>
					@endif
				@endforeach
				</div>
				<button  class="carousel-control-prev"  data-mdb-target="#carouselInterval" type="button"  data-mdb-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button  class="carousel-control-next"  data-mdb-target="#carouselInterval" type="button"  data-mdb-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
		<section class="section-wrapper">
			<div class="container">
				<h3 class="rev-header">Features</h3>
				<div class="rev-wrapper">
					<div class="rev-1">
						<img src="{{"../web-images/rev-1.jpg"}}" class="rev-img add-border-5"/>
					</div>
					<div class="rev-1-content-wrapper">
						<h2 class="rev-1-title">100+ Startups</h2>
						<p class="rev-1-text">Not one but many! Specified startups only for you.</p>
					</div>
				</div>
				<div class="rev-wrapper reverse">
					<div class="rev-1-content-wrapper">
						<h2 class="rev-1-title">40+ Categories</h2>
						<p class="rev-1-text">The categories below have been created to make things easier for you.</p>
					</div>
					<div class="rev-1">
						<img src="{{"../web-images/category 1.svg"}}" loading="lazy" class="rev-img"/>
					</div>
				</div>
				<div class="rev-wrapper">
					<div class="rev-1">
						<img src="{{"../web-images/filter 1.svg"}}" class="rev-img"/>
					</div>
					<div class="rev-1-content-wrapper">
						<h2 class="rev-1-title">Filter</h2>
						<p class="rev-1-text">It is now possible to filter startups based on your preference and find your favorite startups.</p>
					</div>
				</div>
			</div>
		</section>
		
		<!--More startups-->
		<div class="container-lg">
			<div class="main-stps">
				<div class="more-startups-section">
					<h3 class="moresection">More Startups</h3>
					<a href="{{ url('startup/search') }}">
						<div class="search-startups">
							<i class="bi bi-search"></i><span class="search-icon" style="font-weight:bold;">Search</span>
						</div>
					</a>
				</div>
				{{-- Filter Scroll --}}
				<div class="filter-button-wrapper">
					<div class="filter-startup">
						<div class="dropdown">
							<a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-mdb-toggle="dropdown" aria-expanded="false" style="background-color:#5B00FF; margin-left: 10px;">
							  	Select
							</a>
						  	<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							  <li><a class="dropdown-item" href="javascript:void(0)" onclick="filter('category')">Category</a></li>
							  <li><a class="dropdown-item" href="javascript:void(0)" onclick="filter('college')">College</a></li>
							  <li><a class="dropdown-item" href="javascript:void(0)" onclick="filter('location')">Location</a></li>
							</ul>
						</div>
					</div>
					<div class="filter-scroll">
						<button onclick="scrollFilter('right')" id="button1" class="filter-scroll-button scroll-btn1"><i class="bi bi-chevron-left"></i></button>
						<button onclick="scrollFilter('left')" id="button1" class="filter-scroll-button"><i class="bi bi-chevron-right"></i></button>
					</div>
				</div>

				<div class="filter-wrapper">
					<div class="filter-link hide-scroll" id="filter-link">
						<a href="javascript:void(0)" onclick="selectFiltercategory('all','all')">
							<button type="button" class="btn btn-light filter-btn" id="all-btn" style="background-color:#5B00FF; color:white;">ALL</button>
						</a>
						@foreach($startuptypes as $startuptype)
							<?php 
								$startupcategorylink = str_replace(' ', '+', $startuptype->startuptype);
								$input = preg_replace("/[^a-zA-Z]+/", "", $startuptype->startuptype);
							?>
							<a href="javascript:void(0)" onclick="selectFiltercategory('{{$startuptype->startuptype}}','{{$input}}')">
								<button type="button" class="btn btn-light filter-btn" id="btn_{{$input}}">{{$startuptype->startuptype}}</button>
							</a>
						@endforeach
					</div>
				</div>
			</div>
			<main class="main-all-startup">
				<div class="all-startup-wrapper">
					<div class="startups-items" id="all-startup">
						@include('startup.startupdata')
					</div>
					<div class="ajax-load text-center" style="display:none">
						<p><img src="{{url('images/loader.gif')}}" /></p>
					</div>
				</div>
			</main>
		</div>
		@include('startup.shareallstartup')

		@include('footer');
		
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		{{-- <script type="text/javascript" src="https://cdn.rawgit.com/asvd/dragscroll/master/dragscroll.js"></script> --}}
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/underscore@1.13.1/underscore-umd-min.js"></script>
		<script src="{{ asset('jquery/allstartup.js')}}"></script>

   </body>
</html>
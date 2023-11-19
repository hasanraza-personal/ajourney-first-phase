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
    <meta property="og:title" content="See Newly Trending Topics | ajourney.in" />
    <meta property="og:image" content="https://www.ajourney.in/web-images/aj.jpg" />
    <meta property="og:site_name" content="ajourney.in" />
    
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />

    <link href="{{ asset('css/knowledge-detail.css') }}" rel="stylesheet">
    
    <title>All about the world, general information - Ajourney </title>
    </head>
    <body>
    {{-- Navbar --}}
        @include('top-navbar')
    {{-- Navbar --}}

    <?php $count = 1;?>
    <div class="container col-md-8">
        @foreach($knowledges as $knowledge)
            @if($count == 1)
                <div class="display-knowledge-without-accordian">
                    <h1 class="knowledge-topic-heading">
                        {{$knowledge->topicheading}}
                    </h1>
                    <div class="topicphoto">
                        <img src="{{"../knowledge/".$knowledge->topicphoto}}" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="knowledge-topic-details" style="font-size:16px !important;">
                        {!!$knowledge->topicdetails!!}
                    </div>
                </div>
                <?php $count++;?>
            @else
            <div class="accordion accordion-flush" id="accordionFlush">
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne{{$knowledge->knowledgesrno}}">
                    <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseOne{{$knowledge->knowledgesrno}}" aria-expanded="false" aria-controls="flush-collapseOne{{$knowledge->knowledgesrno}}">
                        {{$knowledge->topicheading}}
                    </button>
                </h2>
                <div id="flush-collapseOne{{$knowledge->knowledgesrno}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne{{$knowledge->knowledgesrno}}" data-mdb-parent="#accordionFlush">
                    <div class="topicphoto">
                        <img src="{{"../knowledge/".$knowledge->topicphoto}}" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="accordion-body">
                        {!!$knowledge->topicdetails!!}
                    </div>
                </div>
              </div>
            </div>
            @endif
        @endforeach
    </div>
    <br>
    <footer class="text-center text-white">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2021 Copyright:
            <a class="text-white" href="{{ url('/') }}">ajourney.in</a>
            <div class="text-center text-white" style="font-size: 14px">All Rights reserved</div>
            <div class="text-center text-white" style="font-size: 14px"><a href="{{ url('termsandcondition') }}" class="text-white">Terms & Conditions</a> |<a href="{{ url('privacypolicy') }}" class="text-white"> Privacy policy</a> </div>
        </div>
        <!-- Copyright -->
    </footer>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/asvd/dragscroll/master/dragscroll.js"></script>
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
    </script>
    
  </body>
</html>

<!doctype html>

<html lang="en">

    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="Startups - See newly formed Indian Startups | Trending Topics - Get the latest specially handpicked information | Memes - Share, react, comment on memes at Ajourney only. - ajourney.in">

        <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/web-images/apple-touch-icon.png') }}">

        <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/web-images/favicon-32x32.png') }}">

        <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/web-images/favicon-16x16.png') }} ">

        <link rel="manifest" href="{{ url('/web-images/site.webmanifest')}}">

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

        <meta property="og:image" content="https://ajourney.in/web-images/aj.jpg" />

        <meta property="og:url" content="https://ajourney.in/startup/allstartup" />

        <meta property="og:site_name" content="ajourney.in" />

        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link rel="preconnect" href="https://fonts.gstatic.com">

        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />

        <link href="{{ asset('css/all-startup.css') }}" rel="stylesheet">



        <title>Startups | All Indian Startups - Ajourney</title>

    </head>

    <body>

        {{-- Navbar --}}

        @include('top-navbar')

        {{-- Navbar --}}

        <?php

            $filter = Request::segment(2);

            $filter = str_replace('+', ' ', $filter);



            $filter_option = Request::segment(3);

            $filter_option = str_replace('+', ' ', $filter_option);

        ?>

        <!--More startups-->

        <div class="container-lg">

            <div class="breadcrumb-wrapper">

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="breadcrumb-item-link">Home</a></li>

                        <li class="breadcrumb-item"><a href="{{ url('startup/allstartup') }}" class="breadcrumb-item-link">Startup</a></li>

                        <li class="breadcrumb-item breadcrumb-active" aria-current="page">{{ucfirst($filter)}} - {{$filter_option}}</li>

                    </ol>

                </nav>

            </div>

            



            <main class="main-all-startup">

				<div class="all-startup-wrapper">

                    <div class="startups-items" id="category-all-startup">

                        @include('startup.categorydata')

                    </div>

                </div>

            </main>

            <div class="ajax-load text-center" style="display:none">

                <p><img src="{{url('web-images/loader.gif')}}" /></p>

            </div>

        </div>



        @include('startup.shareallstartup')



       @include('footer')


        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.js"></script>

        <script type="text/javascript" src="https://cdn.rawgit.com/asvd/dragscroll/master/dragscroll.js"></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/underscore@1.13.1/underscore-umd-min.js"></script>

        <script type="text/javascript">

            //To load data from the database in a asynchronous way

            function loadMoreData(page){

                $.ajax({

                    url:'?page=' +page,

                    type:'get',

                    beforeSend:function(){

                        $('.ajax-load').show();

                    }

                })

                .done(function(data){

                    if(data.html == ""){

                       $('.ajax-load').html('You have reached the end');

                        return;

                    }

                    $('.ajax-load').hide();
                    $('#category-all-startup').append(data.html);

                });

            }

            //for lazy loading

            var page = 1;

            jQuery(document).ready(function(){

                $(document).on('scroll', _.throttle(function(){

                    var scroll = Math.ceil($(window).scrollTop());

                    scroll = scroll + 4000;

                    if(scroll>=$(document).height()-$(window).height()){

                        page++;

                        loadMoreData(page);

                    }

                }, 2000));  

            });

        </script>

   </body>

</html>




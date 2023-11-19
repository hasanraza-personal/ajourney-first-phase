<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Memes - Share react comment the memes you love. The best collection of memes from worldwide is here, share your creativity of memes and get known worldwide. Join the community now! - Memespace - memespace.in">

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
    <meta property="og:title" content="It's a World that you have never seen before.... 
    It's something which will make your day & you too can make someone's day yes! we are talking about Memes the memes you love and yeah that one smile will be worth it 
    Checkout memespace at below link" />
    <meta property="og:image" content="https://i.redd.it/eyj5d6q4u9s31.jpg" />
    <meta property="og:url" content="https://memespace.in" />
    <meta property="og:site_name" content="memespace.in" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />

    <title>Funny memes for friends, Memes in hindi,English, Dank memes- Memespace.in </title>
    </head>
    <body>
        
    <?php $count = 1;?>
    <div class="container col-md-8">
        @foreach($knowledges as $knowledge)
            @if($count == 1)
                <div class="display-knowledge-without-accordian">
                    <div class="knowledge-topic-heading">
                        {{$knowledge->topicheading}}
                    </div>
                    <div class="knowledge-topic-photo">
                      <img src="{{"../knowledge/".$knowledge->topicphoto}}" height="400px" class="d-block w-100" alt="..." />
                    </div>
                    <div class="knowledge-topic-details" id="textdata">
                        {{$knowledge->topicdetails}}
                    </div>
                </div>
                <?php $count++;?>
            @else
            <div class="accordion accordion-flush" id="accordionFlushExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne{{$knowledge->knowledgesrno}}">
                  <button class="accordion-button collapsed" type="button" onclick="changeText('{{$knowledge->knowledgesrno}}')" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseOne{{$knowledge->knowledgesrno}}" aria-expanded="false" aria-controls="flush-collapseOne{{$knowledge->knowledgesrno}}">
                    {{$knowledge->topicheading}}
                  </button>
                </h2>
                <div id="flush-collapseOne{{$knowledge->knowledgesrno}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne{{$knowledge->knowledgesrno}}" data-mdb-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    <div class="knowledge-topic-photo">
                      <img src="{{"../knowledge/".$knowledge->topicphoto}}" height="400px" class="d-block w-100" alt="..." />
                    </div>
                    <div id="textdata1_{{$knowledge->knowledgesrno}}">
                      {{$knowledge->topicdetails}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
        @endforeach
    </div>
    
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/asvd/dragscroll/master/dragscroll.js"></script>
   
    <script type="text/javascript">
      $( document ).ready(function(){
        var stringAsHtml = $('#textdata').text();

        var text = stringAsHtml.split(".=");
        var str = text.join('.</br>');

        var text = str.split("?=");
        var str = text.join('?</br>');

        var text = str.split(",=");
        var str = text.join(',</br>');

        var text = str.split('”=');
        var str = text.join('”</br>');

        var text = str.split('""=');
        var str = text.join('"</br>');

        var text = str.split("'=");
        var str = text.join("'</br>");

        var text = str.split('".=');
        var str = text.join('".</br>');

        var text = str.split("’.=");
        var str = text.join("’.</br>");

        var text = str.split("'.=");
        var str = text.join("'.</br>");

        $('#textdata').html(str)
      });

      function changeText(srno){
        var stringAsHtml = $('#textdata1_'+srno).text();

        var text = stringAsHtml.split(".=");
        var str = text.join('.</br>');

        var text = str.split("?=");
        var str = text.join('?</br>');

        var text = str.split(",=");
        var str = text.join(',</br>');

        var text = str.split('”=');
        var str = text.join('”</br>');

        var text = str.split('""=');
        var str = text.join('"</br>');

        var text = str.split("'=");
        var str = text.join("'</br>");

        var text = str.split('".=');
        var str = text.join('".</br>');

        var text = str.split("’.=");
        var str = text.join("’.</br>");

        var text = str.split("'.=");
        var str = text.join("'.</br>");

        $('#textdata1_'+srno).html(str)
      }
    </script>
  </body>
</html>

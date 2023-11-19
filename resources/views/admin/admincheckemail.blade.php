<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="web-images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="web-images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="web-images/favicon-16x16.png">
    <link rel="manifest" href="web-images/site.webmanifest">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />


    <title>Check Email</title>
  </head>
  <body>
    <div class="col-md-6">
        @foreach($promotionemail as $promotionemail)
            <div class="userdata">
                {{$promotionemail->promoteemail}}
                {{$promotionemail->name}}
                {{$promotionemail->phone}}
                {{$promotionemail->message}}<br>
            </div>
        @endforeach
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script stype="text/javascript">

    </script>
    
  </body>
</html>

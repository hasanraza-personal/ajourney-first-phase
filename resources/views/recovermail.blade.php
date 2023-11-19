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
    <meta property="og:title" content="See Newly Rising Startups, Trending Topics and Share memes| ajourney.in" />
    <meta property="og:image" content="https://www.ajourney.in/web-images/aj.jpg" />
    <meta property="og:url" content="https://www.ajourney.in" />
    <meta property="og:site_name" content="ajourney.in" />
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet"> 
    </head>
    <body style="font-family: 'Raleway', sans-serif;">
        <div class="mail-text" style="padding: 0px 20px 0px 20px; font-size:18px;">
            The Recovery link for account 
        </div>
        <div class="verification-code" style="font-size:20px; text-aligh:center;">
            <?php
                date_default_timezone_set('Asia/Kolkata');
                $user_email = session('recoveremail');
                $startTime = date("Y-m-d H:i:s");
                //add 10 minute to time
                $cenvertedTime = date('Y-m-d H:i:s',strtotime('+10 minutes',strtotime($startTime)));

                echo $recovery_link = 'https://www.memespace.in/recoverypage?l='.urlencode(base64_encode($cenvertedTime)).'&i='.urlencode(base64_encode($user_email)).'';
            ?>
        </div>
        <div class="mail-text-2" style="padding: 0px 20px 0px 20px;">
            Please click on the above Link to Recover your Account
        </div>
    </body>
</html>

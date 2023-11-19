<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .main-div{
            text-align: center;
            padding: 15px;
        }
        .welcome{
            font-size: 50px;
            font-weight: bold;
            color: #5B00FF;
        }
        .welcome-part{
            font-size: 22px;
            color: #5B00FF;
            margin-bottom: 32px;
        }
    </style>
    </head>
    <body style="font-family: 'Raleway', sans-serif;">
        <div class="main-div">
            <div class="welcome">
                AJOURNEY
            </div>
            <div class="welcome-part">
                It all begin's with a small step.
            </div>
            <div class="mail-text" style="margin-bottom:5px; font-size:18px;">
                The Verification code of your account is 
            </div>
            <div class="verification-code" style="font-size:24px; font-weight:bold; color:#5B00FF; text-aligh:center; margin-bottom:5px; text-decoration: underline;">
                {{session('user')['verificationcode']}}
            </div>
            <div class="mail-text-2" style="padding: 0px 20px 0px 20px;">
                Please enter the above verification code in the verification page.
            </div>
        </div>
    </body>
</html>

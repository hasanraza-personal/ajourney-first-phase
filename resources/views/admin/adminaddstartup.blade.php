<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="apple-touch-icon" sizes="180x180" href="../web-images/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="../web-images/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="../web-images/favicon-16x16.png">
      <link rel="manifest" href="web-images/site.webmanifest">

      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <link rel="stylesheet" href="{{ url('css/google-fonts.css') }}" >
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
      <style>
         @font-face {
    		font-family: Ajourney;
    		src: url(../../../assets/good-times/goodtimesrg.ttf);
	  }
         .hide{
             display: none;
         }
         .load-before{
             position: absolute;
             top: 50%;
             transform: translate(-50%,-50%);
             left: 50%;
         }
         .all-content{
             margin-top: 30px;
         }
         .allpost{
         }
         .single-post{
             border: 1px solid;
             padding: 10px;
             border-radius: 10px;
             margin-top: 10px;
         }
         .all-startup{
             margin-top: 30px;
             border-style: solid;
         }
         .accordion-body{
             background-color: aquamarine;
         }
         img{
             height: 200px;
             width: 200px;
         }
         .label{
            color: red;
         }
         .header{
            width: 100%;
            height: 70px;
            position: sticky;
            top: 0;
            left: 0;
            padding: 0 1rem;
            background-color: #fff;
            justify-content: space-between;
            border-bottom: 1.5px solid #5b00ff;
            z-index: 1000;
            display: flex;
            align-items: center;
         }
         .header__logo{
            display: flex;
            align-items: center;
            color: #5b00ff;
            font-family: Ajourney;
         }
         .brand-name{
            font-family: Ajourney;
            font-size: 26px;
            font-weight: 600;
            color: #5b00ff;
            letter-spacing: 1.2px;
            padding-left: 5px;
         }
         .brand-logo{
            display: flex;
            width: 45px;
            height: 45px;
         }
      </style>
      <title>Insert Startup data</title>
   </head>
   <body>
      {{-- Navbar --}}
      <header class="header">
         <a href="/" class="header__logo">
            <img src="{{url('/logo/logo_compressed.png')}}" alt="Logo" class="brand-logo">
            <span class="brand-name">Ajourney</span>
         </a>
      </header>
      {{-- Navbar --}}
      <div class="container-fluid col-md-8 all-content">
         <form method="post" action="../addstartup" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
               <label for="exampleFormControlFile1">Select startup main photo to upload</label><br>
               <input type="file" class="form-control-file" id="photo_1" name="startupmainphoto" onchange="previewFile(this,1);">
               <img class="img-fluid" id="previewiamge_1">
            </div>
            <br>
            <div class="form-group">
               <label for="exampleFormControlFile1">Select startup first optional photo to upload</label><br>
               <input type="file" class="form-control-file" id="photo_2" name="startupfirstphoto" onchange="previewFile(this,2);">
               <img class="img-fluid" id="previewiamge_2">
            </div>
            <br>
            <div class="form-group">
               <label for="exampleFormControlFile1">Select startup second optional photo to upload</label><br>
               <input type="file" class="form-control-file" id="photo_3" name="startupsecondphoto" onchange="previewFile(this,3);">
               <img class="img-fluid" id="previewiamge_3">
            </div>
            <br>
            <div class="form-group">
               <label for="exampleFormControlFile1">Select startup third optional photo to upload</label><br>
               <input type="file" class="form-control-file" id="photo_4" name="startupthirdphoto" onchange="previewFile(this,4);">
               <img class="img-fluid" id="previewiamge_4">
            </div>
            <br>
            <div class="form-group">
               <label for="exampleFormControlFile1">Select startup fourth optional photo to upload</label><br>
               <input type="file" class="form-control-file" id="photo_5" name="startupfourthphoto" onchange="previewFile(this,5);">
               <img class="img-fluid" id="previewiamge_5">
            </div>
            <br>
            <div class="form-group">
               <label for="exampleFormControlFile1">Select startup fifth optional photo to upload</label><br>
               <input type="file" class="form-control-file" id="photo_6" name="startupfifthphoto" onchange="previewFile(this,6);">
               <img class="img-fluid" id="previewiamge_6">
            </div>
            <br>
            <div class="form-group">
               <label for="exampleFormControlFile1">Select startup svg to upload</label><br>
               <input type="file" class="form-control-file" id="photo_7" name="startupsvg" onchange="previewFile(this,7);">
               <img class="img-fluid" id="previewiamge_7">
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="startupname" placeholder="Startup Name"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="startuptype" placeholder="Startup Type"  />
            </div>
            <br>
            <div class="form-group">
               <label class="label">Startup Details</label>
               <textarea class="form-control" rows="10" placeholder="Startup details" name="startupdetails" ></textarea>
            </div>
            <br>
            <span>•</span>
            <div class="form-group">
               <label class="label">Startup Advantages</label>
               <textarea class="form-control" rows="10" placeholder="Startup perks" name="startupadvantages" ></textarea>
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="startuplocation" placeholder="Startup Location"  />
            </div>
            <br>
            <div class="form-group">
               <label class="label">Startup Address</label>
               <textarea class="form-control" rows="5" placeholder="Startup address" name="startupaddress" ></textarea>
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="startupmaplink" placeholder="Startup Map Link"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="foundername1" placeholder="Founder Name-1"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="foundername2" placeholder="Founder Name-2"  />
            </div>
            <br>
           	<div class="form-group">
               <input type="text" class="form-control" name="cofoundername" placeholder="Co-founder Name"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="founderdetails" placeholder="Founder Details"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="ownername1" placeholder="Owner Name-1"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="ownername2" placeholder="Owner Name-2"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="ownername3" placeholder="Owner Name-3"  />
            </div>
            <br>
           	<div class="form-group">
               <input type="text" class="form-control" name="ownername4" placeholder="Owner Name-4"  />
            </div>
            <br>
           	<div class="form-group">
               <input type="text" class="form-control" name="ownername5" placeholder="Owner Name-5"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="ownerdetails" placeholder="Owner Details"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="studyingin" placeholder="Studying In"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="studiedat" placeholder="Studied At"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="dropoutfrom" placeholder="Dropout From"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="selftaught" placeholder="Self Taught"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="contactno1" placeholder="Contact No-1" />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="contactno2" placeholder="Contact No-2" />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="contactemail1" placeholder="Contact Email-1" />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="contactemail2" placeholder="Contact Email-2" />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="websitelink1" placeholder="Website Link-1" />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="websitelink2" placeholder="Website Link-2" />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="startupemail" placeholder="Startup Email"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="facebooklink" placeholder="Facebook Link"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="instagramlink" placeholder="Instagram Link"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="linkedinlink" placeholder="Linkedin Link"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="pinterestlink" placeholder="Pinterest Link"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="telegramlink" placeholder="Telegram Link"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="twitterlink" placeholder="Twitter Link"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="whatsapplink1" placeholder="Whatsapp Link 1"  />
            </div>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" name="whatsapplink2" placeholder="Whatsapp Link 2"  />
             </div>
             <br>
             <div class="form-group">
               <input type="text" class="form-control" name="applink" placeholder="App Link" />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="youtubelink" placeholder="Youtube Link"  />
            </div>
           <br>
           <div class="form-group">
               <input type="text" class="form-control" name="flipcartlink" placeholder="Flipcart Link"  />
            </div>
            <br>
            <div class="form-group">
               <input type="text" class="form-control" name="amazonlink" placeholder="Amazon Link"  />
            </div>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" name="swiggylink" placeholder="Swiggy Link"  />
            </div>
            <br>
           	<div class="form-group">
               <input type="text" class="form-control" name="zomatolink" placeholder="Zomato Link"  />
            </div>
           	<br>
           	<div class="form-group">
                <input type="text" class="form-control" name="magicpinlink" placeholder="Magicpin Link"  />
             </div>
             <br>
             <button type="submit" class="btn btn-success">Add Startup</button>
         </form>
      </div>

      @include('admin.adminupdatestartup')

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
         
      <script type="text/javascript">
         function previewFile(input,no){
         var file = $("#photo_"+no).get(0).files[0];
            if(file){
               var reader = new FileReader();
               reader.onload = function(){
                  $("#previewiamge_"+no).attr("src", reader.result);
               }
               reader.readAsDataURL(file);
            }
         }

         function previewFile1(input,no){
            console.log(input,no);
            var file = $("#updatephoto_"+no).get(0).files[0];
            if(file){
               var reader = new FileReader();
               reader.onload = function(){
                  $("#updatepreviewimage_"+no).attr("src", reader.result);
               }
               reader.readAsDataURL(file);
            }
         }

         function deletestartupPhoto(startupphoto,columnname,srno){
            console.log(startupphoto);
            var _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
               url : "../deletestartupphoto",
               method : "POST",
               data : {srno:srno,columnname:columnname,startupphoto:startupphoto,_token:_token},
               success : function(){
                  console.log("success");
               }
            })
         }
      </script>
   </body>
</html>


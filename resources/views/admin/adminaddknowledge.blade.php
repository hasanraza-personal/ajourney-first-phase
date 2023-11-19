<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />

    <style>
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
        .main-photo{

        }
        .sub-photo{

        }
        .heighlight{
            font-weight: bold;
            color: red;
        }
        .img-fluid{
            height: 300px;
            display: block;
            margin: 0 auto;
        }
        .genre-1{
            filter: brightness(100%);
            width: 320px;
            height: 220px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .change-mainphoto-form{
            border: 1px solid;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>

    <title>Insert data</title>
  </head>
  <body>

    <div class="container-fluid col-md-8 all-content"> 
        <form method="post" action="../addknowledge" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" name="maintopic" value="{{ old('maintopic') }}" placeholder="Main topic" required />
            </div><br>
            @if(session('maintopic_photo')=="")
                <div class="form-group">
                    <label for="exampleFormControlFile1">Select <span class="heighlight">MAIN</span> Topic <span class="heighlight">IMAGE</span> to upload</label><br>
                    <input type="file" class="form-control-file" name="maintopicphoto" onchange="previewFile(this,'maintopicphoto');">
                </div><br>
            @endif
            <div class="main-photo hide">
                <img id="mainphoto-previewImg" src="" class="img-fluid" alt="Main Topic Photo">
            </div><br>

            <div class="form-group">
                <input type="text" class="form-control" name="topicheading" placeholder="Topic heading" required />
            </div><br>
            <div class="form-group">
                <label for="exampleFormControlFile1">Select <span class="heighlight">SUB</span> Topic <span class="heighlight">IMAGE</span> to upload</label><br>
                <input type="file" class="form-control-file" name="subtopicphoto" onchange="previewFile(this,'subtopicphoto');" required>
            </div><br>

            <div class="sub-photo hide">
                <img id="subphoto-previewImg" src="" class="img-fluid" alt="Sub Topic Photo">
            </div><br>

            <div class="form-group">
                <textarea class="form-control" rows="10" id="summernote" placeholder="Topic details" name="topicdetails" required></textarea>
            </div><br>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
        
        <div class="allpost">
            <?php $count = 1;?>
            @foreach($post as $userpost)
                @if($count == 1)
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed"  type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseOne"  aria-expanded="false" aria-controls="flush-collapseOne">
                                    <span class="heighlight">ALL MAIN TOPIC IMAGES</span>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-mdb-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    @foreach($maintopicphoto as $topicphoto)
                                        <?php $var = substr($topicphoto->maintopicphoto, 0, strpos($topicphoto->maintopicphoto, "."))?>
                                        <div class="topicphoto">
                                            <img src="{{"../knowledge-topic/".$topicphoto->maintopicphoto}}" class="img-fluid genre-1" id="p_{{$var}}" alt="Responsive image" loading="lazy">
                                        </div><br>
                                        <form method="post" action="../updatemaintopicimage" enctype="multipart/form-data" class="change-mainphoto-form">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Select <span class="heighlight">MAIN</span> Topic <span class="heighlight">IMAGE</span> to upload</label><br>
                                                <input type="file" class="form-control-file" name="updatemaintopicphoto" id="updatemaintopicphoto_{{$var}}" onchange="previewmainImage(this,'{{$var}}');" required>
                                                <input type="hidden" name="previousmaintopicphoto" value="{{$topicphoto->maintopicphoto}}">
                                            </div><br>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="accordion accordion-flush" id="accordionFlush">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne{{$userpost->knowledgesrno}}">
                            <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseOne{{$userpost->knowledgesrno}}" aria-expanded="false" aria-controls="flush-collapseOne{{$userpost->knowledgesrno}}">
                                {{$userpost->maintopic}}<span style="margin-right: 10px; margin-left: 10px;">-</span>{{$userpost->topicheading}}
                            </button>
                        </h2>
                        <div id="flush-collapseOne{{$userpost->knowledgesrno}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne{{$userpost->knowledgesrno}}" data-mdb-parent="#accordionFlush">
                            <div class="accordion-body">
                                <div class="single-post">
                                    <form method="post" action="../updateknowledge" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="knowledgesrno" value="{{$userpost->knowledgesrno}}">
                                        <div class="form-group">
                                          <input type="text" class="form-control" name="maintopic" value="{{$userpost->maintopic}}" required />
                                        </div><br>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="topicheading" value="{{$userpost->topicheading}}" required />
                                        </div><br>
                                    
                                        <div class="topicphoto">
                                            <img src="{{"../knowledge/".$userpost->topicphoto}}" id="preview_topicphoto_{{$userpost->knowledgesrno}}" class="img-fluid" alt="Responsive image" loading="lazy">
                                        </div><br>
                                    
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Select <span class="heighlight">SUB</span> Topic <span class="heighlight">IMAGE</span> to <span class="heighlight">Reupload</span></label><br>
                                            <input type="file" class="form-control-file" name="topicphoto" id="topicphoto_{{$userpost->knowledgesrno}}" onchange="previewImage(this,'{{$userpost->knowledgesrno}}');">
                                        </div><br>

                                        <div>{!!$userpost->topicdetails!!}</div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="10" placeholder="Topic details" name="topicdetails" value="{{$userpost->topicdetails}}" required>{{$userpost->topicdetails}}</textarea>
                                        </div><br>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                    <form method="post" action="../deleteknowledge">
                                        @csrf
                                        <input type="hidden" name="knowledgesrno" value="{{$userpost->knowledgesrno}}">
                                        <input type="hidden" name="maintopic" value="{{$userpost->maintopic}}">
                                        <input type="hidden" name="knowledgephoto" value="{{$userpost->topicphoto}}">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $count++;?>
            @endforeach
        </div>
    </div>
    

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.4.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.js"></script>
    <script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
    <script type="text/javascript">

    //Preview when inserting a new file
    function previewFile(input,value){
        if($("input[name=maintopicphoto]").length){
            var mainphoto = $("input[name=maintopicphoto]").get(0).files[0];
        }
        var subphoto = $("input[name=subtopicphoto]").get(0).files[0];
        var reader = new FileReader();
        reader.onload = function(){
            if(value == "maintopicphoto"){
                $('.main-photo').removeClass();
                $("#mainphoto-previewImg").attr("src", reader.result);
            }else{
                $('.sub-photo').removeClass();
                $("#subphoto-previewImg").attr("src", reader.result);
            }
        }
        if(value == "maintopicphoto"){
            reader.readAsDataURL(mainphoto);
        }else{
            reader.readAsDataURL(subphoto);
        }
    }

    //Preview when updating a Topic Image
    function previewImage(input,srno){
        console.log(srno);
        var file = $("#topicphoto_"+srno).get(0).files[0];  console.log(file);
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#preview_topicphoto_"+srno).attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }

     //Preview when updating a Main Topic Image
     function previewmainImage(input,imagename){
        console.log(imagename);

        var file = $("#updatemaintopicphoto_"+imagename).get(0).files[0]; console.log(file);
        if(file){
            var reader = new FileReader();
            reader.onload = function(){console.log(file);
                $("#p_"+imagename).attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
    
    CKEDITOR.replace( 'topicdetails' );
    </script>
    
  </body>
</html>

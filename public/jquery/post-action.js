//When user scoll down to bottom of page the a button will appear to get user to the top
var mybutton = document.getElementById("myBtn");
       
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
    
function scrollFunction(){
    if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
        mybutton.style.display = "block";
    }else{
        mybutton.style.display = "none";
    }
}
function topFunction(){
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

//When user click on crop button
function crop(){
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
    $('#image-cropping').modal('show');

    var cropped_image = $('#image').cropper('getData');

    var cropped_data = Object.values(cropped_image);
    var iterator = cropped_data.values();

    x = iterator.next().value;
    x  = Math.floor(x);
    y = iterator.next().value;
    y  = Math.floor(y);
    width = iterator.next().value;
    width  = Math.floor(width);
    height = iterator.next().value;
    height  = Math.floor(height);

    $('#x').val(x);
    $('#y').val(y);
    $('#width').val(width);
    $('#height').val(height);

    $('#uploadimage').submit();
}

//When user click on close button after performing some task
function refresh(){
    location.reload(true); 
}

//When user click on the commnet button of the post
function commentPost(postsrno,postusername,session_username){
    post_commentsrno = postsrno;
    post_commentusername = postusername;
    var _token   = $('meta[name="csrf-token"]').attr('content');
    if(session_username!=""){
        $('#comment-data').html("");
        $.ajax({
            url : "../postcomment",
            method : "POST",
            data : {postsrno:postsrno,postusername:postusername,_token:_token},
            beforeSend:function(){
                $('#exampleFormControlTextarea1').val("");
                $('#staticBackdrop1').modal('show');
                $('.comment-load').show();
            }
        })
        .done(function(data){
            if(data!=""){
                $('.no-more-comment').text("");
                $('.comment-load').hide();
                $('#comment-data').html(data);
                $(".comment_error").text("");
                $('#comment-data').scrollTop($('#comment-data')[0].scrollHeight);
            }else{
                $('.comment-load').hide();
                $('#comment-data').html("");
                $('.no-more-comment').text("No new comment to load");
            }
        })
        .fail(function(jqXHR,ajaxOptions,thrownError){
            alert("server not respondinh...");
        });
    }else{
        $('#exampleModal').modal('show');
    }
}

//When user write and submit the comment
function commentForm(){
    var _token   = $('meta[name="csrf-token"]').attr('content');
    var post_srno = post_commentsrno;
    var username = post_commentusername;
    var comment = $('#exampleFormControlTextarea1').val();
    
    if(comment!=""){
        $.ajax({
            url : "../postcomment",
            method : "POST",
            data : {postsrno:post_srno,postusername:username,postcomment:comment,_token:_token},
            beforeSend:function(){
                $('#exampleFormControlTextarea1').val("");
            }
        })
        .done(function(data){
            if(data!=""){
                $('.no-more-comment').text("");
                $(".comment_error").text("");
                $('#comment-data').append(data);
                $('#comment-data').scrollTop($('#comment-data')[0].scrollHeight);
            }
            $.ajax({//retrieve comment count
                    url : "../countcomment",
                    method : "POST",
                    data : {postsrno:post_srno,_token:_token},
                    success : function(countdata){
                        $('#comment_'+post_srno).html(" "+countdata);
                        
                    }
                });
        })
        .fail(function(jqXHR,ajaxOptions,thrownError){
            alert("server not responding...");
        });
    }
    else{
        $(".comment_error").text("Please write comment");
    }
    return false;
}

//When user delete the comment
function deleteComment(comment_srno,delete_postsrno,delete_postusername){
    console.log(comment_srno,delete_postsrno,delete_postusername);
  
    var _token   = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
            url : "../deletecomment",
            method : "POST",
            data : {commentsrno:comment_srno,deletepostsrno:delete_postsrno,deleteusername:delete_postusername,_token:_token},
            success : function(data){
                if(data!=""){
                    $('.no-more-comment').text("");
                    $('#comment-data').html(data);
                }else{
                    $('.comment-load').hide();
                    $('#comment-data').html("");
                    $('.no-more-comment').text("No new comment to load");
                }
                $.ajax({//retrieve comment count
                    url : "../countcomment",
                    method : "POST",
                    data : {postsrno:delete_postsrno,_token:_token},
                    success : function(countdata){
                        $('#comment_'+delete_postsrno).html(" "+countdata);
                        
                    }
                });
            }
    });
}

//When user delete the post
function deletePost(srno){
    console.log(srno);
    var _token   = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        url : "deletepost",
        method : "POST",
        data : {postsrno:srno,_token:_token},
        success : function(data){
            if(data="1"){
                $('#postdeleted').modal('show');
            }else{
               alert("server Error. Please try again after sometime");
            }
        }});
}

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
            $('.ajax-load').html('No more post to load');
            return;
        }
        $('.ajax-load').hide();
        $('#post-data').append(data.html);
    });
}
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

//When user like a post
function likePost(postsrno,postusername,session_username){
    var _token   = $('meta[name="csrf-token"]').attr('content');

    if(session_username!=""){
        if($('#like_'+postsrno).hasClass("before-haha")){

            var total_like = $('#likecount_'+postsrno).html();  console.log(total_like);
            total_like = ++total_like;
            if($('#dislike_'+postsrno).hasClass("after-angry")){
                var total_dislike = $('#dislikecount_'+postsrno).html(); 
                if(total_dislike == 0){
                    total_dislike = 0;
                }else{
                    total_dislike = --total_dislike;
                }
                $('#dislike_'+postsrno).removeClass("after-angry");
                $('#dislike_'+postsrno).addClass("before-angry");
                jQuery('#dislikecount_'+postsrno).html(" "+total_dislike);
            }
            $('#like_'+postsrno).removeClass("before-haha");
            $('#like_'+postsrno).addClass("after-haha");
            jQuery('#likecount_'+postsrno).html(" "+total_like);
        }else if($('#like_'+postsrno).hasClass("after-haha")){
            var total_like = $('#likecount_'+postsrno).html(); 
            if(total_like == 0){
                total_like = 0;
            }else{
                total_like = --total_like;
            }
            $('#like_'+postsrno).removeClass("after-haha");
            $('#like_'+postsrno).addClass("before-haha");
            jQuery('#likecount_'+postsrno).html(" "+total_like);
        }

        $.ajax({
            url : "../likeresponse",
            method : "POST",
            data : {postsrno:postsrno,postusername:postusername,_token:_token}
        }); 
    }else{
        $('#exampleModal').modal('show');
    }
}

//when user dislike a post
function dislikePost(postsrno,postusername,session_username){
    console.log("Inside Dislike");
    var _token   = $('meta[name="csrf-token"]').attr('content');
    
    if(session_username!=""){
        if($('#dislike_'+postsrno).hasClass("before-angry")){
            var total_dislike = $('#dislikecount_'+postsrno).html(); 
            total_dislike = ++total_dislike;
            if($('#like_'+postsrno).hasClass("after-haha")){
                var total_like = $('#likecount_'+postsrno).html(); 
                if(total_like == 0){
                    total_like = 0;
                }else{
                    total_like = --total_like;
                }
                $('#like_'+postsrno).removeClass("after-haha");
                $('#like_'+postsrno).addClass("before-haha");
                jQuery('#likecount_'+postsrno).html(" "+total_like);
            }
            $('#dislike_'+postsrno).removeClass("before-angry");
            $('#dislike_'+postsrno).addClass("after-angry");
            jQuery('#dislikecount_'+postsrno).html(" "+total_dislike);
        }else if($('#dislike_'+postsrno).hasClass("after-angry")){
            var total_dislike = $('#dislikecount_'+postsrno).html(); 
            if(total_dislike == 0){
                total_dislike = 0;
            }else{
                total_dislike = --total_dislike;
            }
            $('#dislike_'+postsrno).removeClass("after-angry");
            $('#dislike_'+postsrno).addClass("before-angry");
            jQuery('#dislikecount_'+postsrno).html(" "+total_dislike);
        }
        $.ajax({
            url : "../dislikeresponse",
            method : "POST",
            data : {postsrno:postsrno,postusername:postusername,_token:_token},
        }); 
    }else{
        $('#exampleModal').modal('show');
    }
}

function readNotification(){
    var _token  = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url : "../readnotification",
        method : "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success : function(data){
            window.location.href = "notification";
        }
    });
}

function sharePost(userpost,sessionusername){
    //console.log(userpost,sessionusername);
    if(sessionusername!=""){
        $('#shareModal').modal('show');        
    }else{
        $('#exampleModal').modal('show');
    }
}

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction(postsrno,sessionusername) {
    console.log(sessionusername);
    if(sessionusername != ""){
        document.getElementById("myDropdown_"+postsrno).classList.toggle("show");
    }else{
        $('#exampleModal').modal('show');
    }
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

function reportPost(postsrno,postusername){
    console.log(postusername,postsrno);
    $('#postusername').val(postusername);
    $('#postsrno').val(postsrno);
    $('#postreport').modal('show');
}

function submitReport(){
    var srno = $('#postsrno').val();
    var username = $('#postusername').val();
    var reportcategory = $('#exampleFormControlSelect2').val();
    var reportcomment = $('#exampleFormControlTextarea').val();
    console.log(srno,username,reportcategory,reportcomment);
    if(reportcategory!=""){
        $.ajax({
            url : "../reportpost",
            method : "POST",
            data : {postsrno:srno,postusername:username,postreportcategory:reportcategory,postreportcomment:reportcomment},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success : function(){
                $('#reportsubmitted').modal('show');
            }}); 
    }else{
        alert("field cannot be blank");
    }
}
function openNav() {
    document.getElementById("myNav").style.width = "100%";
  }
  
  function closeNav() {
    document.getElementById("myNav").style.width = "0%";
  }
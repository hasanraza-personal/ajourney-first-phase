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
        $('#all-startup-images').append(data.html);
    });
}
var page = 1;
jQuery(document).ready(function(){
    $(document).on('scroll', _.throttle(function(){
        var scroll = Math.ceil($(window).scrollTop());
        scroll = scroll + 2000;
        if(scroll>=$(document).height()-$(window).height()){
            page++;
            loadMoreData(page);
        }
    }, 2000));  
});

function changeSearchbox(){
    $('#search-form-div').addClass('form-change');
    $('#cancel-search').removeClass('hide');

}
function cancelSearch(){
   $('#cancel-search').addClass('hide');
   $('#search-form-div').removeClass('form-change');
   $('#searchkey').val("");
   $('.serach-result').addClass("hide");
}

//Live search
function Serach(){
    $('.serach-result').removeClass("hide");
    var searchkey = $('#searchkey').val();
    if(searchkey!=""){
       $.ajax({
          url : "../searchstartup",
          method : "POST",
          data : {searchkey:searchkey},
          headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success : function(data){
            if(data == "No result found"){
               $('.serach-result').html(data);
            }else{
               $('.serach-result').html(data);
               $('.serach-result').removeHighlight().highlight(searchkey); 
            }
          }
       }); 
    }else{
        $('.serach-result').addClass("hide");
    }
}

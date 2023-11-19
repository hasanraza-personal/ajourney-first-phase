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
        $('#all-startup').append(data.html);
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

function filter(filter){
    $('#dropdownMenuLink').html(filter)
    $.ajax({
        url : "../startupfilter",
        method : "POST",
        data : {filter:filter},
        headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success : function(data){
            $('#filter-link').html(data);
            $('#all-startup').html("");
            if(functionHolder){
                page = 1;
                // console.log("Data present");
                window.loadMoreData = functionHolder;
                loadMoreData(page);
            }else{
                $('#all-startup').html("");
                page = 1;
                loadMoreData(page);
            }
        }
    }); 
}

var functionHolder;
function selectFiltercategory(selectedfiltercategory,input){
    //console.log(selectedfiltercategory);
    $(".filter-btn").css({"background-color": "white", "color": "black"});

    if(selectedfiltercategory != 'all'){
        $("#btn_"+input).css({"background-color": "#5B00FF", "color": "white"});
        if(!functionHolder) functionHolder = window.loadMoreData;
        window.loadMoreData = function(){};
        page = 1;
    }else{
        page = 1;
        $("#all-btn").css({"background-color": "#5B00FF", "color": "white"});
        window.loadMoreData = functionHolder;
    }
    $.ajax({
        url : "../getspecificstartup",
        method : "POST",
        data : {filter:selectedfiltercategory},
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend:function(){
            $('#all-startup').hide();
            $('.ajax-load').show();
        }
    })
    .done(function(data){
        $('.ajax-load').hide();
        $('#all-startup').html(data.html);
        $('#all-startup').show();
    });
}

function scrollFilter(side){
    if(side == "right"){
        var elmnt = document.getElementById("filter-link");
          elmnt.scrollLeft -= 300;
    }else{
        var elmnt = document.getElementById("filter-link");
          elmnt.scrollLeft += 300;
    }
}

function shareStartup(startupname){
    console.log(startupname);
    $('#sharestartupModal').modal('show');
}   

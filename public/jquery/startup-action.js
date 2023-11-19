//Highlight js

jQuery.fn.highlight = function(pat) {

    function innerHighlight(node, pat) {

     var skip = 0;

     if (node.nodeType == 3) {

      var pos = node.data.toUpperCase().indexOf(pat);

      pos -= (node.data.substr(0, pos).toUpperCase().length - node.data.substr(0, pos).length);

      if (pos >= 0) {

       var spannode = document.createElement('span');

       spannode.className = 'highlight';

       var middlebit = node.splitText(pos);

       var endbit = middlebit.splitText(pat.length);

       var middleclone = middlebit.cloneNode(true);

       spannode.appendChild(middleclone);

       middlebit.parentNode.replaceChild(spannode, middlebit);

       skip = 1;

      }

     }

     else if (node.nodeType == 1 && node.childNodes && !/(script|style)/i.test(node.tagName)) {

      for (var i = 0; i < node.childNodes.length; ++i) {

       i += innerHighlight(node.childNodes[i], pat);

      }

     }

     return skip;

    }

    return this.length && pat && pat.length ? this.each(function() {

     innerHighlight(this, pat.toUpperCase());

    }) : this;

   };

   

   jQuery.fn.removeHighlight = function() {

    return this.find("span.highlight").each(function() {

     this.parentNode.firstChild.nodeName;

     with (this.parentNode) {

      replaceChild(this.firstChild, this);

      normalize();

     }

    }).end();

   };





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

        scroll = scroll + 4000;

        if(scroll>=$(document).height()-$(window).height()){

            page++;

            loadMoreData(page);

        }

    }, 2000));  

});



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



function hidesearchResult(){

    $('#searchkey').val("");

    $('.serach-result').addClass("hide");

}



function filter(filter){

    //var filter = $('#selectfilter').val();

    // alert(filter);
    
    $('#dropdownMenuLink').html(filter);

    $.ajax({

        url : "../startupfilter",

        method : "POST",

        data : {filter:filter},

        headers:{

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        },

        success : function(data){

            $('#filter-link').html(data);

        }

    }); 

}


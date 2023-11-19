$('#startupname').focusout(function(){
    let startupname = $('#startupname').val(); 
    if(startupname == ""){
        $('#startupnamerequired').css("color", "red");
    }else{
        $('#startupnamerequired').css("color", "white");
    }
});
$('#name').focusout(function(){
    let name = $('#name').val(); 
    if(name == ""){
        $('#peoplenamerequired').css("color", "red");
    }else{
        $('#peoplenamerequired').css("color", "white");
    }
});
$('#designation').focusout(function(){
    let designation = $('#name').val(); 
    if((designation == null) || (designation == 'Select designation*')){
        $('#designationrequired').css("color", "red");
    }else{
        $('#designationrequired').css("color", "white");
    }
});
$('#establishment').focusout(function(){
    let establishment = $('#establishment').val(); 
    if(establishment == ""){
        $('#establishmentrequired').css("color", "red");
    }else{
        $('#establishmentrequired').css("color", "white");
    }
});
$('#startuptype').focusout(function(){
    let startuptype = $('#startuptype').val(); 
    if(startuptype == ""){
        $('#startuptyperequired').css("color", "red");
    }else{
        $('#startuptyperequired').css("color", "white");
    }
});
$('#startupdetails').focusout(function(){
    let startupdetails = $('#startupdetails').val(); 
    if(startupdetails == ""){
        $('#startupdetailsrequired').css("color", "red");
    }else{
        $('#startupdetailsrequired').css("color", "white");
    }
});
$('#instagramlink').focusout(function(){
    let instagramlink = $('#instagramlink').val(); 
    if(instagramlink == ""){
        $('#instagramlinkrequired').css("color", "red");
    }else{
        $('#instagramlinkrequired').css("color", "white");
    }
});

//Optional fields
$('#email').focusout(function(){
    let email = $('#email').val(); 
    if(email != ""){
        let check_email = /^[A-Za-z0-9_.]{3,}@[A-za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/
        if(check_email.test(email)){
            //do nothing
        }else{
            $('#emailModal').modal('show');
        }
    }
});
$('#email1').focusout(function(){
    let email1 = $('#email1').val(); 
    if(email1 != ""){
        let check_email = /^[A-Za-z0-9_.]{3,}@[A-za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/
        if(check_email.test(email1)){
            //do nothing
        }else{
            $('#emailModal').modal('show');
        }
    }
});

function isInputNumber(evt){
    var ch = String.fromCharCode(evt.which);
    if(!(/[0-9]/.test(ch))){
        evt.preventDefault();
    }
}


function checkemptyField(){
    let startupname = $('#startupname').val(); 
    let name = $('#name').val();
    let designation = $('#designation').val();
    let establishment = $('#establishment').val();
    let logo = $('#logo')[0].files.length;
    let startuptype = $('#startuptype').val();
    let startupdetails = $('#startupdetails').val();
    let instagramlink = $('#instagramlink').val();

    if(startupname == ""){
        $('#startupnamerequired').css("color", "red");
    }else{
        $('#startupnamerequired').css("color", "white");
    }
    if(name == ""){
        $('#peoplenamerequired').css("color", "red");
    }else{
        $('#peoplenamerequired').css("color", "white");
    }
    if((designation == null) || (designation == 'Select designation*')){
        $('#designationrequired').css("color", "red");
    }else{
        $('#designationrequired').css("color", "white");
    }
    if(establishment == ""){
        $('#establishmentrequired').css("color", "red");
    }else{
        $('#establishmentrequired').css("color", "white");
    }
    if(logo == 0){
        $('#logorequired').css("color", "red");
    }else{
        $('#logorequired').css("color", "white");   
    }
    if(startuptype == ""){
        $('#startuptyperequired').css("color", "red");
    }else{
        $('#startuptyperequired').css("color", "white");
    }
    if(startupdetails == ""){
        $('#startupdetailsrequired').css("color", "red");
    }else{
        $('#startupdetailsrequired').css("color", "white");
    }
    if(instagramlink == ""){
        $('#instagramlinkrequired').css("color", "red");
    }else{
        $('#instagramlinkrequired').css("color", "white");
    }

    if((startupname != "")&&(name != "")&&(designation != null)&&(establishment != "")&&(logo != "")&&(startuptype != "")&&(startupdetails != "")&&(instagramlink != "")){
        $('#submitconfirmationModal').modal('show');
    }else{
        $('#emptyModal').modal('show');
    }
}

function registerStartup(){
    $('#submit').prop("type", "submit");
    $('#submit').click();
}

$('#feedbackemailaddress').focusout(function(){
    let email = $('#feedbackemailaddress').val();
    if(email == ""){
        $('#feedbackemail').css("color", "red");
    }else{
        $('#feedbackemail').css("color", "white");
    }
});

$('#feedbackarea').focusout(function(){
    let feedback = $('#feedbackarea').val();
    if(feedback == ""){
        $('#feedbackfield').css("color", "red");
    }else{
        $('#feedbackfield').css("color", "white");
    }
});

function submitFeedback(){
    let feedbackemail = $('#feedbackemailaddress').val();
    let feedback = $('#feedbackarea').val();

    if((feedbackemail != "")&&(feedback != "")){
        var check_email = /^[A-Za-z0-9_.]{3,}@[A-za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/
        if(check_email.test(feedbackemail)){
            $.ajax({
                url : "../../submitfeedbackform",
                method : "POST",
                data : {email:feedbackemail,feedback:feedback},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(){
                    $('#feedbackemailaddress').val("");
                    $('#feedbackarea').val("");
                    $('#feedbackModal').modal('hide');
                    $('#feedbacksubmittedModal').modal('show');
                }
            }); 
        }else{
            $('#feedbackModal').modal('hide');
            $('#emailModal').modal('show');
        }
    }else{
        $('#feedbackModal').modal('hide');
        $('#emptyModal').modal('show');
    }
}
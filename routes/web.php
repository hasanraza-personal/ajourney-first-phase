<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\UserData;
use App\Http\Controllers\UserNotification;
use App\Http\Controllers\UserResponse;
use App\Http\Controllers\UserComment;
use App\Http\Controllers\UserReport;
use App\Http\Controllers\AdminData;
use App\Http\Controllers\Knowledge;
use App\Http\Controllers\UserStartup;
use App\Http\Controllers\Promotion;
use App\Http\Controllers\Change;
use App\Http\Controllers\StartupDetails;
use App\Http\Controllers\RegisteredStartup;
use App\Http\Controllers\FeedbackForm;

Route::get("startup/screenshot/mnfbnzxcbhsdbcmnahdjasskdhfmdn",[UserStartup::class,'getStartupCarousel']);

Route::get("change",[Change::class,'index']);

Route::get('/', function () {
    return view('index');
});
/*
Route::get('about', function () {
    return view('terms-and-condition');
});
*/

Route::get("memes",[UserData::class,'getUserdata']);

Route::get('about', function () {
    return view('about');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('termsandcondition',function(){
    return view('terms-and-condition');
});
Route::get('faq',function(){
    return view('faq');
});
Route::get('support',function(){
    return view('support');
});
Route::get('promote',function(){
    return view('promote');
});

Route::get('privacypolicy',function(){
    return view('privacy-policy');
});
Route::get('login',function(){
    return view('login');
});
// Route::get('meme-kd',function(){
//     return view('meme-kd');
// });
Route::get('selectsection',function(){
    return view('select-section');
});
Route::get('knowledgehome',function(){
    return view('knowledge.knowledge-home');
});

//Session is available 
//If session is available than it will not go into these pages.
Route::group(['middleware'=>['UserAccess']],function(){
    Route::get('login', function () {
        session()->forget('user');
        return view('login');
    });
    Route::get('signup', function () {
        session()->forget('user');
        return view('signup');
    });
    Route::get('forgot', function () {
        return view('forgot');
    });
    Route::get('recoverypage', function () {
        $link = request('l');
        $id = request('i');
        return view('recoverypage',[
            'link'=>$link,
            'id'=>$id
        ]);
    });
    Route::get('googlelogin', [UserAuth::class, 'redirectToGoogle']);
    Route::get('googlelogin/callback', [UserAuth::class, 'handleGoogleCallback']);

    Route::get('facebooklogin', [UserAuth::class, 'redirectToFacebook']);
    Route::get('facebooklogin/callback', [UserAuth::class, 'handleFacebookCallback']);

    Route::post('checkusername', [UserAuth::class, 'checkUsername']);
    Route::post('checkemail', [UserAuth::class, 'checkEmail']);
    Route::post('sendverificationcode', [UserAuth::class, 'sendVerificationcode']);
    Route::post('signup', [UserAuth::class, 'signUp']);
    Route::post('verifyuser', [UserAuth::class, 'verifyUser']);
    Route::post('recoverpassword', [UserAuth::class, 'recoverPasssword']);
  	Route::post('changepassword', [UserAuth::class, 'changePassword']);
});


//Session is not available
//If session is not available than it will not go into these pages.
Route::group(['middleware'=>['UserRestrict']],function(){
    Route::get('logout', function () {
        session()->flush();
        return redirect('/');
    });
    Route::get('upload',function(){
        return view('upload');
    });
    // Route::get('adminhome',function(){
    //     return view('admin.adminhome');
    // });

    Route::get("profile/{id}",[UserData::class,'userProfile']);
    
    if(Request::path()=="mostreacted"){
        Route::get("mostreacted",[UserData::class,'mostLiked']);
    }elseif(Request::path()=="notification"){
        Route::get("notification",[UserNotification::class,'postNotification']);
    }elseif(Request::path()=="adminhome"){
        Route::get("adminhome",[AdminData::class,'getUserdata']);
    }else{
        Route::get("{id}",[UserData::class,'userProfile']);
    }
    Route::post("adddata",[UserData::class,'uploadpost']);

    Route::post("likeresponse",[UserResponse::class,'likepostResponse']);
    Route::post("dislikeresponse",[UserResponse::class,'dislikepostResponse']);

    Route::post("deletepost",[UserData::class,'deletePost']);

    Route::post("postcomment",[UserComment::class,'commentPost']);
    Route::post("deletecomment",[UserComment::class,'commentDelete']);
    Route::post("countcomment",[UserComment::class,'commentCount']);

    Route::post("readnotification",[UserNotification::class,'NotificationRead']);

    Route::get('post/{id}',[UserData::class,'userPost']);

    Route::post("reportpost",[UserReport::class,'submitReport']);
});

Route::get('share/{id}',[UserData::class,'usersharePost']);

Route::get("mostreacted",[UserData::class,'mostLiked']);




Route::post("promote",[Promotion::class,'addPromotionemail']);

Route::get("jabfjdhsbfhs/uehsabdjascb",[Promotion::class,'getPromotionemail']);

//All Startup Routes are here
Route::get('startup/search', function () {
    return view('startup.searchstartup');
});

//Admin Startup page
Route::get("startup/sdhfnddfgudhbjdzhfxzhfb",[StartupDetails::class,'allStartup']);

//Route::get("startup/sdhfnddfgudhbjdzhfxzhfb",[UserStartup::class,'allStartup']);
Route::get("startup/allstartup",[UserStartup::class,'getStartup']);
Route::get("startup/search",[UserStartup::class,'getSearchphoto']);
Route::get("startup/search/{id}",[UserStartup::class,'getsearchStartupdetails']);
Route::get("startup/{filterid}/{id}",[UserStartup::class,'getstartupCategory']);
Route::get("startup/{id}",[UserStartup::class,'getStartupdetails']);
// Route::get("startup/{id}",[UserStartup::class,'getStartupdetails']);

//Admin Satrtup action
Route::post("addstartup",[StartupDetails::class,'addStartup']);
Route::post("updatestartupphoto",[StartupDetails::class,'updatestartupPhoto']);
Route::post("updatestartupdetails",[StartupDetails::class,'updatestartupDetails']);
Route::post("deletestartupphoto",[StartupDetails::class,'deletestartupPhoto']);
Route::post("deletestartup",[StartupDetails::class,'deleteStartup']);

Route::post("searchstartup",[UserStartup::class,'searchStartup']);
Route::post("startupfilter",[UserStartup::class,'startupFilter']);
Route::post("getspecificstartup",[UserStartup::class,'getspecificStartup']);


//All Knowledge Routes are here
Route::post("addknowledge",[Knowledge::class,'addKnowledge']);
Route::post("updateknowledge/",[Knowledge::class,'updateKnowledge']);
Route::post("deleteknowledge/",[Knowledge::class,'deleteKnowledge']);
Route::post("updatemaintopicimage/",[Knowledge::class,'updatemaintopicImage']);

Route::get("nxcbgjhhjzg/smdf5s4snmnvd",[Knowledge::class,'getKnowledge']);
Route::get("knowledge/{id}",[Knowledge::class,'getKnowledgedetails']);
Route::get("knowledgehome",[Knowledge::class,'getknowledgetopic']);


//Startup Form
Route::get('form/startup/filldetails',function(){
    return view('form.startupregisterationform');
});
Route::post("registerstartup",[RegisteredStartup::class,'Store']);
Route::post("submitfeedbackform",[FeedbackForm::class,'Store']);

Route::get("form/startup/jhdjkzmxcbhsjdzdgfhzdrgfv",[RegisteredStartup::class,'Fetch']);
Route::get("form/startup/jhdjkzmxcbhsjdzdgfhzdrgfv/{id}",[RegisteredStartup::class,'fetchDetails']);
Route::post("trash",[RegisteredStartup::class,'trashStartup']);
Route::post("uploaded",[RegisteredStartup::class,'startupUploaded']);

/*
Route::post("addstartup",[Startup::class,'addStartup']);
Route::get("startup/allstartup",[Startup::class,'getStartup']);
Route::get('startup/startup-1-hp', function () {
    return view('startup.startup-1-hp');
});
Route::get('startup/addstartup', function () {
    return view('admin.adminaddstartup');
});
Route::get("startup/{id}",[Startup::class,'getStartupdetails']);
*/

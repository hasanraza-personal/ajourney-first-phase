<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisteredStartups;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Image;
use Redirect;
use File;
use DateTime;

class RegisteredStartup extends Controller
{
    function Store(Request $req){
        $registered_startup = new RegisteredStartups;
        // return $req->all();
        // $mainphoto = $req->file('logo');
        $imageName = time().'.'.$req->logo->extension();  

        $registered_startup->registered_startupname = htmlspecialchars($req->startupname);
        $registered_startup->registered_startupdesignation = htmlspecialchars($req->designation);
        $registered_startup->registered_startuppeople = htmlspecialchars($req->name);
        $registered_startup->registered_startuppeople1 = htmlspecialchars($req->name1);
        $registered_startup->registered_startupcollegename = htmlspecialchars($req->collegename);
        $registered_startup->registered_startupcollegename1 = htmlspecialchars($req->collegename1);
        $registered_startup->registered_startuplocation = htmlspecialchars($req->establishment);
        $registered_startup->registered_startuplogo = $imageName;
        $registered_startup->registered_startuptype = htmlspecialchars($req->startuptype);
        $registered_startup->registered_startupdescription = htmlspecialchars($req->startupdetails);
        $registered_startup->registered_startupbenefit = htmlspecialchars($req->startupbenefit);
        $registered_startup->registered_startupaddress = htmlspecialchars($req->startupaddress);
        $registered_startup->registered_email = htmlspecialchars($req->email);
        $registered_startup->registered_email1 = htmlspecialchars($req->email1);
        $registered_startup->registered_contact = htmlspecialchars($req->contact);
        $registered_startup->registered_contact1 = htmlspecialchars($req->contact1);
        $registered_startup->registered_whatsapp = htmlspecialchars($req->whatsapp);
        $registered_startup->registered_whatsapp1 = htmlspecialchars($req->whatsapp1);
        $registered_startup->registered_instagramlink = htmlspecialchars($req->instagramlink);
        $registered_startup->registered_facebooklink = htmlspecialchars($req->facebooklink);
        $registered_startup->registered_twitterlink = htmlspecialchars($req->twitterlink);
        $registered_startup->registered_linkedinlink = htmlspecialchars($req->linkedinlink);
        $registered_startup->registered_youtubelink = htmlspecialchars($req->youtubelink);
        $registered_startup->registered_flipcartlink = htmlspecialchars($req->flipcartlink);
        $registered_startup->registered_amazonlink = htmlspecialchars($req->amazonlink);
        $registered_startup->registered_swiggylink = htmlspecialchars($req->swiggylink);
        $registered_startup->registered_zomatolink = htmlspecialchars($req->zomatolink);
        $registered_startup->registered_magicpinlink = htmlspecialchars($req->magicpinlink);
        $registered_startup->registered_maplink = htmlspecialchars($req->maplink);
        $registered_startup->registered_otherlinklink = htmlspecialchars($req->otherlink);
        $registered_startup->registered_websitelink = htmlspecialchars($req->websitelink);
        $registered_startup->registered_applink = htmlspecialchars($req->applink);

        $registered_startup->save();

        $req->logo->move(public_path('registered-startup-images'), $imageName);

        return redirect('/')->with('status','registered');
    }
    
    function Fetch(){
        $registered_startup = new RegisteredStartups;

        $startups = $registered_startup::select('registered_startupsrno','registered_startupname','startup_action','registered_startuptime')->get();

        return view('form.startupregistered',compact('startups'));
    }

    function fetchDetails(Request $req,$id){
        $registered_startup = new RegisteredStartups;

        $startups = $registered_startup::where('registered_startupsrno',$id)->get();

        return view('form.startupregistereddetails',compact('startups'));  
    }

    function trashStartup(Request $req){
        $registered_startup = new RegisteredStartups;

        $startup_registrationid = $req->input('id');

        $registered_startup->where('registered_startupsrno',$startup_registrationid)->update(['startup_action' => 'deleted']);
    }

    function startupUploaded(Request $req){
        $registered_startup = new RegisteredStartups;

        $startup_registrationid = $req->input('id');

        $registered_startup->where('registered_startupsrno',$startup_registrationid)->update(['startup_action' => 'uploaded']);
    }
}

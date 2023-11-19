<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Startup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Image;
use Redirect;
use File;
use DateTime;

class StartupDetails extends Controller
{
    //Get all Startup details and display it to admin
    function allStartup(Request $req){
        $allstartups = DB::table('startups')->orderBy('startupsrno','desc')->get();
      
        return view('admin.adminaddstartup',compact('allstartups'));
    }

    //Add startup
    function addStartup(Request $req){
        $mainphoto = $req->file('startupmainphoto');
        $firstphoto = $req->file('startupfirstphoto');
        $secondphoto = $req->file('startupsecondphoto');
        $thirdphoto = $req->file('startupthirdphoto');
        $fourthphoto = $req->file('startupfourthphoto');
        $fifthphoto = $req->file('startupfifthphoto');
        $startup_svg = $req->file('startupsvg');
        $startup_svg_name = $req->file('startupsvg')->getClientOriginalName();
        $startupname = $req->input('startupname');
        $startuptype = $req->input('startuptype');
        $startupdetails = $req->input('startupdetails');
        $startupadvantages = $req->input('startupadvantages');
        $startuplocation = $req->input('startuplocation');
        $startupaddress = $req->input('startupaddress');
        $startupmaplink = $req->input('startupmaplink');
        $foundername1 = $req->input('foundername1');
        $foundername2 = $req->input('foundername2');
        $cofoundername = $req->input('cofoundername');
      	$ownername1 = $req->input('ownername1');
        $ownername2 = $req->input('ownername2');
      	$ownername3 = $req->input('ownername3');
      	$ownername4 = $req->input('ownername4');
      	$ownername5 = $req->input('ownername5');
      	$ownerdetails = $req->input('ownerdetails');
        $founderdetails = $req->input('founderdetails');
        $studyingin = $req->input('studyingin');
        $studiedat = $req->input('studiedat');
        $dropoutfrom = $req->input('dropoutfrom');
        $selftaught = $req->input('selftaught');
        $contactno1 = $req->input('contactno1');
        $contactno2 = $req->input('contactno2');
        $contactemail1 = $req->input('contactemail1');
        $contactemail2 = $req->input('contactemail2');
        $websitelink1 = $req->input('websitelink1');
        $websitelink2 = $req->input('websitelink2');
        $applink = $req->input('applink');
        $startupemail = $req->input('startupemail');
        $facebooklink = $req->input('facebooklink');
        $instagramlink = $req->input('instagramlink');
        $linkedinlink = $req->input('linkedinlink');
      	$pinterestlink = $req->input('pinterestlink');
        $telegramlink = $req->input('telegramlink');
        $twitterlink = $req->input('twitterlink');
        $whatsapplink1 = $req->input('whatsapplink1');
        $whatsapplink2 = $req->input('whatsapplink2');
        $youtubelink = $req->input('youtubelink');
        $flipcartlink = $req->input('flipcartlink');
        $amazonlink = $req->input('amazonlink');
        $swiggylink = $req->input('swiggylink');
      	$zomatolink = $req->input('zomatolink');
      	$magicpinlink = $req->input('magicpinlink');

        if($req->hasFile('startupfirstphoto')){
            $startupfirstphoto = md5(rand()) . '.webp';
            $destinationPath = public_path('/startup');
            Image::make($firstphoto->getRealPath())->resize(484, 500)->save($destinationPath.'/'.$startupfirstphoto);
        }else{
            $startupfirstphoto = "";
        }
        if($req->hasFile('startupsecondphoto')){
            $startupsecondphoto = md5(rand()) . '.webp';
            $destinationPath = public_path('/startup');
            Image::make($secondphoto->getRealPath())->resize(484, 500)->save($destinationPath.'/'.$startupsecondphoto);
        }else{
            $startupsecondphoto = "";
        }
        if($req->hasFile('startupthirdphoto')){
            $startupthirdphoto = md5(rand()) . '.webp';
            $destinationPath = public_path('/startup');
            Image::make($thirdphoto->getRealPath())->resize(484, 500)->save($destinationPath.'/'.$startupthirdphoto);
        }else{
            $startupthirdphoto = "";
        }
        if($req->hasFile('startupfourthphoto')){
            $startupfourthphoto = md5(rand()) . '.webp';
            $destinationPath = public_path('/startup');
            Image::make($fourthphoto->getRealPath())->resize(484, 500)->save($destinationPath.'/'.$startupfourthphoto);
        }else{
            $startupfourthphoto = "";
        }
        if($req->hasFile('startupfifthphoto')){
            $startupfifthphoto = md5(rand()) . '.webp';
            $destinationPath = public_path('/startup');
            Image::make($fifthphoto->getRealPath())->resize(484, 500)->save($destinationPath.'/'.$startupfifthphoto);
        }else{
            $startupfifthphoto = "";
        }
        
        $svg_file = public_path('startup-svg/' . $startup_svg_name);
        if(!file_exists($svg_file)){
            $startupsvgPath = public_path('/startup-svg');
            $startup_svg->move($startupsvgPath, $startup_svg_name);
        }

        $startupmainphoto = md5(rand()) . '.webp';
        $destinationPath = public_path('/startup');
        Image::make($mainphoto->getRealPath())->resize(484, 500)->save($destinationPath.'/'.$startupmainphoto);

        $startup_details = [
            'startupmainphoto'=>$startupmainphoto,
            'startupfirstphoto'=>$startupfirstphoto,
            'startupsecondphoto'=>$startupsecondphoto,
            'startupthirdphoto'=>$startupthirdphoto,
            'startupfourthphoto'=>$startupfourthphoto,
            'startupfifthphoto'=>$startupfifthphoto,
            'startupsvg'=>$startup_svg_name,
            'startupname'=>$startupname,
            'startuptype'=>$startuptype,
            'startupdetails'=>$startupdetails,
            'startuplocation'=>$startuplocation,
            'startupadvantages'=>$startupadvantages,
            'startupaddress'=>$startupaddress,
            'startupmaplink'=>$startupmaplink,
            'foundername1'=>$foundername1,
            'foundername2'=>$foundername2,
            'cofoundername'=>$cofoundername,
            'founderdetails'=>$founderdetails,
            'ownername1'=>$ownername1,
            'ownername2'=>$ownername2,
            'ownername3'=>$ownername3,
            'ownername4'=>$ownername4,
            'ownername5'=>$ownername5,
            'ownerdetails'=>$ownerdetails,
            'studyingin'=>$studyingin,
            'studiedat'=>$studiedat,
            'dropoutfrom'=>$dropoutfrom,
            'selftaught'=>$selftaught,
            'contactno1'=>$contactno1,
            'contactno2'=>$contactno2,
            'contactemail1'=>$contactemail1,
            'contactemail2'=>$contactemail2,
            'websitelink1'=>$websitelink1,
            'websitelink2'=>$websitelink2,
            'applink'=>$applink,
            'startupemail'=>$startupemail,
            'facebooklink'=>$facebooklink,
            'instagramlink'=>$instagramlink,
            'linkedinlink'=>$linkedinlink,
            'pinterestlink'=>$pinterestlink,
            'telegramlink'=>$telegramlink,
            'twitterlink'=>$twitterlink,
            'whatsapplink1'=>$whatsapplink1,
            'whatsapplink2'=>$whatsapplink2,
            'youtubelink'=>$youtubelink,
            'flipcartlink'=>$flipcartlink,
            'amazonlink'=>$amazonlink,
            'swiggylink'=>$swiggylink,
            'zomatolink'=>$zomatolink,
            'magicpinlink'=>$magicpinlink
        ];
        DB::table('startups')->insert($startup_details);
        
        return redirect()->back();
    }

    //Update Startup photo
    function updatestartupPhoto(Request $req){
        $startupsrno = $req->input('startupsrno');
        $mainphoto = $req->file('startupmainphoto');
        $firstphoto = $req->file('startupfirstphoto');
        $secondphoto = $req->file('startupsecondphoto');
        $thirdphoto = $req->file('startupthirdphoto');
        $fourthphoto = $req->file('startupfourthphoto');
        $fifthphoto = $req->file('startupfifthphoto');
        $startup_svg = $req->file('startupsvg');
        
        if($req->hasFile('startupsvg')){
            $startup_svg_name = $req->file('startupsvg')->getClientOriginalName();
        }

        if($req->hasFile('startupmainphoto')){
            $get_startupmainphoto = DB::table('startups')->where('startupsrno',$startupsrno)->value('startupmainphoto');
            if($get_startupmainphoto!=""){
                $file_path = "startup/".$get_startupmainphoto;
                if(File::exists($file_path)){
                    File::delete($file_path);
                }
            }
            $startupmainphoto = md5(rand()) . '.jpeg';
            $destinationPath = public_path('/startup');
            Image::make($mainphoto->getRealPath())->save($destinationPath.'/'.$startupmainphoto);

            DB::table('startups')
                ->where('startupsrno',$startupsrno)
                ->update(['startupmainphoto' => $startupmainphoto]);
        }

        if($req->hasFile('startupfirstphoto')){
            $get_startupfirstphoto = DB::table('startups')->where('startupsrno',$startupsrno)->value('startupfirstphoto');
            if($get_startupfirstphoto!=""){
                $file_path = "startup/".$get_startupfirstphoto;
                if(File::exists($file_path)){
                    File::delete($file_path);
                }
            }
            $startupfirstphoto = md5(rand()) . '.jpeg';
            $destinationPath = public_path('/startup');
            Image::make($firstphoto->getRealPath())->save($destinationPath.'/'.$startupfirstphoto);

            DB::table('startups')
            ->where('startupsrno',$startupsrno)
            ->update(['startupfirstphoto' => $startupfirstphoto]);
        }

        if($req->hasFile('startupsecondphoto')){
            $get_startupsecondphoto = DB::table('startups')->where('startupsrno',$startupsrno)->value('startupsecondphoto');
            if($get_startupsecondphoto!=""){
                $file_path = "startup/".$get_startupsecondphoto;
                if(File::exists($file_path)){
                    File::delete($file_path);
                }
            }
            $startupsecondphoto = md5(rand()) . '.jpeg';
            $destinationPath = public_path('/startup');
            Image::make($secondphoto->getRealPath())->save($destinationPath.'/'.$startupsecondphoto);

            DB::table('startups')
            ->where('startupsrno',$startupsrno)
            ->update(['startupsecondphoto' => $startupsecondphoto]);
        }

        if($req->hasFile('startupthirdphoto')){
            $get_startupthirdphoto = DB::table('startups')->where('startupsrno',$startupsrno)->value('startupthirdphoto');
            if($get_startupthirdphoto!=""){
                $file_path = "startup/".$get_startupthirdphoto;
                if(File::exists($file_path)){
                    File::delete($file_path);
                }
            }
            $startupthirdphoto = md5(rand()) . '.jpeg';
            $destinationPath = public_path('/startup');
            Image::make($thirdphoto->getRealPath())->save($destinationPath.'/'.$startupthirdphoto);

            DB::table('startups')
            ->where('startupsrno',$startupsrno)
            ->update(['startupthirdphoto' => $startupthirdphoto]);
        }

        if($req->hasFile('startupfourthphoto')){
            $get_startupfourthphoto = DB::table('startups')->where('startupsrno',$startupsrno)->value('startupfourthphoto');
            if($get_startupfourthphoto!=""){
                $file_path = "startup/".$get_startupfourthphoto;
                if(File::exists($file_path)){
                    File::delete($file_path);
                }
            }
            $startupfourthphoto = md5(rand()) . '.jpeg';
            $destinationPath = public_path('/startup');
            Image::make($fourthphoto->getRealPath())->save($destinationPath.'/'.$startupfourthphoto);

            DB::table('startups')
            ->where('startupsrno',$startupsrno)
            ->update(['startupfourthphoto' => $startupfourthphoto]);
        }

        if($req->hasFile('startupfifthphoto')){
            $get_startupfifthphoto = DB::table('startups')->where('startupsrno',$startupsrno)->value('startupfifthphoto');
            if($get_startupfifthphoto!=""){
                $file_path = "startup/".$get_startupfifthphoto;
                if(File::exists($file_path)){
                    File::delete($file_path);
                }
            }
            $startupfifthphoto = md5(rand()) . '.jpeg';
            $destinationPath = public_path('/startup');
            Image::make($fifthphoto->getRealPath())->save($destinationPath.'/'.$startupfifthphoto);

            DB::table('startups')
            ->where('startupsrno',$startupsrno)
            ->update(['startupfifthphoto' => $startupfifthphoto]);
        }
        
        if($req->hasFile('startupsvg')){
            $svg_file = public_path('startup-svg/' . $startup_svg_name);
            if(!file_exists($svg_file)){
                $startupsvgPath = public_path('/startup-svg');
                $startup_svg->move($startupsvgPath, $startup_svg_name);
            }
            DB::table('startups')
            ->where('startupsrno',$startupsrno)
            ->update(['startupsvg' => $startup_svg_name]);
        }
        return redirect()->back();
    }

    //Update Startup details
    function updatestartupDetails(Request $req){
        $startupsrno = $req->input('startupsrno');
        $startupname = $req->input('startupname');
        $startuptype = $req->input('startuptype');
        $startupdetails = $req->input('startupdetails');
        $startupadvantages = $req->input('startupadvantages');
        $startuplocation = $req->input('startuplocation');
        $startupaddress = $req->input('startupaddress');
        $startupmaplink = $req->input('startupmaplink');
        $foundername1 = $req->input('foundername1');
        $foundername2 = $req->input('foundername2');
        $cofoundername = $req->input('cofoundername');
        $founderdetails = $req->input('founderdetails');
      	$ownername1 = $req->input('ownername1');
        $ownername2 = $req->input('ownername2');
      	$ownername3 = $req->input('ownername3');
      	$ownername4 = $req->input('ownername4');
      	$ownername5 = $req->input('ownername5');
      	$ownerdetails = $req->input('ownerdetails');
        $studyingin = $req->input('studyingin');
        $studiedat = $req->input('studiedat');
        $dropoutfrom = $req->input('dropoutfrom');
        $selftaught = $req->input('selftaught');
        $contactno1 = $req->input('contactno1');
        $contactno2 = $req->input('contactno2');
        $contactemail1 = $req->input('contactemail1');
        $contactemail2 = $req->input('contactemail2');
        $websitelink1 = $req->input('websitelink1');
        $websitelink2 = $req->input('websitelink2');
        $applink = $req->input('applink');
        $startupemail = $req->input('startupemail');
        $facebooklink = $req->input('facebooklink');
        $instagramlink = $req->input('instagramlink');
        $linkedinlink = $req->input('linkedinlink');
      	$pinterestlink = $req->input('pinterestlink');
        $telegramlink = $req->input('telegramlink');
        $twitterlink = $req->input('twitterlink');
        $whatsapplink1 = $req->input('whatsapplink1');
        $whatsapplink2 = $req->input('whatsapplink2');
        $youtubelink = $req->input('youtubelink');
        $flipcartlink = $req->input('flipcartlink');
        $amazonlink = $req->input('amazonlink');
        $swiggylink = $req->input('swiggylink');
        $zomatolink = $req->input('zomatolink');
      	$magicpinlink = $req->input('magicpinlink');

        $updatestartupdetails = [
            'startupname'=>$startupname,
            'startuptype'=>$startuptype,
            'startupdetails'=>$startupdetails,
            'startupadvantages'=>$startupadvantages,
            'startuplocation'=>$startuplocation,
            'startupaddress'=>$startupaddress,
            'startupmaplink'=>$startupmaplink,
            'foundername1'=>$foundername1,
            'foundername2'=>$foundername2,
            'cofoundername'=>$cofoundername,
            'founderdetails'=>$founderdetails,
            'ownername1'=>$ownername1,
            'ownername2'=>$ownername2,
            'ownername3'=>$ownername3,
            'ownername4'=>$ownername4,
            'ownername5'=>$ownername5,
            'ownerdetails'=>$ownerdetails,
            'contactemail1'=>$contactemail1,
            'contactemail2'=>$contactemail2,
            'websitelink1'=>$websitelink1,
            'websitelink2'=>$websitelink2,
            'applink'=>$applink,
            'startupemail'=>$startupemail,
            'facebooklink'=>$facebooklink,
            'instagramlink'=>$instagramlink,
            'linkedinlink'=>$linkedinlink,
            'pinterestlink'=>$pinterestlink,
            'telegramlink'=>$telegramlink,
            'twitterlink'=>$twitterlink,
            'whatsapplink1'=>$whatsapplink1,
            'whatsapplink2'=>$whatsapplink2,
            'youtubelink'=>$youtubelink,
            'flipcartlink'=>$flipcartlink,
            'amazonlink'=>$amazonlink,
            'swiggylink'=>$swiggylink,
            'zomatolink'=>$zomatolink,
            'magicpinlink'=>$magicpinlink
        ];
        DB::table('startups')->where('startupsrno',$startupsrno)->update($updatestartupdetails);

        return redirect()->back();
    }

    //delete startup photo
    function deletestartupPhoto(Request $req){
        $startupphoto = $req->input('startupphoto');
        $columnname = $req->input('columnname');
        $startupsrno = $req->input('srno');
        
        $file_path = "startup/".$startupphoto;
        if(File::exists($file_path)){
            File::delete($file_path);
        }
    
        DB::table('startups')
        ->where('startupsrno',$startupsrno)
        ->update([$columnname => ""]);
    }

    //Delete specific Startup
    function deleteStartup(Request $req){
        $startupsrno = $req->input('startupsrno');

        $startup = DB::table('startups')->select('startupmainphoto','startupfirstphoto','startupsecondphoto','startupthirdphoto','startupfourthphoto','startupfifthphoto')
        ->where('startupsrno',$startupsrno)->first();

        $main_filepath = "startup/".$startup->startupmainphoto;
        if(File::exists($main_filepath)){
            File::delete($main_filepath);
        }
        $first_filepath = "startup/".$startup->startupfirstphoto;
        if(File::exists($first_filepath)){
            File::delete($first_filepath);
        }
        $second_filepath = "startup/".$startup->startupsecondphoto;
        if(File::exists($second_filepath)){
            File::delete($second_filepath);
        }
        $third_filepath = "startup/".$startup->startupthirdphoto;
        if(File::exists($third_filepath)){
            File::delete($third_filepath);
        }
        $fourth_filepath = "startup/".$startup->startupfourthphoto;
        if(File::exists($fourth_filepath)){
            File::delete($fourth_filepath);
        }
        $fifth_filepath = "startup/".$startup->startupfifthphoto;
        if(File::exists($fifth_filepath)){
            File::delete($fifth_filepath);
        }
        
        DB::table('startups')->where('startupsrno',$startupsrno)->delete();

        return redirect()->back();
    }
}

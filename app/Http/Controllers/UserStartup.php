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

class UserStartup extends Controller
{
    //Get all Startup details and display it to the User
    function getStartup(Request $req){
        $randomstartups = DB::table('startups')->select('startupsrno','startupmainphoto','startupsvg','startupname','startupdetails','foundername1','foundername2','cofoundername','founderdetails','ownername1','ownername2','ownername3','ownername4','ownername5','ownerdetails',
        'studyingin','studiedat','dropoutfrom','selftaught')
        ->whereNull('ownername3')->inRandomOrder()->orderBy('startupsrno','desc')->take(5)->get();

        $startups = DB::table('startups')
        ->select('startupsrno','startupmainphoto','startupsvg','startupname','startuptype','startupdetails','foundername1','foundername2','cofoundername','founderdetails','ownername1','ownername2','ownername3','ownername4','ownername5','ownerdetails',
        'studyingin','studiedat','dropoutfrom','selftaught','startupregistered')
        ->orderBy('startupsrno', 'desc')->Paginate(4);
        if($req->ajax()){
            $view = view('startup.startupdata',compact('startups'))->render();
            return response()->json(['html'=>$view]);
        } 

        $startuptypes = DB::table('startups')->select('startuptype')->orderBy('startuptype','asc')->distinct()->get();

        return view('startup.allstartup',compact('randomstartups','startups','startuptypes'));
    }

    //Get all serach photo for search page
    function getSearchphoto(Request $req){
         $startupimages = Startup::select('startupsrno','startupmainphoto','startupname')->inRandomOrder()->paginate(15);

        if($req->ajax()){
            $view = view('startup.searchstartup-data',compact('startupimages'))->render();
            return response()->json(['html'=>$view]);
        } 

        return view('startup.searchstartup',compact('startupimages'));
    }

    function getstartupCategory(Request $req,$startupcategory,$starttype){
        $starttype = str_replace('+', ' ', $starttype);
        $categories = DB::table('startups')->where('startuptype',$starttype)
        ->orWhere('studyingin',$starttype)->orWhere('studiedat',$starttype)->orWhere('startuplocation',$starttype)
        ->orderBy('startupsrno','desc')->paginate(6);
        
	    if($req->ajax()){
            $view = view('startup.categorydata',compact('categories'))->render();
            return response()->json(['html'=>$view]);
        } 

        return view('startup.startupcategory',compact('categories'));
    }

    //Get Startup Category like Carft, Art
    function getspecificStartup(Request $req){
        $filter = $req->input('filter');
        $filter = str_replace('+', ' ', $filter);

        if($filter == 'all'){
            $startups = DB::table('startups')
            ->select('startupsrno','startupmainphoto','startupsvg','startupname','startuptype','startupdetails','foundername1','foundername2','cofoundername','founderdetails','ownername1','ownername2','ownername3','ownername4','ownername5','ownerdetails',
            'studyingin','studiedat','dropoutfrom','selftaught','startupregistered')
            ->orderBy('startupsrno', 'desc')->Paginate(6);
            if($req->ajax()){
                $view = view('startup.startupdata',compact('startups'))->render();
                return response()->json(['html'=>$view]);
            }
        }else{
            $startups = DB::table('startups')->where('startuptype',$filter)
            ->orWhere('studyingin',$filter)->orWhere('studiedat',$filter)->orWhere('startuplocation',$filter)
            ->orderBy('startupsrno','desc')->get();

            $view = view('startup.startupdata',compact('startups'))->render();
            return response()->json(['html'=>$view]);
        }
    }

    //Startup filter
    function startupFilter(Request $req){
        $filter = $req->input('filter');
        $all = "all";

        if($filter == 'category'){
            $startuptypes = DB::table('startups')->select('startuptype')->orderBy('startuptype','asc')->distinct()->get();
            
            echo '	<a href="javascript:void(0)" onclick="selectFiltercategory(\''.$all.'\',\''.$all.'\')">
                <button type="button" class="btn btn-light filter-btn" id="all-btn" style="background-color:#5B00FF; color:white;">ALL</button>
            </a>';
            foreach($startuptypes as $startuptype){
			    $startupcategorylink = str_replace(' ', '+', $startuptype->startuptype);
                $input = preg_replace("/[^a-zA-Z]+/", "", $startuptype->startuptype);

                echo '<a href="javascript:void(0)" onclick="selectFiltercategory(\''.$startuptype->startuptype.'\',\''.$input.'\')">
                        <button type="button" class="btn btn-light filter-btn" id="btn_'.$input.'">'.$startuptype->startuptype.'</button>
                    </a>';
			    // echo "<a href=$filter/$startupcategorylink>
			    // 	<button type='button' class='btn btn-light filter-btn'>$startuptype->startuptype</button>
			    // </a>";
            }
        }elseif($filter == 'college'){
            $startuptypes = DB::table('startups')->select('studyingin','studiedat')->orderBy('startuptype','asc')->distinct()->get();
            
            echo '	<a href="javascript:void(0)" onclick="selectFiltercategory(\''.$all.'\',\''.$all.'\')">
                <button type="button" class="btn btn-light filter-btn" id="all-btn" style="background-color:#5B00FF; color:white;">ALL</button>
            </a>';
            foreach($startuptypes as $startuptype){
                if($startuptype->studyingin != NULL){
                    // $startupcategorylink = str_replace(' ', '+', $startuptype->studyingin);
                    $input = preg_replace("/[^a-zA-Z]+/", "", $startuptype->studyingin);

			        echo '<a href="javascript:void(0)" onclick="selectFiltercategory(\''.$startuptype->studyingin.'\',\''.$input.'\')">
                        <button type="button" class="btn btn-light filter-btn" id="btn_'.$input.'">'.$startuptype->studyingin.'</button>
                    </a>';
                }elseif($startuptype->studiedat != NULL){
                    // $startupcategorylink = str_replace(' ', '+', $startuptype->studiedat);
                    $input = preg_replace("/[^a-zA-Z]+/", "", $startuptype->studiedat);

                    echo '<a href="javascript:void(0)" onclick="selectFiltercategory(\''.$startuptype->studiedat.'\',\''.$input.'\')">
                        <button type="button" class="btn btn-light filter-btn" id="btn_'.$input.'">'.$startuptype->studiedat.'</button>
                    </a>';
                }
            }
        }elseif($filter == 'location'){
            $startuptypes = DB::table('startups')->select('startuplocation')->whereNotNull('startuplocation')->orderBy('startuplocation','asc')->distinct()->get();
            
            echo '	<a href="javascript:void(0)" onclick="selectFiltercategory(\''.$all.'\',\''.$all.'\')">
                <button type="button" class="btn btn-light filter-btn" id="all-btn" style="background-color:#5B00FF; color:white;">ALL</button>
            </a>';
            foreach($startuptypes as $startuptype){
			    $startupcategorylink = str_replace(' ', '+', $startuptype->startuplocation);
                $input = preg_replace("/[^a-zA-Z]+/", "", $startuptype->startuplocation);

                echo '<a href="javascript:void(0)" onclick="selectFiltercategory(\''.$startuptype->startuplocation.'\',\''.$input.'\')">
                    <button type="button" class="btn btn-light filter-btn" id="btn_'.$input.'">'.$startuptype->startuplocation.'</button>
                </a>';

                // echo '<i class="fas fa-trash" onclick="deleteComment('.$comment->commentsrno.','.$comment->postcomment_srno.',\''.$comment->comment_username.'\')"></i>'
            }
        }
    }

    //Get specific Startup details and display it to user
    function getStartupdetails(Request $req,$startupname){
      	/*$special = array("%","&");
      	$replace   = array(" ","'");
      	return $startupname1 = str_replace($special,$replace,$startupname);*/
      	$startupname = str_replace('+', ' ', $startupname);
        $specificdetails = DB::table('startups')->where('startupname',$startupname)->get();
        
        return view('startup.startupdetails',compact('specificdetails'));
    }

    function searchStartup(Request $req){
        //$searchkey = $req['searchkey'] ?? "";
        $searchkey = $req->input('searchkey');

        $startups = Startup::select('startupmainphoto','startupname','startuptype','ownername1','foundername1')->where('startupname','LIKE',"%$searchkey%")
        ->orWhere('ownername1','LIKE',"%$searchkey%")->orWhere('foundername1','LIKE',"%$searchkey%")->orWhere('foundername2','LIKE',"%$searchkey%")
        ->orWhere('startuptype','LIKE',"%$searchkey%")->orWhere('ownername2','LIKE',"%$searchkey%")->take(10)->get();
        if($startups->isEmpty()){
            echo "No result found";
        }else{
            foreach($startups as $startup){
                //$url = url()->full();
                $startupname = str_replace(' ', '+', $startup->startupname);
                echo "<a href='search/$startupname'><span class='search-result-startup-image'><img src='../../startup/$startup->startupmainphoto' class='img-fluid search-result-image'></span>
                <span class='search-result-startup-name'>$startup->startupname,</span>
                <span class='search-result-startup-type'>$startup->startuptype, by</span>
                <span class='search-result-startup-ownername'>$startup->ownername1</span>
                <span class='search-result-startup-foundername'>$startup->foundername1</span></a>";
            }
        }
    }

    function getsearchStartupdetails(Request $req,$startupname){
        $startupname = str_replace('+', ' ', $startupname);
        $specificdetails = DB::table('startups')->where('startupname',$startupname)->get();
        
        return view('startup.searchresult',compact('specificdetails'));
    }

     function getStartupCarousel(Request $req){
        $randomstartups = DB::table('startups')->select('startupsrno','startupmainphoto','startupsvg','startupname','startupdetails','foundername1','foundername2','cofoundername','founderdetails','ownername1','ownername2','ownername3','ownername4','ownername5','ownerdetails',
        'studyingin','studiedat','dropoutfrom','selftaught')
        ->whereNull('ownername3')->orderBy('startupsrno','desc')->get();

        return view('admin.adminstartupscreenshot',compact('randomstartups',)); 
    }
}

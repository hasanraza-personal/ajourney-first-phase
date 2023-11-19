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

class Change extends Controller
{
   function index(){
        $startups = DB::table('startups')->select('startupmainphoto','startupfirstphoto',
            'startupsecondphoto','startupthirdphoto','startupfourthphoto','startupfifthphoto')->get();
        
        foreach($startups as $startup){ 
            $new_main = str_replace("webp","jpg",$startup->startupmainphoto);
            
            DB::table('startups')
              ->where('startupmainphoto', $startup->startupmainphoto)
              ->update(['startupmainphoto' => $new_main]);

            if($startup->startupfirstphoto!=""){
                DB::table('startups')
                ->where('startupfirstphoto', $startup->startupfirstphoto)
                ->update(['startupfirstphoto' => $new_main]);
            }

            if($startup->startupsecondphoto!=""){
                DB::table('startups')
                ->where('startupsecondphoto', $startup->startupsecondphoto)
                ->update(['startupsecondphoto' => $new_main]);
            }

            if($startup->startupthirdphoto!=""){
                DB::table('startups')
                ->where('startupthirdphoto', $startup->startupthirdphoto)
                ->update(['startupthirdphoto' => $new_main]);
            }

            if($startup->startupfourthphoto!=""){
                DB::table('startups')
                ->where('startupfourthphoto', $startup->startupfourthphoto)
                ->update(['startupfourthphoto' => $new_main]);
            }

            if($startup->startupfirstphoto!=""){
                DB::table('startups')
                ->where('startupfifthphoto', $startup->startupfifthphoto)
                ->update(['startupfifthphoto' => $new_main]);
            }
        }
   }
}

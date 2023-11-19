<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Image;
use Redirect;
use File;
use DateTime;

class FeedbackForm extends Controller
{
    function Store(Request $req){
        $email = $req->get('email');
        $feedback = $req->get('feedback');

        DB::table('feedback')->insert(
            array('email'=>$email,'feedback'=>$feedback)
        ); 
    }
}

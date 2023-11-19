<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserReport extends Controller
{
    function submitReport(Request $req){
        $session_username = $req->session()->get('session_username');

        $postsrno = $req->input('postsrno');
        $postusername = $req->input('postusername');
        $postcategory = $req->input('postreportcategory');
        $postcomment = $req->input('postreportcomment');

        //echo $postsrno,$postusername,$postcategory,$postcategory;
        DB::table('userpostreports')->insert(
            array('reportpostsrno'=>$postsrno,'reportpostusername'=>$postusername,'reportedby'=>$session_username,'reportoption'=>$postcategory,'reportcomment'=>$postcomment,'report_created'=>now())
        );
    }
}

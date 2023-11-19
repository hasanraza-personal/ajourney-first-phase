<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyAPI extends Controller
{
    function getData(){
        return [
            "username"=>"Khan Hasan Raza",
            "mobileno"=>"123456789",
            "dob"=>"25/12/1996",
            "religion"=>"unknown",
            "zipcode"=>"401107",
            "roleid"=>"15",
            "createdat"=>"23:59:48",
            "modifiedat"=>"02:48:57"
        ];
    }
}

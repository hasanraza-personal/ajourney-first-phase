<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredStartups extends Model
{
    use HasFactory;
    protected $table = 'registered_startups';
    protected $primarykey = 'registered_startupsrno';

    public $timestamps = false;
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\users;

class Register_Controller extends Controller
{
    public function Register_User(Request $rq){
		$addnew = new users;			
        $addnew->username = $rq->username;
        $addnew->password = Hash::make($rq->password);
        $addnew->user_type = 'operator';
        $addnew->save();        
    }
}

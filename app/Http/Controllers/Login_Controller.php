<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\users;

class Login_Controller extends Controller
{
    public function Login_User(Request $rq){

    	if(Auth::attempt([
    		'username' => $rq->username,
    		'password' => $rq->password,
    	]))
    	{
            $user = users::where('username',$rq->username)->first();
    		$currently_logged_user = users::select('id','user_type')->where('username',$rq->username)->get();

            // $data = $currently_logged_user->toArray();

    		return json_encode(auth()->user()->user_type);
    	}

    	else{
            // dapat notification sa pag login if erro through angular
    		return json_encode("incorrect");
    	}
    }
}

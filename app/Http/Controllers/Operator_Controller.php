<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ticket;
use Carbon\Carbon;
use App\ticket_support;
use App\service;
use Auth;
class Operator_Controller extends Controller
{
    public function Submit_Ticket(Request $rq){
        // return Carbon::now()->setTimezone('Asia/Tokyo');
        $user_id = auth()->user()->id;
        $date = Carbon::now()->setTimezone('Asia/Singapore');
    	$addnew = new ticket;
    	$addnew->service_id = $rq->Service_Id;
    	$addnew->comment = $rq->Comment;
        $addnew->level = 1;        
    	$addnew->status = 0;
        $addnew->user_id = $user_id;
        // $addnew->created_at = $date;
        // $addnew->updated_at = $date;
    	$addnew->save();

    }

    public function Check_Ticket(){
    	$tickets = ticket::where('status',0)->where('level',1)->get();
    	if($tickets == null){
    		return json_encode("None");
    	}
    	// return php_uname();
    	// echo carbon::parse($tickets->updated_at)->addMinutes(29)->diffForHumans(['parts' => 2]);

    	// echo $expire = carbon::parse($tickets->updated_at)->addMinutes(43)->diffForHumans();
        foreach ($tickets as $key) {
            $expire = carbon::parse($key->updated_at)->addMinutes(45);
        
            $date = Carbon::now()->setTimezone('Asia/Singapore');
            if($expire->lessThanOrEqualTo($date)){
                
                ticket::where('ticket_id',$key->ticket_id)->update(['level'=>2]);

            }
        }
    	
    	return 1;    	
    }

    public function Get_Services(){
        return service::get();
    }

    

    
}

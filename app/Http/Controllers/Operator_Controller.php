<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ticket;
use Carbon\Carbon;


class Operator_Controller extends Controller
{
    public function Submit_Ticket(Request $rq){
    	$addnew = new ticket;
    	$addnew->service_id = $rq->Service_Id;
    	$addnew->comment = $rq->Comment;
        $addnew->level = 1;
    	$addnew->status = 0;
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
        
            $date = carbon::now();
            if($expire->lessThanOrEqualTo($date)){
                
                ticket::where('ticket_id',$key->ticket_id)->update(['level'=>2]);

            }
        }
    	
    	return 1;    	
    }

    

    
}

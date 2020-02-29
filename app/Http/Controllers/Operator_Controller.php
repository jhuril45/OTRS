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
        $date = Carbon::now()->setTimezone('Asia/Singapore');
        $user_id = auth()->user()->id;
        $date = $date;
    	$addnew = new ticket;
    	$addnew->service_id = $rq->Service_Id;
    	$addnew->comment = $rq->Comment;
        $addnew->level = 1;        
    	$addnew->status = 0;
        $addnew->user_id = $user_id;        
    	$addnew->save();

    }

    public function Check_Ticket(){
        $date = Carbon::now()->setTimezone('Asia/Singapore');
    	$tickets = ticket::where('status',0)->where('level',1)->with('service')->first();
    	if($tickets == null){
    		return json_encode("None");
    	}
            $ticket = carbon::parse($tickets->created_at);
            $diff = $date->diffInMinutes($ticket);
            if($diff >= $tickets->service->service_deadline){
                ticket::where('ticket_id',$tickets->ticket_id)->update(['level'=>2]);
            }
    	// return php_uname();
    	// echo carbon::parse($tickets->updated_at)->addMinutes(29)->diffForHumans(['parts' => 2]);

    	// echo $expire = carbon::parse($tickets->updated_at)->addMinutes(43)->diffForHumans();
        
        // foreach ($tickets as $key) {
        //     $ticket = carbon::parse($key->created_at);
        //     $diff = $date->diffInMinutes($ticket);
        //     if($diff >= $key->service->service_deadline){
        //         ticket::where('ticket_id',$key->ticket_id)->update(['level'=>2]);
        //     }
        // }
    	
    	return json_encode("Check");
    }

    public function Get_Services(){
        return service::get();
    }

    public function Get_Tickets(){

        $date = Carbon::now()->setTimezone('Asia/Singapore');
        $list = [];
        $ticket = ticket::where('level',1)->with('service')->get();
        foreach ($ticket as $key) {
            $ticket = carbon::parse($key->created_at);
            $diff = $date->diffInMinutes($ticket);
            $key->time_passed = $diff;
            array_push($list, $key);
        }
        return $list;
    }

    

    
}

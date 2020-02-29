<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\ticket;
use Carbon\Carbon;
use App\ticket_support;

class Tech_Staff_Controller extends Controller
{
    public function Get_Tickets(){
        $tickets = ticket::where('level',1)->where('status',0)->with('service')->get();
        return $tickets;
    }


    public function List_Cater_Ticket(){
    	$user_id = auth()->user()->id;
        $tickets = ticket_support::where('user_id',$user_id)->with("ticket","ticket.service")->get();
        return $tickets;
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
            $expire = carbon::parse($key->updated_at)->addMinutes(120);
        
            $date = Carbon::now()->setTimezone('Asia/Singapore');
            if($expire->lessThanOrEqualTo($date)){
                
                ticket::where('ticket_id',$key->ticket_id)->update(['level'=>2]);
                return json_encode("Match");

            }
        }
    	
    	return 1;    	
    }

    public function Cater_Ticket(Request $rq){
    	$user_id = auth()->user()->id;
    	$date = Carbon::now()->setTimezone('Asia/Singapore');
    	$addnew = new ticket_support;
    	$addnew->ticket_id = $rq->ticket_id;
    	$addnew->user_id = $user_id;
    	$addnew->status = 0;
    	$addnew->save();

    	ticket::where('ticket_id',$rq->ticket_id)->update(['status'=>1]);
    	$tickets = ticket::where('level',1)->where('status',0)->get();
    	return $tickets;
    }

    public function Finish_Ticket(Request $rq){
    	
    	$date = Carbon::now()->setTimezone('Asia/Singapore');
    	$ticket = ticket_support::where('ticket_id',$rq->ticket_id)->first();
    	$ticket = carbon::parse($ticket->created_at);
    	$diff = $date->diffInMinutes($ticket);
    	
    	ticket_support::where('ticket_id',$rq->ticket_id)->update(['status'=>1]);
    	ticket_support::where('ticket_id',$rq->ticket_id)->update(['comment'=>$rq->comment]);
    	ticket_support::where('ticket_id',$rq->ticket_id)->update(['time_finished'=>$date]);
    	ticket_support::where('ticket_id',$rq->ticket_id)->update(['time_consumed'=>$diff]);
    	ticket::where('ticket_id',$rq->ticket_id)->update(['status'=>2]);
    	$user_id = auth()->user()->id;
    	$tickets = ticket_support::where('user_id',$user_id)->with("ticket","ticket.service")->get();
        
        return $tickets;
    }
}

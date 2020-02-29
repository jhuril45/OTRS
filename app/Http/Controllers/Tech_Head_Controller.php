<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\service;
use App\ticket;
use App\ticket_support;
use Carbon\Carbon;
class Tech_Head_Controller extends Controller
{

    public function Get_Services(){
    	return service::get();
    }

    public function Get_Tickets(){
        $tickets = ticket::where('level',1)->with('service')->where('status',0)->get();
        return $tickets;
    }

    public function Get_Cater_Tickets(){
    	$list_tickets = [];
    	
        $tickets = ticket_support::with('ticket.service')->get();
        
        return $tickets;
    }

    public function Submit_Service(Request $rq){
    	$addnew = new service;
    	$addnew->service_name = $rq->service_name;
    	$addnew->service_deadline = $rq->service_deadline;
    	$addnew->save();

    	return service::get();
    }

    public function Get_Expired_Tickets(){        

        $date = Carbon::now()->setTimezone('Asia/Singapore');
        $list = [];
        $ticket = ticket::where('level',2)->with('service')->get();
        foreach ($ticket as $key) {
            $ticket = carbon::parse($key->created_at);
            $diff = $date->diffInMinutes($ticket);
            $key->time_passed = $diff;
            array_push($list, $key);
        }
        return $list;
    }
}

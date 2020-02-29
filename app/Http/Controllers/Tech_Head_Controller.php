<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\service;
use App\ticket;
use App\ticket_support;
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
    	
        $tickets = ticket_support::with('ticket')->get();
        foreach ($tickets as $key) {
        	$key->ticket->created_at = $key->ticket->updated_at;
        	array_push($list_tickets,$key->ticket);
        }
        return $list_tickets;
    }

    public function Submit_Service(Request $rq){
    	$addnew = new service;
    	$addnew->service_name = $rq->service_name;
    	$addnew->service_deadline = $rq->service_deadline;
    	$addnew->save();

    	return service::get();
    }
}

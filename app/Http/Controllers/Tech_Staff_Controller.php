<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ticket;
use Carbon\Carbon;

class Tech_Staff_Controller extends Controller
{
    public function Get_Tickets(){
        $tickets = ticket::where('level',1)->where('status',0)->get();
        return $tickets;
    }
}

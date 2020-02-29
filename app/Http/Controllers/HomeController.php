<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function operator()
    {
        return view('operator.home');
    }

    public function tech_staff()
    {
        return view('tech_staff.home');
    }

    public function tech_head()
    {
        return view('tech_head.home');
    }
    
}

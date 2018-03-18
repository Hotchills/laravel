<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainPage;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainpages=MainPage::all(); 
        return view('welcome',compact('mainpages'));
    }
}

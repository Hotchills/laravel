<?php

namespace App\Http\Controllers;

use App\Top;
use Illuminate\Http\Request;
use Session;
use App\Page;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
     {
     $this->middleware('auth'); 
   }
    public function index()
    {
        //
         return view('CreateTop');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
                
        $top = new Top();
        $top->page_id=$request->page_id;
        $top->title=$request->title;
        $top->body =$request->body;
        $page=Page::find($top->page_id);      
        $top->page()->associate($page);    
        
        $top->save();       
        Session::flash('success','page done');
        return view('/CreateTop');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Top  $top
     * @return \Illuminate\Http\Response
     */
    public function show(Top $top)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Top  $top
     * @return \Illuminate\Http\Response
     */
    public function edit(Top $top)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Top  $top
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Top $top)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Top  $top
     * @return \Illuminate\Http\Response
     */
    public function destroy(Top $top)
    {
        //
    }
}

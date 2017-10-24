<?php

namespace App\Http\Controllers;

use App\MainPage;
use Illuminate\Http\Request;
use Session;
use App\Page;

class MainPageController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
     {
     $this->middleware('auth',['except'=>'index']); 
   }
    public function index($main) {

        //   $pages=Page::all();

        if ($mainpage = MainPage::where('name', $main)->first()) {

            //    $pages=Page::where('mainpage_id',$mainpage->id)->get();        
            $id = $mainpage->id;
            $pages = MainPage::find($id)->pages;
            return view('mainpage', compact('mainpage', 'pages'));
        }
        abort(404);
    }

    public function index1() {
        //
        return view('CreateMainPage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $mainpage = new MainPage();
        $mainpage->name = $request->name;
        $mainpage->title = $request->title;
        $mainpage->body = $request->body;
        $mainpage->save();
        Session::flash('success', 'page done');



        //   return Redirect::back()->withInput();

        return view('/CreateMainPage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MainPage  $mainPage
     * @return \Illuminate\Http\Response
     */
    public function show(MainPage $mainPage) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MainPage  $mainPage
     * @return \Illuminate\Http\Response
     */
    public function edit(MainPage $mainPage) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MainPage  $mainPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MainPage $mainPage) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MainPage  $mainPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainPage $mainPage) {
        //
    }

}

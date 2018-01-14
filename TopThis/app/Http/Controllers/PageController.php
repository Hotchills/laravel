<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\MainPage;
use App\Comment;
use Session;
use App\Top;
use Illuminate\Support\Facades\URL;

class PageController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index($main, $slug, Request $request) {
        //
        $one = $slug;
        $returntyp = $request->returntype;
        $id = MainPage::where('name', $main)->first()->id;

        if ($page = Page::where('mainpage_id', $id)->where('name', $one)->first()) {
            //  $tops=Page::find($page->id)->tops;  
            //        dd($urleul=$request->url());
            $tops = Top::where('page_id', $page->id)->orderBy('id')->Paginate(7, ['*'], 'top');
            //  $comments = show();

            if ($request->ajax()) {
 
                    return view('TopsPage', ['tops' => $tops])->render();
            }
            return view('page', compact('one', 'page', 'tops'));
        }
        abort(404);
    }

    public function index1() {

        return view('CreatePage');
    }

    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {



        $page = new Page();
        $page->name = $request->name;
        $page->title = $request->title;
        $page->body = $request->body;
        $page->mainpage_id = $request->mainpage_id;
        $mainpage = MainPage::find($page->mainpage_id);
        $page->mainpage()->associate($mainpage);

        $page->save();

        //   $tops=Top::where('page_name',$one)->get();

        Session::flash('success', 'page done');

        return view('/CreatePage');
        //   return Redirect::back()->withInput();
        //   return view('page',compact('one','page','tops'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}

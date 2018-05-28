<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Top;
use App\Page;
use Illuminate\Http\Request;

class MovieController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        return view('AddMovieInDB');
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
        //
        if ($request->ajax()) {

            $top = new Top();
            $top->page_id = $request->page_id;
            $top->title = $request->title;
            $top->body = '0';
            $page = Page::find($top->page_id);
            $top->page()->associate($page);
            $top->save();


            $movie = new Movie();
            $movie->TMDBid = $request->TMDBid;
            $movie->title = $request->title;
            $movie->poster_path = $request->poster_path;
            $movie->release_date = $request->release_date;
            $movie->overview = $request->overview;
            $movie->vote_average = $request->vote_average;
            $movie->vote_count = $request->vote_count;
            $movie->top_id = $top->id;
            $movie->top()->associate($top);
            $movie->save();
            
             return response()->json(['msg' => $top->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie) {
        //
    }

}

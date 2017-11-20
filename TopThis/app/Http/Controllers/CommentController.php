<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Top;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
public function __construct()
     {
     $this->middleware('auth',['except'=>'store']); 
   }
     */
    public function index($top_id)
    {
        //
        $top=Top::find($top_id);  
        $commentsData = [];
        $top->comments->user;
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
    public function store(Request $request,$top_id)
    {
        $top=Top::find($top_id);  
         
        $comment= new Comment();
     //   $comment->top_id=$top_id;
        $comment->replay_id=$request->replay_id;
        $comment->user=$request->user;
        $comment->email=$request->email;       
        $comment->body =$request->body;         
        $comment->top()->associate($top);
              
        $comment->save();       
      //  Session::flash('success','page done');
        return redirect()->back()->with('message', 'Comment added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}

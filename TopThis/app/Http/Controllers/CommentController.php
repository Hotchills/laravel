<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Top;
use Illuminate\Foundation\Auth\User;
use Auth;

class CommentController extends Controller {

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
    public function index($top_id) {
        //
        $top = Top::find($top_id);
        $commentsData = [];
        $top->comments->user;
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
    public function store(Request $request, $top_id) {
        $top = Top::find($top_id);
        if (Auth::check()) {
            $u_id = Auth::id();
        } else {
            return redirect()->back()->with('message', 'You need to login');
        }

        $comment = new Comment();
        $comment->replay_id = NULL;
        $comment->user_id = $u_id;
        $comment->body = $request->body;
        $comment->top()->associate($top);

        $user = User::find($comment->user_id);
        $comment->user()->associate($user);

        $comment->save();
        return redirect()->back()->with('message', 'Comment added');
    }

    public function storereplay(Request $request, $top_id, $parent_id) {
        
        $top = Top::find($top_id);
        if (Auth::check()) {
            $u_id = Auth::id();
        } else {
            return redirect()->back()->with('message', 'You need to login');
        }
        $comment = new Comment();
        $comment->replay_id = $parent_id;
        $comment->user_id = $u_id;
        $comment->body = $request->body;
        $comment->top()->associate($top);

        $user = User::find($comment->user_id);
        $comment->user()->associate($user);

        $comment->save();
        return redirect()->back()->with('message', 'Comment added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment) {
        //
    }
    public function incrementvote(Request $comment){
        
        $temp=Comment::find($comment);
        $temp->up_vote=1;
        
        return response()->json(['status' => 'success'], 201);
    }
}

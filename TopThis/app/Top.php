<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Top extends Model {

    public $table = 'tops';
    protected $fillable = [
        'page_name', 'title', 'body',
    ];

    public function page() {
        return $this->belongsTo('App\Page', 'page_id', 'id');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'top_id', 'id');
    }

    public function show() {        //
        $comments = Comment::where('top_id', $this->id)->whereNull('approuved')->whereNull('replay_id')->orderBy('id')->Paginate(3, ['*'], "page$this->id");


        return $comments;
    }

    public function showUpVote() {        //
        $comments = Comment::where('top_id', $this->id)->whereNull('approuved')->whereNull('replay_id')->orderBy('up_vote')->Paginate(3, ['*'], "pageup$this->id");

        return $comments;
    }

    public function showDownVote() {        //
        $comments = Comment::where('top_id', $this->id)->whereNull('approuved')->whereNull('replay_id')->orderBy('down_vote')->Paginate(2, ['*'], "pagedown$this->id");

        return $comments;
    }

}

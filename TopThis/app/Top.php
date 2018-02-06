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



    public function showUpVote() {        //
        $comments = Comment::where('top_id', $this->id)->whereNull('approuved')->whereNull('replay_id')->orderBy('up_vote', 'desc')->take(6)->get();//->Paginate(4, ['*'], "pageup$this->id");

        return $comments;
    }
    public function show()  {        //
        $comments = Comment::where('top_id', $this->id)->whereNull('approuved')->whereNull('replay_id')->orderBy('created_at')->take(6)->get();//->Paginate(4, ['*'], "page$this->id");
        return $comments;
    }
    public function showDownVote() {        //
        $comments = Comment::where('top_id', $this->id)->whereNull('approuved')->whereNull('replay_id')->orderBy('down_vote', 'desc')->take(6)->get();//->Paginate(4, ['*'], "pagedown$this->id");

        return $comments;
    }

}

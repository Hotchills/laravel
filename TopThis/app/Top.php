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
        return $this->belongsTo('App\Page','page_id','id');
    }
    public function comments() {
        return $this->hasMany('App\Comment','top_id','id');
    }
      public function show(Top $top)
    {
        //
       $comments=Comment::where('top_id',$top->id)->whereNull('approuved')->whereNull('replay_id')->orderBy('id')->Paginate(5, ['*'],"'comment',$top->id");
       return $comments;
    }
    
}

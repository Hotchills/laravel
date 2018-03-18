<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'comments';
    protected $fillable = [
        'user_id', 'body','top_id','parent_id',
    ];
    public function top() {
    return $this->belongsTo('App\Top','top_id','id');
    }
    public function user() {
    return $this->belongsTo('App\User','user_id','id');
    }
    
   public function showreplays(Comment $comment){
       
       $children=Comment::where('replay_id',$comment->id)->whereNull('approuved')->orderBy('id')->get();
      
       return $children;
   }
}

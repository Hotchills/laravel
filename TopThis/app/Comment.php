<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
        public $table = 'comments';
    protected $fillable = [
        'user', 'email', 'body','top_id','parent_id',
    ];
       public function top() {
        return $this->belongsTo('App\Top','top_id','id');
    }
}

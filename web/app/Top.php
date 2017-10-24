<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}

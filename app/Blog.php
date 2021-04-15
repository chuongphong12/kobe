<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "posts";
    protected $primaryKey = 'id';
    public function Tag()
    {
        return $this->belongsToMany('App\Tag');
    }
}

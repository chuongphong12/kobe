<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The users that belong to the role.
     */
    protected $table = "tags";
    protected $primaryKey = 'id';
    public function Blog()
    {
        // $blogModel = Voyager::modelClass('Post');

        return $this->belongsToMany('App\Blog', 'blog_tags')
                    ->select(app($blogModel)->getTable().'.*')
                    ->union($this->hasMany($blogModel))->getQuery();
    }
}
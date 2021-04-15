<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = "banner";
    protected $primaryKey = 'id_banner';
    protected $fillable = ['id_banner', 'name', 'image','description','post'];
}
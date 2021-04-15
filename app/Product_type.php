<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_type extends Model
{
    protected $table = "product_type";
    protected $fillable = ['name'];
    protected $primaryKey = 'id_product_type';
}

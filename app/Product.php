<?php

namespace App;



use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;


class Product extends Model

{
    protected $table = "products";

    protected $primaryKey = 'id_product';

    use Rateable;
    // public function Cooking(){
    //     return $this->belongsToMany(Cooking::class);
    // }

    // public function Cooking() {

    //     return $this->hasMany('App\Cooking', 'cook_id', 'product_id');

    // }

}
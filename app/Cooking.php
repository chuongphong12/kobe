<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class Cooking extends Model

{

    protected $table = "cooking";

    protected $primaryKey = 'id_cooking';

    // public function Cook_Product(){

    //     return $this->hasMany('App\Cook_Product','product_id','cook_id');

    // }



}

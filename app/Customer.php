<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    protected $fillable = ['name_customer', 'last_name', 'image', 'multi_image', 'description', 'benefit', 'email', 'password', 'phone'];
    protected $primaryKey = 'id_customer';

    public function product_type()
    {
        return $this->belongsTo('App\Product_type', 'id_product_type');
    }
    public function order_detail()
    {
        return $this->hasMany('App\OrderDetail', 'id_product');
    }
}

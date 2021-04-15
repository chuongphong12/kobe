<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = ['name', 'status', 'product', 'id_customer', 'id_promotion', 'description', 'cost'];
    protected $primaryKey = 'id_order';

    public function order_detail()
    {
        return $this->hasMany('App\OrderDetail', 'id_order');
    }
    public function bill()
    {
        return $this->belongsTo('App\Customer', 'id_customer');
    }
}

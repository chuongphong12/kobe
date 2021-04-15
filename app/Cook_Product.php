<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cook_Product extends Model
{
    protected $table = "cook_product";
    protected $filtable = ['cook_id', 'product_id'];
//      public function Cook()
//      {
//          return $this->belong('App\Cooking', 'id_cook', 'cook_id');
//     }
//     public function Product()
//     {
//         return $this->belongsTo('App\Product', 'id_product', 'product_id');
//     }
// }
}

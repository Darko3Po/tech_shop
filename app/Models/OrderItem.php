<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Correct import
use App\Models\Product; // Import the Product model

class OrderItem extends Model
{
    use HasFactory;

    
    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'prod_id',
        'price',
        'qty',
    ];


    /*  
        Get the products that owns  the OrderItems
         @return \Ilimunate\Database\Eloquent\Relations\BelongsTo
    */

         public function products():BelongsTo
         {
             return $this->belongsTo(Product::class, 'prod_id', 'id');
         }


}

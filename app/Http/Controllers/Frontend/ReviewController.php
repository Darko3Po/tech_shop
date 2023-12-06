<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class ReviewController extends Controller
{
    //Controller for create review products

    public function add($product_slug)
    {
        $product = Product::where('slug',$product_slug)->where('status','0')->first();

        if ($product) 
        {
            $product_id = $product->id;
            $verified_purchase = Order::where('orders.user_id',Auth::id())->join('order_items','orders.id','order_items.order_id')->where('order_items.prod_id', $product_id)->get();  
            return view('frontend.reviews.index', compact('product','verified_purchase'));     
        } 
        else{
            return redirect()->back()->with('status','The link you follow is broken.');
        } 

    }

}

<?php

namespace App\Http\Controllers\frontEnd\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function ShowProduct($product,$id){
      $product = Product::find($id);
      return view('frontEnd.product.detailsProduct',compact('product')); 
    }//show Product

    
}

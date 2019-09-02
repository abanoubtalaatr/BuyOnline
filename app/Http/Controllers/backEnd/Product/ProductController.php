<?php

namespace App\Http\Controllers\backEnd\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\Category;

class ProductController extends Controller
{

   protected $Products;

   public function __construct(){
      self::SetProducts();
   }
   protected function SetProducts(){
      $this->Products = Product::all();
   }

   protected function ShowAdd(){
     return view('Inbackground.product.ShowAdd');

   }// Show Add blade

   public function Add(Request $request){
     
     
  
      $validator = Validator::make($request->all(), [
         'name' => 'required|max:255',
         'price' => 'required',
         'description' =>'required',
         'brief' => 'required',
         'discount' => 'required',
         'category_id' => 'required',
         'amount' =>'required',
         'details' =>'required',
         'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',


     ]);


     
     if ($validator->fails()) {
         return redirect('admin/product/Add')
                     ->withErrors($validator)
                     ->withInput();
     }else{
        //Product::create($request->all());
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description= $request->description;
        $product->discount = $request->discount;
        $product->brief = $request->brief;
        $product->amount = $request->amount;
        $product->category_id = $request->category_id;
        $result = array_chunk($request->details,2);
        $final  = json_encode($result);
        $product->details = $final;
              


     
     $imageName = time().'.'.request()->image->getClientOriginalExtension();
     request()->image->move(public_path('images/product'), $imageName);

     $product->image = $imageName;
     
     
     
        if( $product->save()){
          
         return redirect()->route('product.products');
        }
       
       
     }

      
   }// Add new Category

   public function products(){
     
      return view('Inbackground.product.ShowProducts');
     
   }//products
   public function ChooseEdit(){
      return view('Inbackground.product.Edit');
   }
   public function ShowEdit($id){

      $product = Product::find($id);
      return view('Inbackground.product.ShowEdit',compact('product'));

   }// Show Edit

   public function update(Request $request){
     
      $product = Product::find($request->id)->update($request->all());
      return redirect()->route('product.products');

   }//update
   public function ShowDelete(){
      return view('Inbackground.product.ShowDelete');
   }//showDelete
   public function Delete($id){

      Product::find($id)->delete();
      
     return redirect()->route('product.products');
   }//Delete
    
}// class 

<?php

namespace App\Http\Controllers\backEnd\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{

   private $AllCategory;

   public function __construct(){
      self::SetAllCategory();
   }
   private function SetAllCategory(){
      $this->AllCategory = Category::all();
   }


   public function ShowAdd(){
    return view('Inbackground.category.ShowAdd');

   }// Show Add blade


   public function Add(Request $request){
      $this->validate($request,['categoryName'=>'required','count'=>'required']);
     
      $newCategory = new Category;
      $newCategory->name = $request->categoryName;
      $newCategory->NumberInStock = $request->count;

      if($newCategory->save()){
         return redirect()->route('category.allCategories');
      }
      
   }// Add new Category

   public function AllCategories(){
      
      $AllCategory = $this->AllCategory;
      return view('Inbackground.category.ShowCategories',compact('AllCategory'));
     
   }//AllCategories



   public function ShowEdit(){

      $AllCategory = $this->AllCategory;
      return view('Inbackground.category.ShowEdit',compact('AllCategory'));

   }// Show Edit


   public function ShowSingleEdit($id){
      $category = Category::find($id);
      return view('Inbackground.category.Edit',compact('category'));
   }//Edit 

   public function update(Request $request){

      $category = Category::find($request->id)->update(['name' => $request->categoryName,'NumberInStock' =>$request->count ]
      );;
      return redirect()->route('category.ShowEdit');

   }//update

   public function ShowDelete(){
      $AllCategory = $this->AllCategory;
      return view('Inbackground.category.ShowDelete',compact('AllCategory'));
   }//show Delete

   public function Delete($id){

      Category::find($id)->delete();
      
     return redirect()->route('category.ShowDelete');
   }//Delete


}//class 



<?php

Route::prefix('admin/category/')->name('category.')->group(function(){
   // this for show and add pages
   Route::get('create',"CategoryController@ShowAdd");
   Route::post('create',"CategoryController@Add")->name('add');
   // this for display all categories
   Route::get('show',"CategoryController@AllCategories")->name('allCategories');
   // this for show all category and show single category that will edit and update it
   Route::get('edit',"CategoryController@ShowEdit")->name('ShowEdit');
   Route::get('edit/{id}',"CategoryController@ShowSingleEdit")->name('ShowSingleEdit');
   Route::post('Update',"CategoryController@update")->name('update');
   // This for show delte page and delte category
   Route::get('delete',"CategoryController@ShowDelete")->name('ShowDelete');
   Route::get('delete/{id}',"CategoryController@Delete")->name('Delete');
 
});
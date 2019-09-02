<?php
Route::prefix('admin/product/')->name('product.')->group(function(){
    // this for show and add pages
    Route::get('create',"ProductController@ShowAdd");
    Route::post('create',"ProductController@Add")->name('add');
    // // this for display all products
    Route::get('show',"ProductController@products")->name('products');
    // // this for show all category and show single category that will edit and update it
    Route::get('edit/{id}',"ProductController@ShowEdit")->name('ShowEdit');
    Route::get('edit',"ProductController@ChooseEdit")->name('ChooseEdit');
    Route::post('Update',"ProductController@update")->name('update');
    // // This for show delte page and delte category
    Route::get('delete',"ProductController@ShowDelete")->name('ShowDelete');
    Route::get('delete/{id}',"ProductController@delete")->name('delete');
  
 });
<?php


// this group for login 
Route::prefix('/admin')->name('admin.')->group(function(){
    Route::get('/dashboard', 'AdminLoginController@showdashboard')->name('dashboard');

    Route::get('/login', 'AdminLoginController@showLoginForm')->name('showLoginForm');
    
    Route::post('/login', 'AdminLoginController@login')->name('login');

});

// this group for delete, edit, creaet ,show admin in site 

Route::prefix('/admin/admin')->name('admin.')->group(function(){

    Route::get('/show','AdminController@Admins')->name('displayAdmins');
    Route::get('/create','AdminController@ShowCreate')->name('displayCreate');
    Route::post('/create','AdminController@Create')->name('Create');
    Route::get('/delete','AdminController@ShowDelete')->name('ShowDelete');
    Route::get('/delete/{id}','AdminController@Delete')->name('Delete');
    Route::get('/edit','AdminController@ShowEdit')->name('ShowEdit');
    Route::get('/edit/{id}','AdminController@Edit')->name('Edit');
    Route::post('/edit','AdminController@Update')->name('Update');



});

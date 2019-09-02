<?php 

Route::get('/details/{product}/{id}','ProductController@ShowProduct')->where(['product' =>'[0-9 A-Z a-z]+','id'=>'[0-9]+']);
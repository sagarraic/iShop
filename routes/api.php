<?php

// All api are written here
Route::post('products','User\ProductController@storeapi');
Route::patch('products/{id}','User\ProductController@updateapi');
Route::delete('products/delete/{id}','User\ProductController@destroyapi');